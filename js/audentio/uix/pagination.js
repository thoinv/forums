var audentio;
if (audentio === undefined) audentio = {};

audentio.pagination = {
	id 						: "",
	displaySize				: 800, // minimum display width in px to show on
	scrollDuration			: 300, // duration of scroll to in ms
	sizeValid				: false,
	needsInit				: true,
	running					: false,
	numPosts				: 0,
	currentPost				: 0,
	parent					: null,
	threads					: null,
	posts 					: [],
	uixSticky				: true,
	input 					: null,
	dropdown 				: null,
	ele 					: null,
	scrollInterval			: null,
	target					: -1,
	listenersAdded			: false,
	nextPage				: "",
	prevPage				: "",
	clickFn					: function(event){audentio.pagination.clickEvent(event)},
	keyFn 					: function(event){audentio.pagination.keyEvent(event)},
	offset 					: 0,

	init: function(id, outOfPhrase, enterIndexPhrase, offset){
		if (uix !== undefined && uix.maxResponsiveWideWidth !== undefined) audentio.pagination.displaySize = uix.maxResponsiveWideWidth;
		audentio.pagination.id = id;
		if (outOfPhrase === undefined) outOfPhrase = "Out of";
		if (enterIndexPhrase === undefined) enterIndexPhrase = "Enter Index";
		if (offset !== undefined) audentio.pagination.offset = offset;
		performanceTimer = Date.now();
		var parent = document.getElementById(id);
		audentio.pagination.parent = parent;
		threads = document.getElementById('messageList');
		audentio.pagination.threads = threads;
		if (parent !== null && threads !== null && audentio.pagination.needsInit){
			if (window.innerWidth > audentio.pagination.displaySize) {
				audentio.pagination.updatePosts();

				content = 	'<a href="javascript: audentio.pagination.scrollToPost(0)"><i class="fa fa-angle-double-up pointer fa-fw pagetop"></i></a>';
				content += 	'<a href="javascript: audentio.pagination.prevPost()"><i class="fa fa-angle-up pointer fa-fw pageup"></i></a>';
				content += 	'<a href="javascript: audentio.pagination.toggleIndexSelect(true)">';
				content += 	'	<span><span id="audentio_postPaginationCurrent"></span> ' + outOfPhrase + ' ' + audentio.pagination.numPosts + '</span>';
				content += 	'</a>';
				content += 	'<a href="javascript: audentio.pagination.nextPost()"><i class="fa fa-angle-down pointer fa-fw pagedown"></i></a>';
				content += 	'<a href="javascript: audentio.pagination.scrollToPost(' + (audentio.pagination.numPosts - 1) + ')"><i class="fa fa-angle-double-down pointer fa-fw pagebottom"></i></a>';
				content += 	'<div class="progress-container">';
				content += 	'	<div class="progress-bar" id="audentio_postPaginationBar"></div>';
				content += 	'</div>';
				content += 	'<div id="audentio_postPaginationDropdown">';
				content += 	'	<input type="text" id="audentio_postPaginationInput" class="textCtrl" placeholder="' + enterIndexPhrase + '">';
				content += 	'</div>';

				var paginator = document.createElement("span");
				paginator.className = "navLink";
				paginator.innerHTML = content;
				parent.appendChild(paginator);

				XenForo.updateVisibleNavigationTabs();
				XenForo.updateVisibleNavigationLinks();

				audentio.pagination.ele = paginator;
				audentio.pagination.updateCurrentPost();

				audentio.pagination.input = document.getElementById("audentio_postPaginationInput");
				audentio.pagination.dropdown = document.getElementById("audentio_postPaginationDropdown");

				document.addEventListener("scroll", function(event) { 
					audentio.pagination.updateCurrentPost();
				});
				audentio.pagination.updateBar()
				audentio.pagination.running = true;
				audentio.pagination.needsInit = false;

				var links = document.getElementsByTagName("LINK");
				for (var i = 0; i < links.length; i++){
					if (links[i].rel == "prev") audentio.pagination.prevPage = links[i].href;
					if (links[i].rel == "next") audentio.pagination.nextPage = links[i].href;
				}

				window.setTimeout(function(){
					audentio.pagination.update()
				}, 100); // allow page to render
			}
		}
		
		if (audentio.pagination.listenersAdded == false) {
			window.addEventListener("resize", function(event) { 
				audentio.pagination.update();
			});
			window.addEventListener("orientationchange", function(event) { 
				audentio.pagination.update();
			});
			audentio.pagination.listenersAdded = true;
		}
		if (uix !== undefined && uix.betaMode == true) console.log("Pagination : " + (Date.now() - performanceTimer) + " ms")
	},

	update: function(){
		audentio.pagination.checkSize();
		if (audentio.pagination.sizeValid){
			if (audentio.pagination.needsInit){
				audentio.pagination.init(audentio.pagination.id);
			} else {
				audentio.pagination.updatePosts();
				audentio.pagination.updateCurrentPost();
			}
		}
	},

	checkSize: function(){
		if (window.innerWidth > audentio.pagination.displaySize) {
			audentio.pagination.sizeValid = true;
			if (audentio.pagination.running) audentio.pagination.ele.style.display = "block";
		} else {
			audentio.pagination.sizeValid = false;
			if (audentio.pagination.running) audentio.pagination.ele.style.display = "none";
		}
	},

	toggleIndexSelect: function(state){
		if (state){
			audentio.pagination.dropdown.style.display = "block";
			document.addEventListener("click", audentio.pagination.clickFn);
			audentio.pagination.input.addEventListener('keypress', audentio.pagination.keyFn);
		} else {
			audentio.pagination.dropdown.style.display = "none";
			document.removeEventListener("click", audentio.pagination.clickFn);
			audentio.pagination.input.removeEventListener('keypress', audentio.pagination.keyFn);
		}
	},

	keyEvent: function(event){
		var key = event.which || event.keyCode;
		if (key == 13) { // 13 is enter
			var index = parseInt(audentio.pagination.input.value);
			if (index < 1) index = 1;
			if (index > audentio.pagination.numPosts) index = audentio.pagination.numPosts;
			audentio.pagination.input.value = "";
			audentio.pagination.toggleIndexSelect(false);
			audentio.pagination.scrollToPost(index - 1);
		}
	},

	clickEvent: function(event){
		if (event.target.id != 'audentio_postPaginationDropdown' && event.target.id != 'audentio_postPaginationInput') audentio.pagination.toggleIndexSelect(false);
	},

	getOffset: function(num){
		if (num - audentio.pagination.currentPost > 0){ // scrolling down
			if (audentio.pagination.uixSticky){
				return uix.sticky.downStickyHeight + audentio.pagination.offset;
			}
		} else {
			if (audentio.pagination.uixSticky) return uix.sticky.fullStickyHeight + audentio.pagination.offset;
		}
		return 0;
	},

	prevPost: function(){
		if (audentio.pagination.target != -1){
			window.scrollTo(0, audentio.pagination.target);
			audentio.pagination.updateCurrentPost();
		}
		var target = audentio.pagination.currentPost - 1;
		if (target < 0) {
			if (audentio.pagination.prevPage != "") window.location.href = audentio.pagination.prevPage; 
			//target = 0;
		} else {
			if (audentio.pagination.currentPost > 0) audentio.pagination.scrollToPost(target);
		}
	},

	nextPost: function(){
		if (audentio.pagination.target != -1){
			window.scrollTo(0, audentio.pagination.target);
			audentio.pagination.updateCurrentPost();
		}
		var target = audentio.pagination.currentPost + 1;
		if (target >= audentio.pagination.numPosts) {
			if (audentio.pagination.nextPage != "") window.location.href = audentio.pagination.nextPage; 
			//target = audentio.pagination.numPosts - 1;
		} else {
			audentio.pagination.scrollToPost(target);
		}
	},

	scrollToPost: function(num){
		var target = 0;
		if (num >= audentio.pagination.numPosts){
			target = document.body.getBoundingClientRect().height;
		} else if (num >= 0){
			target = audentio.pagination.posts[num] - audentio.pagination.getOffset(num);
		}
		audentio.pagination.target = target;
		startY = window.scrollY;
		numSteps = Math.ceil( audentio.pagination.scrollDuration/15 );
	    scrollStep =  (startY - target) / numSteps;
		scrollCount = 0;

		clearInterval(audentio.pagination.scrollInterval);

	    audentio.pagination.scrollInterval = setInterval( function() {
	        if ( scrollCount < numSteps && audentio.pagination.target != -1) {
	            scrollCount += 1;  
	            window.scrollTo( 0, ( startY - (scrollStep * scrollCount) ) );
	        } else {
	        	clearInterval(audentio.pagination.scrollInterval); 
	        	window.scrollTo(0, target);
	        	audentio.pagination.target = -1;
	        }
	    }, 15 );
	},

	updateNumPosts: function(){
		audentio.pagination.numPosts = audentio.pagination.threads.getElementsByClassName('message').length;
	},

	updateCurrentPost: function(){
		var scrollTop = window.scrollY || document.documentElement.scrollTop;
		scrollTop += audentio.pagination.getOffset() - 20;
		var currentPost = 0
		for (var i = 0; i < audentio.pagination.numPosts - 1; i++){
			if (scrollTop >= audentio.pagination.posts[i]){
				currentPost = i + 1;
			} else {
				break;
			}
		}
		document.getElementById('audentio_postPaginationCurrent').innerHTML = currentPost + 1;
		if (currentPost != audentio.pagination.currentPost) {
			audentio.pagination.currentPost = currentPost;
			audentio.pagination.updateBar();
		}
	},

	updatePosts: function(){
		audentio.pagination.updateNumPosts();
		for (var i = 0; i < audentio.pagination.numPosts; i++){
			var post = audentio.pagination.threads.getElementsByClassName('message')[i];
			audentio.pagination.posts[i] = post.offsetTop
		}
	},

	updateBar: function(){
		document.getElementById('audentio_postPaginationBar').style.width = ((audentio.pagination.currentPost + 1) / audentio.pagination.numPosts) * 100 + "%"
	}
}