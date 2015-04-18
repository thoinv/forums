// ====================
// UIX Sticky Functions
// ====================

uix.sticky = {
	items 						: [],
	stickyHeight 				: 0,
	fullStickyHeight			: 0,
	downStickyHeight			: 0,
	stickyElmsHeight 			: 0,
	performanceLog	 			: false,
	betaMode 					: false,
	running 					: false,
	stickyLastBottom 			: 0,
	lastScrollTop				: 0, // 
	scrollStart					: 0, // the position that a scroll starts
	scrollDistance				: 0, // counter of the distance of the current scroll
	scrollDirection 			: "start", // neither up nor down intentionally
	preventStickyTop			: false, // stops sliding sticky from sticking during jump to top
	stickyMinPos				: 350, // if scrollDetector enabled, won't sticky before this value
	stickyOffsetDist			: 0, // the amount to position offscreen sticky elements
	stickyMinDist				: 10, // min distance for a scroll to trigger sticky hide or show
	scrollDetectorRunning		: false, // boolean if the scrollDetector is running
	scrollTop 					: window.scrollY || document.documentElement.scrollTop,
	html 						: $('html'),
	needsInit					: true,
	windowWidth					: 0,
	windowHeight				: 0,
	minWidthDefault				: 0,
	maxWidthDefault				: 999999,
	minHeightDefault			: 0,
	maxHeightDefault			: 999999,
	postAddFunc					: function(){},
	postStickFunc				: function(){},
	postUnstickFunc				: function(){},
	postDelayUnstickFunc		: function(){},
	preDelayUnstickFunc			: function(){},

	set: function(options){
		if (options !== undefined) {
			if (options.betaMode !== undefined) uix.sticky.betaMode = options.betaMode;
			if (options.performanceLog !== undefined) uix.sticky.performanceLog = options.performanceLog;
			if (options.stickyMinPos !== undefined) uix.sticky.stickyMinPos = options.stickyMinPos;
			if (options.stickyMinDist !== undefined) uix.sticky.stickyMinDist = options.stickyMinDist;
			if (options.minWidthDefault !== undefined) uix.sticky.minWidthDefault = options.minWidthDefault;
			if (options.maxWidthDefault !== undefined) uix.sticky.maxWidthDefault = options.maxWidthDefault;
			if (options.minHeightDefault !== undefined) uix.sticky.minHeightDefault = options.minHeightDefault;
			if (options.maxHeightDefault !== undefined) uix.sticky.maxHeightDefault = options.maxHeightDefault;
			if (options.postAddFunc !== undefined) uix.sticky.postAddFunc = options.postAddFunc;
			if (options.postStickFunc !== undefined) uix.sticky.postStickFunc = options.postStickFunc;
			if (options.postUnstickFunc !== undefined) uix.sticky.postUnstickFunc = options.postUnstickFunc;
			if (options.postDelayUnstickFunc !== undefined) uix.sticky.postDelayUnstickFunc = options.postDelayUnstickFunc;
			if (options.preDelayUnstickFunc !== undefined) uix.sticky.preDelayUnstickFunc = options.preDelayUnstickFunc;
		}
	},

	init: function(){
		uix.sticky.viewport();
		$(window).on('resize orientationchange', function(){
			uix.sticky.resize();
		});
		uix.sticky.needsInit = false;
	},

	add: function(itemName, normalHeight, stickyHeight, options){
		if (uix.sticky.needsInit) uix.sticky.init();
		if (uix.sticky.performanceLog) performanceTimer = Date.now();
		var item = {};
		item.name = itemName;
		item.elm = $(itemName);
		item.docElm = document.getElementById(itemName.replace('#', ''));
		item.offset = item.elm.offset();
		item.state = 0;
		item.alwaysSticky = false;
		item.zIndex = 250;
		item.subElement = null;
		item.subNormalHeight = 0;
		item.subStickyHeight = 0;
		item.subStickyHide = false;
		uix.sticky.fullStickyHeight += stickyHeight
		if (options === undefined) {
			item.maxWidth = uix.sticky.maxWidthDefault;
			item.minWidth = uix.sticky.minWidthDefault;
			item.maxHeight = uix.sticky.maxHeightDefault;
			item.minHeight = uix.sticky.minHeightDefault;
			item.scrollSticky = 1;
		} else {
			item.maxWidth = (options.maxWidth === undefined ? uix.sticky.maxWidthDefault : options.maxWidth);
			item.minWidth = (options.minWidth === undefined ? uix.sticky.minWidthDefault : options.minWidth);
			item.maxHeight = (options.maxHeight === undefined ? uix.sticky.maxHeightDefault : options.maxHeight);
			item.minHeight = (options.minHeight === undefined ? uix.sticky.minHeightDefault : options.minHeight);
			item.scrollSticky = (options.scrollSticky === undefined ? 1 : options.scrollSticky);
			item.zIndex = (options.zIndex === undefined ? 250 : options.zIndex);
			item.subElement = (options.subElement === undefined ? null : $(options.subElement));
			item.subNormalHeight = (options.subNormalHeight === undefined ? 0 : options.subNormalHeight);
			item.subStickyHeight = (options.subStickyHeight === undefined ? 0 : options.subStickyHeight);
			item.subStickyHide = (options.subStickyHide === undefined ? false : options.subStickyHide);
		}
		if (item.scrollSticky) uix.sticky.scrollDetectorRunning = true;
		if (item.scrollSticky == 0) uix.sticky.downStickyHeight += stickyHeight

		if (item.offset.top == uix.sticky.stickyElmsHeight) {
			if (item.docElm.getBoundingClientRect().top == uix.sticky.stickyElmsHeight) {
				item.alwaysSticky = true;
				uix.sticky.stickyElmsHeight += item.stickyHeight;
			}
		}
		if (options.subStickyHide) item.subStickyHeight = 0;
		item.normalHeight = normalHeight + item.subNormalHeight;
		item.stickyHeight = stickyHeight + item.subStickyHeight;

		if (item.normalHeight > item.stickyHeight) {
			uix.sticky.stickyOffsetDist += item.normalHeight;
		} else {
			uix.sticky.stickyOffsetDist += item.stickyHeight;
		}

		uix.sticky.stickyLastBottom = item.offset.top + item.elm.outerHeight();
			
		if (!item.elm.find('.sticky_wrapper').length) item.elm.wrapInner('<div class="sticky_wrapper"></div>').addClass("inactiveSticky");
		item.wrapper = item.elm.find('.sticky_wrapper');
		
		if ( uix.elm.logoSmall.length && uix.elm.logo.length ) uix.fn.checkLogoVisibility();

		uix.sticky.items.push(item);
		uix.sticky.checkSize(uix.sticky.items.length - 1); // see if item sticky is enabled at current size
		uix.sticky.running = true;
		
		uix.sticky.check();
		uix.sticky.postAddFunc();
		if (uix.sticky.performanceLog) uix.sticky.log("	UIX.sticky.add " + itemName + ": " + (Date.now() - performanceTimer) + " ms");	
	},

	hasItem: function(itemName){
		for (var x = 0; x < uix.sticky.items.length; x++){
			if (uix.sticky.items[x].name == itemName) return true;
		}
		return false;
	},

	remove: function(itemName){
		for (var x = 0; x < uix.sticky.items.length; x++){
			if (uix.sticky.items[x].name == itemName) {
				uix.fullStickyHeight -= uix.sticky.items[x].stickyHeight;
				uix.sticky.items.splice(x, 1);
			}
		}
		uix.sticky.check();
	},

	stick: function(index, currentHeight){
		if (uix.sticky.performanceLog) performanceTimer = Date.now();
		var
			target = uix.sticky.items[index].elm,
			innerWrapper = uix.sticky.items[index].wrapper,
			normalHeight = uix.sticky.items[index].normalHeight;
			
		$('.lastSticky').removeClass('lastSticky');
		target.addClass('lastSticky').removeClass('inactiveSticky').addClass('activeSticky').css('height', normalHeight);
			
		if (uix.sticky.items[index].scrollSticky){
			innerWrapper.css('top', (currentHeight - uix.sticky.stickyOffsetDist)); // offset so items can scroll in and out
		} else {
			innerWrapper.css({'top': currentHeight, 'z-index': uix.sticky.items[index].zIndex} );
		}
		
		//if (uix.sticky.items[index].subElement !== null) uix.sticky.items[index].subElement.css({'height': uix.sticky.items[index].subStickyHeight, 'line-height': uix.sticky.items[index].subStickyHeight} ) 

		uix.sticky.items[index].state = 1;
		uix.sticky.postStickFunc();
		if (uix.sticky.performanceLog) uix.sticky.log("~UIX.sticky.stick " + uix.sticky.items[index].name + " : " + (Date.now() - performanceTimer) + " ms")
	},

	unstick: function(index){
		if (uix.sticky.performanceLog) performanceTimer = Date.now();
		var
			target = uix.sticky.items[index].elm,
			innerWrapper = uix.sticky.items[index].wrapper,
			stickyHeight = uix.sticky.items[index].stickyHeight;
			
		target.addClass('inactiveSticky').removeClass('lastSticky').removeClass('activeSticky').css({'height': '', 'z-index': ''});
			
		innerWrapper.css('top','');

		//if (uix.sticky.items[index].subElement !== null) uix.sticky.items[index].subElement.css({'height': '', 'line-height': ''} ) 

		uix.sticky.items[index].state = 0;
		if (uix.sticky.items[index].state != 2) {
			$('.activeSticky').last().addClass('lastSticky');
			uix.sticky.postUnstickFunc();
		}
		if (uix.sticky.performanceLog) uix.sticky.log("~UIX.sticky.unstick " + uix.sticky.items[index].name + " : " + (Date.now() - performanceTimer) + " ms")
	},

	delayUnstick: function(){ // unsticks everything with state == 2, used for scroll sticky
		for (var x=0; x<uix.sticky.items.length; x++) {
			if (uix.sticky.items[x].state == 2) {
				uix.sticky.items[x].wrapper.css({
					'transform': '',
					'-webkit-transform': '',
					'-ms-transform': '',
					'-ms-transform': '',
					'-moz-transform': '',
					'z-index': '',
				})
				uix.sticky.unstick(x);
			}
		}
		$('.activeSticky').last().addClass('lastSticky');
		uix.sticky.postDelayUnstickFunc();
	},

	delayStick: function(){
		for (var x=0; x<uix.sticky.items.length; x++) {
			if (uix.sticky.items[x].state == 3) {
				uix.sticky.items[x].wrapper.css({
					'transform': 'translate3d(0, ' + uix.sticky.stickyOffsetDist + 'px, 0)',
					'-webkit-transform': 'translate3d(0, ' + uix.sticky.stickyOffsetDist + 'px, 0)',
					'-ms-transform': 'translate3d(0, ' + uix.sticky.stickyOffsetDist + 'px, 0)',
					'-ms-transform': 'translate3d(0, ' + uix.sticky.stickyOffsetDist + 'px, 0)',
					'-moz-transform': 'translate3d(0, ' + uix.sticky.stickyOffsetDist + 'px, 0)',
					'z-index': uix.sticky.items[x].zIndex,
				}); // move to scroll in
				uix.sticky.items[x].state = 1;
			}
		}
	},

	check: function(){
		if (uix.sticky.performanceLog) performanceTimer = Date.now();
		if (uix.sticky.scrollDetectorRunning) uix.sticky.scrollDetector();
		var currentStickyHeight = 0;
		var needsDelayStick = false;
		var needsDelayUnstick = false;

		for (var x=0; x<uix.sticky.items.length; x++) {
			if (uix.sticky.items[x].enabled){
				var
					itemFromWindowTop = uix.sticky.items[x].docElm.getBoundingClientRect().top
					innerWrapper = uix.sticky.items[x].wrapper,
					wrapperFromWindowTop = innerWrapper[0].getBoundingClientRect().top,
					wrapperFromWindowTopInit = wrapperFromWindowTop;
				if (wrapperFromWindowTop < currentStickyHeight) wrapperFromWindowTop = currentStickyHeight; // fix for iOS
				if (uix.sticky.scrollDetectorRunning && uix.sticky.items[x].scrollSticky == 1) {
					if (uix.sticky.scrollTop <= uix.sticky.stickyMinPos) {
						innerWrapper.css({
							'transform': '',
							'-webkit-transform': '',
							'-ms-transform': '',
							'-ms-transform': '',
							'-moz-transform': '',
							'z-index': '',
						});
					} else if (uix.sticky.scrollTop > uix.sticky.stickyMinPos && uix.sticky.scrollDirection == "down" && (itemFromWindowTop < wrapperFromWindowTop && uix.sticky.scrollDistance > uix.sticky.stickyMinDist)) {
						innerWrapper.css({
							'transform': 'translate3d(0, 0, 0)',
							'-webkit-transform': 'translate3d(0, 0, 0)',
							'-ms-transform': 'translate3d(0, 0, 0)',
							'-ms-transform': 'translate3d(0, 0, 0)',
							'-moz-transform': 'translate3d(0, 0, 0)',
						});
					}
					if (uix.sticky.items[x].state == 1) { //Is stuck
						if ((!uix.sticky.items[x].alwaysSticky && itemFromWindowTop >= wrapperFromWindowTop) || (uix.sticky.scrollDirection == "down" && uix.sticky.scrollDistance > uix.sticky.stickyMinDist) || uix.sticky.scrollTop <= uix.sticky.stickyMinPos) {
							innerWrapper.css({
								'transform': 'translate3d(0, 0, 0)',
								'-webkit-transform': 'translate3d(0, 0, 0)',
								'-ms-transform': 'translate3d(0, 0, 0)',
								'-ms-transform': 'translate3d(0, 0, 0)',
								'-moz-transform': 'translate3d(0, 0, 0)',
							});
							uix.sticky.items[x].state = 2; // prevent any additional sticking or unsticking until it is unstuck
							needsDelayUnstick = true;
						} else {
							currentStickyHeight += uix.sticky.items[x].stickyHeight;
						}
					} else if (uix.sticky.items[x].state == 0 && uix.sticky.preventStickyTop == false) { //Not stuck
						if (wrapperFromWindowTopInit - currentStickyHeight <=0 && uix.sticky.scrollDirection == "up" && uix.sticky.scrollDistance > uix.sticky.stickyMinDist && uix.sticky.scrollTop > uix.sticky.stickyMinPos) {
							uix.sticky.stick(x, currentStickyHeight);
							uix.sticky.items[x].state = 3;
							needsDelayStick = true;
							currentStickyHeight +=  uix.sticky.items[x].stickyHeight;
						}
					}
				} else {
					if (uix.sticky.items[x].state == 1) { //Is stuck
						if (!uix.sticky.items[x].alwaysSticky && itemFromWindowTop >= wrapperFromWindowTop ) {
							uix.sticky.unstick(x);
						} else {
							currentStickyHeight += uix.sticky.items[x].stickyHeight;
						}
					} else { //Not stuck
						if (wrapperFromWindowTopInit - currentStickyHeight <=0) {
							uix.sticky.stick(x, currentStickyHeight);
							currentStickyHeight += uix.sticky.items[x].stickyHeight;
						}
					}
				}
			} else {
				if (uix.sticky.items[x].state == 1){
					uix.sticky.unstick(x);
				}
			}
		}
		uix.sticky.stickyHeight = currentStickyHeight;
		if (needsDelayUnstick) {
			uix.sticky.preDelayUnstickFunc();
			window.setTimeout(function(){uix.sticky.delayUnstick();}, 210); // delay so the translate3d can happen
		} else if (needsDelayStick) {
			uix.sticky.delayStick();
		}
		if (uix.sticky.performanceLog) uix.sticky.log("~UIX.sticky.check : " + (Date.now() - performanceTimer) + " ms")	
	},

	resize: function(){
		uix.sticky.viewport();
		for(var x = 0; x < uix.sticky.items.length; x++){
			uix.sticky.checkSize(x)
		}
		uix.sticky.update();
	},

	viewport: function(){
		var e = window, a = 'inner';
		if (!window.innerWidth) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		var viewport = { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
		uix.sticky.windowWidth = viewport.width;
		uix.sticky.windowHeight = viewport.height;
	},

	checkSize: function(x){
		var item = uix.sticky.items[x];
		windowHeight = uix.sticky.windowHeight;
		windowWidth = uix.sticky.windowWidth;
		if (windowHeight >= item.minHeight && windowHeight <= item.maxHeight && windowWidth >= item.minWidth && windowWidth <= item.maxWidth){
			uix.sticky.items[x].enabled = true;
		} else {
			uix.sticky.items[x].enabled = false;
		}
	},

	update: function() {
		var items = uix.sticky.items;
		currentTop = 0;
		uix.sticky.check();
		for (var x = 0; x < uix.sticky.items.length; x++){
			if (uix.sticky.items[x].state == 1 && uix.sticky.items[x].enabled){
				innerWrapper = uix.sticky.items[x].wrapper;
				if (uix.sticky.items[x].scrollSticky){
					innerWrapper.css('top', (currentTop - uix.sticky.stickyOffsetDist)); // offset so items can scroll in and out
				} else {
					innerWrapper.css({'top': currentTop, 'z-index': uix.sticky.items[x].zIndex} );
				}
				currentTop += uix.sticky.items[x].stickyHeight;
			}
		}
		uix.sticky.check();
	},

	getState: function(itemName) {
		for (var x = 0; x < uix.sticky.items.length; x++){
			if (uix.sticky.items[x].name == itemName) return uix.sticky.items[x].state;
		}
		return -1;
	},

	updateScrollTop: function(){
		uix.sticky.scrollTop = window.scrollY || document.documentElement.scrollTop;
	},


	scrollDetector: function(){
		if (uix.sticky.performanceLog) performanceTimer = Date.now();
		uix.sticky.updateScrollTop();
		direction = "";
		if (uix.sticky.scrollDirection == 'start') uix.sticky.scrollStart = uix.sticky.scrollTop; // initialize
	 	if (uix.sticky.scrollTop > uix.sticky.lastScrollTop){
	  		if (uix.sticky.scrollDirection == 'up') uix.sticky.scrollStart = uix.sticky.lastScrollTop; // just changing to a new direction, record the new starting point
			direction = 'down';
			uix.sticky.html.removeClass('scrollDirection-up').addClass('scrollDirection-down');
	  	} else if (uix.sticky.scrollTop < uix.sticky.lastScrollTop) {
	  		if (uix.sticky.scrollDirection == 'down') uix.sticky.scrollStart = uix.sticky.lastScrollTop; // just changing to a new direction, record the new starting point
			direction = 'up';
			uix.sticky.html.removeClass('scrollDirection-down').addClass('scrollDirection-up');
	  	}
	  	uix.sticky.scrollDistance = Math.abs(uix.sticky.scrollTop - uix.sticky.scrollStart);
	  	uix.sticky.scrollDirection = direction;
	  	if (uix.sticky.performanceLog) uix.sticky.log("Scroll: " + uix.sticky.scrollDirection + " " + uix.sticky.scrollDistance);
	  	uix.sticky.lastScrollTop = uix.sticky.scrollTop;
	  	if (uix.sticky.performanceLog) uix.sticky.log("~UIX.scrollDetector Scroll : " + (Date.now() - performanceTimer) + " ms");
	},

	log: function(x) {
		if (uix.sticky.betaMode) console.log(x);
	},
};
















$(document).ready(function(){

	//DOM
	var
	$window 	= $(window),
	html 		= $('html'),
	head		= $('head'),
	body 		= $('body');
	
	//UIX variables
	uix.windowWidth 				= 0;
	uix.windowHeight 				= 0;
	uix.scrollTop 					= window.scrollY || document.documentElement.scrollTop;
	
	uix.elm = {
		navigation 		: $('#navigation'),
		userBar 		: $('#moderatorBar'),
		logo 			: $('#logo'),
		logoBlock 		: $('#logoBlock'),
		logoSmall 		: $('#logo_small'),
		jumpToFixed 	: $('#uix_jumpToFixed'),
		mainSidebar 	: $('.uix_mainSidebar'),
		mainContent 	: $('.mainContent'),
		mainContainer 	: $('.mainContainer'),
		welcomeBlock 	: $('#uix_welcomeBlock'),
		stickyCSS 		: $('#uixStickyCSS')
	};

	uix.elm.sidebar 				= $('.uix_mainSidebar');
	uix.elm.sidebar_inner			= uix.elm.sidebar.find('.sidebar');
	uix.stickySidebarState 			= 0;
	uix.stickySidebarBottomFixed	= 0;
	uix.hasSticky 					= Object.keys(uix.stickyItems).length > 0 ? true : false;
	uix.contentHeight				= uix.elm.mainContent.outerHeight();
	uix.emBreak						= uix.elm.mainContainer.scrollTop();
	uix.resizeTimer					= undefined;
	uix.viewportRunning				= false;
	uix.viewportScrollClass			= "";
	uix.slidingSidebar				= true; // if false, disable transition for sliding sticky's sidebar
	uix.jumpToScrollTimer			= null;	
	uix.jumpToScrollHideTimer		= null;
	uix.jumpToFixedRunning			= false;
	uix.jumpToFixedOpacity			= 0;
	uix.performanceLog				= false; // if true, will output timers for most functions for performance testing
	uix.performanceTimer			= Date.now(); // used for timing performance testing
	
	//custom logger: logs only under Beta mode
	uix.log = function(x){
		if (uix.betaMode) console.log(x);
	};
	uix.info = function(x){
		if (uix.betaMode) console.info(x);
	};
	
	// ==============
	// UIX functions
	// ==============
	
	uix.sidebarSticky = {
		running: false,
		hasTransition: true,
		resize: function() {
			if (uix.elm.sidebar.length && uix.stickySidebar && uix.elm.sidebar.is(":visible")) {			
				if (uix.windowWidth > uix.sidebarMaxResponsiveWidth && uix.sidebarSticky.running) {
					uix.sidebarSticky.update();
					if (uix.stickySidebarState == 1) {
						uix.sidebarSticky.innerWrapper.css({
							left: uix.sidebarSticky.sidebarFromLeft
						});
					} else {
						uix.sidebarSticky.innerWrapper.css('left', '')
					}
				} else if(uix.windowWidth > uix.sidebarMaxResponsiveWidth && !uix.sidebarSticky.running) {
					uix.init.stickySidebar();
				} else {
					uix.sidebarSticky.reset();
				}
			}
		},

		update: function(){
			if (uix.elm.sidebar.length && uix.stickySidebar){
				if (uix.performanceLog) performanceTimer = Date.now();
				uix.sidebarSticky.sidebarOffset = uix.elm.sidebar.offset();
				uix.sidebarSticky.sidebarFromLeft = uix.sidebarSticky.sidebarOffset.left;
				uix.sidebarSticky.mainContainerHeight = uix.elm.mainContainer.outerHeight();
				uix.sidebarSticky.innerWrapper.css('width', uix.elm.sidebar.outerWidth());
				var sidebarHeight = uix.elm.sidebar.outerHeight();
				var wrapperHeight = uix.sidebarSticky.innerWrapper.outerHeight();
				if (sidebarHeight > wrapperHeight) {
					uix.sidebarSticky.sidebarHeight = sidebarHeight;
				} else {
					uix.sidebarSticky.sidebarHeight = wrapperHeight;
				}
				uix.sidebarSticky.bottomLimit = uix.elm.mainContainer.offset().top + uix.sidebarSticky.mainContainerHeight;
				uix.sidebarSticky.maxTop = uix.sidebarSticky.bottomLimit - (uix.sidebarSticky.sidebarOffset.top+uix.sidebarSticky.sidebarHeight);
				uix.sidebarSticky.check();
				if (uix.performanceLog) uix.log("~UIX.sidebarSticky.update : " + (Date.now() - performanceTimer) + " ms");
			}
		},
		check: function(){
			if (uix.elm.sidebar.length && uix.stickySidebar && uix.windowWidth > uix.sidebarMaxResponsiveWidth){
				if (uix.performanceLog) performanceTimer = Date.now();
				if (uix.sidebarSticky.mainContainerHeight>=uix.sidebarSticky.sidebarHeight) {
					var sidebarFromWindowTop = uix.sidebarSticky.sidebarOffset.top - (uix.sticky.stickyHeight+uix.scrollTop);
					var bottomLimitFromWindowTop = uix.sidebarSticky.bottomLimit - uix.scrollTop;
						
					if (bottomLimitFromWindowTop-uix.sticky.stickyHeight<=uix.sidebarSticky.sidebarHeight+uix.globalPadding) {
						uix.sidebarSticky.fixBottom()
					} else if (uix.stickySidebarState == 1 && sidebarFromWindowTop-uix.globalPadding > 0){
						uix.sidebarSticky.unstick();
					} else if (bottomLimitFromWindowTop-uix.sticky.stickyHeight>uix.sidebarSticky.sidebarHeight+uix.globalPadding && sidebarFromWindowTop-uix.globalPadding <= 0) {
						uix.sidebarSticky.stick();
					}
				} else if (uix.sidebarSticky.running) {
					uix.sidebarSticky.unstick();
				}
				if (uix.performanceLog) uix.log("~UIX.sidebarSticky.check : " + (Date.now() - performanceTimer) + " ms");
			}
		},
		stick: function(){
			if (uix.elm.sidebar.length && uix.stickySidebar && uix.windowWidth > uix.sidebarMaxResponsiveWidth){
				if (uix.performanceLog) performanceTimer = Date.now();
				uix.elm.sidebar.addClass('sticky');
				uix.stickySidebarState = 1;
				uix.stickySidebarBottomFixed = 0;
				if (!uix.slidingSidebar && uix.sidebarSticky.hasTransition) {
					uix.sidebarSticky.hasTransition = false;
					uix.sidebarSticky.innerWrapper.css({ transition: 'top 0.0s'});
				}
				uix.sidebarSticky.innerWrapper.css({
					top: uix.sticky.stickyHeight+uix.globalPadding,
					left: uix.sidebarSticky.sidebarOffset.left,
				});
				if (uix.performanceLog) uix.log("~UIX.sidebarSticky.stick : " + (Date.now() - performanceTimer) + " ms");
			}
		},
		
		unstick: function(){
			if (uix.elm.sidebar.length && uix.stickySidebar && uix.sidebarSticky.running){
				if (uix.performanceLog) performanceTimer = Date.now();
				uix.elm.sidebar.removeClass('sticky');
				uix.stickySidebarState = 0;
				uix.stickySidebarBottomFixed = 0;
				if (uix.slidingSidebar && !uix.sidebarSticky.hasTransition){
					uix.sidebarSticky.hasTransition = true;
					uix.sidebarSticky.innerWrapper.css({ transition: 'top 0.2s'});
				} else if (!uix.slidingSidebar && uix.sidebarSticky.hasTransition) {
					uix.sidebarSticky.hasTransition = false;
					uix.sidebarSticky.innerWrapper.css({ transition: 'top 0.0s'});
				}
				uix.sidebarSticky.innerWrapper.css({top: '', left: '' });
				if (uix.performanceLog) uix.log("~UIX.sidebarSticky.unstick : " + (Date.now() - performanceTimer) + " ms");
			}
		},
		
		fixBottom: function(){
			if (uix.elm.sidebar.length && uix.stickySidebar && uix.windowWidth > uix.sidebarMaxResponsiveWidth){
				uix.stickySidebarState = 0;
				uix.stickySidebarBottomFixed = 1;
				if (uix.performanceLog) performanceTimer = Date.now();
				uix.elm.sidebar.removeClass('sticky');
				uix.stickySidebar.hasTransition = false;
				uix.sidebarSticky.innerWrapper.css({
					transition: 'top 0.0s', top: uix.sidebarSticky.maxTop, left: ''
				});
				if (uix.performanceLog) uix.log("~UIX.sidebarSticky.fixBottom : " + (Date.now() - performanceTimer) + " ms");
			}
		},
		
		reset: function(){
			if (uix.elm.sidebar.length && uix.stickySidebar && uix.sidebarSticky.running){
				if (uix.performanceLog) performanceTimer = Date.now();
				uix.sidebarSticky.unstick();
				uix.sidebarSticky.innerWrapper.css('width', '');
				uix.sidebarSticky.running = false;
				if (uix.performanceLog) uix.log("~UIX.sidebarSticky.reset : " + (Date.now() - performanceTimer) + " ms");
			}
		}
	};
  
	uix.fn.checkRadius = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		/* Target elements to run tests against */
		var elms = ["#logoBlock .pageContent", "#content .pageContent", "#userBar .pageContent", "#navigation .pageContent", ".footer .pageContent", "#uix_footer_columns .pageContent", ".footerLegal .pageContent"];
		var elmInfo = {};
		var windowWidth = $window.width();
		var wrapperTop = $("#uix_wrapper").offset().top;

		for (var i = 0; i < elms.length; i++) {
			var element_selector = elms[i];
			var element = $(element_selector);
			elmInfo[i] = {};	
			if(element.length){
				elmInfo[i]['element'] = element;
				elmInfo[i]['length'] = element.length;
				elmInfo[i]['width'] = element.outerWidth();
				elmInfo[i]['height'] = element.outerHeight();
				elmInfo[i]['topOffset'] = element.offset().top;
				elmInfo[i]['topRadius'] = true;
				elmInfo[i]['bottomRadius'] = true;
			}
		}
			
		for (var i = 0; i < elms.length; i++) { // Loop through all
			if(elmInfo[i]['length']){
				if (elmInfo[i]['width'] == windowWidth){ //Reset border-radius if element is full width
					elmInfo[i]['topRadius'] = false;
					elmInfo[i]['bottomRadius'] = false;
				} else {
					for (var x = 0; x < elms.length; x++) { // Check if our element is touching others in elms[]
						if (elmInfo[x]['length']){
							if(x != i) { // Dont check against itself
								var isAttachedToTop = ( elmInfo[i]['topOffset'] - (elmInfo[x]['topOffset'] + elmInfo[x]['height']) ) == 0;
								var isAttachedToBottom = ( ( elmInfo[i]['topOffset'] + elmInfo[i]['height'] ) == elmInfo[x]['topOffset'] );
					
								if (isAttachedToTop) elmInfo[i]['topRadius'] = false;
								if (isAttachedToBottom) elmInfo[i]['bottomRadius'] = false;
							}
						}
					}
				}

				if (elmInfo[i]['topRadius'] == false && elmInfo[i]['bottomRadius'] == false) {
					elmInfo[i]['element'].addClass('noBorderRadius').removeClass('noBorderRadiusTop').removeClass('noBorderRadiusBottom')
				} else if (elmInfo[i]['topRadius'] == false) {
					elmInfo[i]['element'].removeClass('noBorderRadius').addClass('noBorderRadiusTop').removeClass('noBorderRadiusBottom')
				} else if (elmInfo[i]['bottomRadius'] == false) {
					elmInfo[i]['element'].removeClass('noBorderRadius').removeClass('noBorderRadiusTop').addClass('noBorderRadiusBottom')
				} else {
					elmInfo[i]['element'].removeClass('noBorderRadius').removeClass('noBorderRadiusTop').removeClass('noBorderRadiusBottom')
				}
			}
		}
		if (uix.performanceLog) uix.log("~UIX.fn.checkRadius : " + (Date.now() - performanceTimer) + " ms")
	}
			
	uix.fn.checkLogoVisibility = function() {
		if (uix.performanceLog) performanceTimer = Date.now();
		if ( uix.sticky.getState('#navigation') == 1 ) {
			var
				logoTopOffset			= uix.elm.logo.offset().top + (uix.elm.logo.outerHeight(true) / 2),
				stickyWrapper			= uix.elm.navigation.find('.sticky_wrapper'),
				navigationBottomOffset 	= stickyWrapper.offset().top + stickyWrapper.outerHeight(true);
			if (logoTopOffset < navigationBottomOffset) {
				html.addClass('activeSmallLogo');
			} else {
				html.removeClass('activeSmallLogo');
			}
		} else {
			html.removeClass('activeSmallLogo');
		}
		if (uix.performanceLog) uix.log("~UIX.fn.checkLogoVisibility : " + (Date.now() - performanceTimer) + " ms")
	}
			
	uix.fn.viewportCheck = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		uix.scrollTop = window.scrollY || document.documentElement.scrollTop;
		if (uix.scrollTop == 0) {
			html.removeClass('scrollNotTouchingTop');
			uix.viewportScrollClass	 = "";
		} else if(uix.viewportScrollClass	 != 'scrollNotTouchingTop'){
			html.addClass('scrollNotTouchingTop');
			uix.viewportScrollClass	 = 'scrollNotTouchingTop';
		}
		if (uix.performanceLog) uix.log("~UIX.init.viewportCheck Scroll : " + (Date.now() - performanceTimer) + " ms")
	}

	uix.fn.jumpToFixed = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		if (uix.jumpToFixed_delayHide && uix.jumpToScrollTimer){
			clearTimeout(uix.jumpToScrollTimer);   // clear any previous pending timer
			clearTimeout(uix.jumpToScrollHideTimer); 
		}

		if (uix.scrollTop > 140) {
			if (uix.jumpToFixedOpacity == 0) {
				uix.elm.jumpToFixed.css({'display': 'block'});
				uix.jumpToFixedOpacity = 1;
				window.setTimeout(function(){ uix.elm.jumpToFixed.css({'opacity': '1'}); }, 10);
			}
			if (uix.jumpToFixed_delayHide == 1) {
				uix.jumpToScrollTimer = setTimeout(function() {
					uix.jumpToScrollTimer = null;
					uix.jumpToFixedOpacity = 0;
					uix.elm.jumpToFixed.css({'opacity' : '0'});
					uix.jumpToScrollHideTimer = window.setTimeout(function(){ if (uix.jumpToFixedOpacity == 0) uix.elm.jumpToFixed.css({'display': 'none'}); }, 450);
				}, 1500);   // set new timer
			}
		} else {
			if (uix.jumpToFixedOpacity != 0) {
				uix.jumpToFixedOpacity = 0;
				uix.elm.jumpToFixed.css({'opacity' : '0'});
			}
			uix.jumpToScrollHideTimer = window.setTimeout(function(){ if (uix.jumpToFixedOpacity == 0) uix.elm.jumpToFixed.css({'display': 'none'}); }, 450);
		}
		if (uix.performanceLog) uix.log("~UIX.init.jumpToFixed Scroll : " + (Date.now() - performanceTimer) + " ms");
	}

	uix.fn.updateSidebar = function() {
		if (uix.windowWidth > uix.sidebarMaxResponsiveWidth) {
			uix.elm.sidebar.css({
				'width': uix.sidebarWidth,
				'float': uix.sidebar_innerFloat
			});
		} else {
			uix.elm.sidebar.css({'width': '','float': ''});
			if (uix.sidebarSticky.length && uix.sidebarSticky.innerWrapper.length) {
				uix.sidebarSticky.innerWrapper.css({
					'width': '',
					'top': ''
				});
			}
		}
	}
	  
	// ================
	// init() functions
	// ================
	  
	uix.init.viewportCheck = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		var e = window, a = 'inner';
		if (!window.innerWidth) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		var viewport = { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
		uix.windowWidth = viewport.width;
		uix.windowHeight = viewport.height;
		
		if (uix.viewportRunning == false) uix.viewportRunning = true; // don't add the on scroll multiple times

		if (uix.performanceLog) uix.log("~UIX.init.viewportCheck : " + (Date.now() - performanceTimer) + " ms")
	};
		
	uix.init.welcomeBlock = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		if ( uix.elm.welcomeBlock.length && uix.elm.welcomeBlock.hasClass('uix_welcomeBlock_fixed') ) {
			
			if ( $.getCookie('hiddenWelcomeBlock') == 1 ) {
				if (uix.reinsertWelcomeBlock) {
					uix.elm.welcomeBlock.removeClass('uix_welcomeBlock_fixed');
				} else {
					uix.elm.welcomeBlock.hide();
				}
			}  
		  
			uix.elm.welcomeBlock.find('.close').on('click', function(e) {
				e.preventDefault();
				$.setCookie('hiddenWelcomeBlock', 1);
				uix.elm.welcomeBlock.css({'opacity'		: '0'});
				if (uix.reinsertWelcomeBlock) {
					window.setTimeout(function(){
						uix.elm.welcomeBlock.removeClass('uix_welcomeBlock_fixed');
						uix.elm.welcomeBlock.css('opacity', 1);
						if (uix.sidebarSticky.running) uix.sidebarSticky.update();
					}, 500);
				}
			});
		}
		if (uix.performanceLog) uix.log("~UIX.init.welcomeBlock : " + (Date.now() - performanceTimer) + " ms")
	};
		
	uix.init.setupAdminLinks = function(){
		var modTabs = $('.moderatorTabs');
		if ( modTabs.length ){
			if (uix.performanceLog) performanceTimer = Date.now();
			modTabs.children().each(function() {
				var $this = $(this);
				if ( $this.is('a') ) $this.addClass('navLink');
				if (!$this.is('li') ) $this.wrap('<li class="navTab" />');
			});
				
			$('.uix_adminMenu .blockLinksList').children().each(function() {
				var $this = $(this);
				if ( $this.is('a') ) $this.addClass('navLink');
				if (!$this.is('li') ) $this.wrap('<li class="navTab" />');
			});

			if ( $('.admin', modTabs).length ) {
				var
					$itemCounts = $('.uix_adminMenu').find('.itemCount'),
					adminListTotal = 0,
					adminListTotalUnread = 0;

				$itemCounts.each(function() {
					var $this = $(this)
					adminListTotal += parseInt( $this.text(), 10 );
					if ( $this.hasClass('alert') ) adminListTotalUnread = 1;
				});

				if (adminListTotal > 0) {
					$('.admin .itemCount', modTabs).removeClass('Zero').find('.Total').text(adminListTotal);
					if (adminListTotalUnread) $('.admin .itemCount', modTabs).addClass('alert');
				}
			}
			if (uix.performanceLog) uix.log("~UIX.init.setupAdminLinks : " + (Date.now() - performanceTimer) + " ms");
		}
	}
		
	uix.init.jumpToFixed = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		var scrollToThe = function(pos) {
			if (uix.performanceLog) performanceTimer2 = Date.now();
			if (pos == 'bottom') {
				$('html, body').stop().animate({scrollTop: $(document).height()}, 400);
			} else {
				uix.sticky.preventStickyTop = true; // stop sliding sticky from sticking
				$('html, body').stop().animate({scrollTop: 0}, 400);
				window.setTimeout(function(){uix.sticky.preventStickyTop = false;}, 400); // reallow sliding sticky to stick
			}
			if (uix.performanceLog) uix.log("~UIX.init.jumpToFixed ScrollToThe : " + (Date.now() - performanceTimer2) + " ms")
			return false;
		};
		
		var jumpToFixed = uix.elm.jumpToFixed;

		$('.topLink').on('click', function() {scrollToThe('top')});
		
		if (jumpToFixed.length) {
			jumpToFixed.find('a').on('click', function(e) {e.preventDefault(); scrollToThe( $(this).data('position') )});
			   
			if (uix.jumpToFixed_delayHide) {
				jumpToFixed.hover(
					function() {
						clearTimeout(uix.jumpToScrollTimer);
						clearTimeout(uix.jumpToScrollHideTimer);
						jumpToFixed.css({'display': 'block'});
						uix.jumpToFixedOpacity = 1;
						window.setTimeout(function(){ jumpToFixed.css({'opacity': '1'}); }, 10);
						
					}, 
					function() {
						uix.jumpToFixedOpacity = 0;
						jumpToFixed.css({'opacity': '0'});
						uix.jumpToScrollHideTimer = window.setTimeout(function(){ if (uix.jumpToFixedOpacity == 0) jumpToFixed.css({'display': 'none'}); }, 450);
					}
				);
			}
			uix.jumpToFixedRunning = true;	
		}
		if (uix.performanceLog) uix.log("~UIX.init.jumpToFixed : " + (Date.now() - performanceTimer) + " ms")
	}

	uix.init.fixScrollLocation = function(){
		if (document.location.hash && uix.sticky.scrollDetectorRunning == false) {
			if (uix.performanceLog) performanceTimer = Date.now();
			var $target = $(document.location.hash);
			var newScroll = $target.offset().top - uix.sticky.stickyHeight-(uix.globalPadding);
			if ($target.length) window.scrollTo(0,newScroll);
			if (uix.performanceLog) uix.log("~UIX.init.fixScrollLocation : " + (Date.now() - performanceTimer) + " ms");
		}
	}
		
	uix.init.mainSidebar = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		var
			mainSidebar = uix.elm.mainSidebar,
			sidebarCollapse = $('.uix_sidebar_collapse'),
			sidebarCollapsePhrase = $('.uix_sidebar_collapse_phrase'),
			mainContent = $('.mainContainer .mainContent');
			
		if ( mainSidebar.length && html.hasClass('hasSidebarToggle') ) {
		  	var
		  		marginDirection = (mainSidebar.hasClass('uix_mainSidebar_left')) ? 'marginLeft' : 'marginRight',
				origSidebarMargin = 0;

		  	if (uix.mainContainerMargin.length) origSidebarMargin = uix.mainContainerMargin;
					
			$(window).on('resize orientationchange', function(){
				if (uix.performanceLog) performanceTimer2 = Date.now();
				mainContent.css('transition', 'margin 0s');
				if (uix.windowWidth <= uix.sidebarMaxResponsiveWidth) {
					mainContent.css({
						'marginRight': 0,
						'marginLeft': 0
					});
				} else if ( mainSidebar.is(":visible") ) {
				   	mainContent.css(marginDirection, origSidebarMargin);
				}
				window.setTimeout(function(){ mainContent.css('transition', 'margin 0.4s ease-out'); }, 400)
				if (uix.performanceLog) uix.log("~UIX.init.mainSidebar Resize/OrientationChange: " + (Date.now() - performanceTimer2) + " ms")
			});
					
			sidebarCollapse.find('a').on('click', function(e) {
				e.preventDefault();
				if ( mainSidebar.is(":visible") ) {
				  	$.setCookie("collapsedSidebar", 1);
				  	sidebarCollapse.addClass('uix_sidebar_collapsed');
					sidebarCollapsePhrase.text(uix.collapsibleSidebar_phrase_open);
						
					if (uix.windowWidth > uix.sidebarMaxResponsiveWidth) {
						mainSidebar.css({'opacity'		: '0'});
				   		window.setTimeout(function(){
				   			mainSidebar.hide();
				 			mainContent.css(marginDirection, '0')
				 			window.setTimeout(function(){
				 				window.dispatchEvent(new Event('resize'));
				 			}, 400); // fix notices
				  		}, 400);
					} else {
						mainSidebar.hide();
						mainContent.css(marginDirection, 0);
					}
				} else {
				  	$.setCookie("collapsedSidebar", 0);
			   		sidebarCollapse.removeClass('uix_sidebar_collapsed');
					sidebarCollapsePhrase.text(uix.collapsibleSidebar_phrase_close);
				  	var stickyCondition = (uix.stickySidebar && uix.windowWidth > uix.sidebarMaxResponsiveWidth && !uix.sidebarSticky.running);
				  	
				  	mainSidebar.css({'opacity' : '0'}); // on refresh, still want to be 0 so it can fade in
				  	mainSidebar.show();
					if (uix.windowWidth > uix.sidebarMaxResponsiveWidth) {
				 		mainContent.css(marginDirection, 'origSidebarMargin')
				   		window.setTimeout(function(){	
					   		mainSidebar.css({'opacity'		: '1'});
					   		window.setTimeout(function(){
					   			if (stickyCondition) uix.init.stickySidebar();
					   			window.dispatchEvent(new Event('resize'));
					   		}, 400); // fix notices
				   		}, 400);
					} else {
				   		mainSidebar.show();
				   		mainSidebar.css({'opacity'		: '1'});
				   		mainContent.css(marginDirection, 0);
				   		window.dispatchEvent(new Event('resize'));
					}
				  	
				}
			});
			if ( $.getCookie('collapsedSidebar') == 1 ) {
			   	sidebarCollapse.addClass('uix_sidebar_collapsed');
				sidebarCollapsePhrase.text(uix.collapsibleSidebar_phrase_open);		
				mainSidebar.hide();
			   	mainContent.css(marginDirection, 0);
			   	window.dispatchEvent(new Event('resize'));
			   	window.setTimeout(function(){ mainContent.css('transition', 'margin 0.4s ease-out'); }, 400)
			} else {
				mainContent.css('transition',  'margin 0.4s ease-out');
			}
			uix.fn.updateSidebar() //updates sidebar css
		}
		if (uix.performanceLog) uix.log("~UIX.init.mainSidebar : " + (Date.now() - performanceTimer) + " ms")
	};

	uix.init.stickySidebar = function(){
		if (uix.performanceLog) uix.log("		UIX.init.stickySidebar start: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.sidebarSticky.innerWrapper = uix.elm.sidebar.find('.inner_wrapper');
		uix.sidebarSticky.update();
		uix.sidebarSticky.running = true;
		if (uix.performanceLog) uix.log("		UIX.init.stickySidebar end: " + (Date.now() - uix.performanceTimer) + " ms");
	};
		
	uix.init.collapsibleNodes = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		if ( html.hasClass('hasCollapseNodes') ) {
		  	if ( $.getCookie('collapsedNodes') ) { // go through each cookie, and hide nodes that are stored
				var collapsedNodes = $.getCookie("collapsedNodes"), collapsedNodes_array = collapsedNodes.split('.');
					
				$.each(collapsedNodes_array, function(index, value) {
			  		if (value) {
						$('.node_' + value + '.category > .nodeList').hide();
						$('.node_' + value).addClass("collapsed");
			  		}
				});
		  	}
				
		  	$('.uix_collapseNodes').click(function(e) {
				e.preventDefault();
				var thisNodeList = $(this).parents('.node.category').children('.nodeList');
				var nodeId = $(this).parents('.node.category').attr('id').split('.')[1]; // get the id of the clicked node
				var collapseNodes_content = '';
				if ( $.getCookie('collapsedNodes') ) collapseNodes_content = $.getCookie('collapsedNodes'); // get the contents of the cookie, the collapsed nodes

				// if the id of the node is already in the cookie, remove it's cookie otherwise create it
				var nodeIdFound = false;
				collapseNodes_contentSplit = collapseNodes_content.split('.');
				collapseNodes_result = "";
				for (var i = 0; i < collapseNodes_contentSplit.length; i++){
					if (collapseNodes_contentSplit[i] != nodeId && collapseNodes_contentSplit[i] != "")  { // add the node if it doesn't need to be removed
						collapseNodes_result = collapseNodes_result + collapseNodes_contentSplit[i] + '.';
					} else if (collapseNodes_contentSplit[i] == nodeId) {
						nodeIdFound = true;
					}
				}
				if (nodeIdFound == false) collapseNodes_result = collapseNodes_content + nodeId + '.'; // if not not found, then add it in
				
				$.setCookie("collapsedNodes", collapseNodes_result);
					
				// the animation
				if (uix.sidebarSticky.running) var stickyUpdate = window.setInterval(function(){uix.sidebarSticky.update();}, 10);
				$(this).parents('.node.category').toggleClass("collapsed").children('.nodeList').slideToggle(400, function(){
					if (uix.sidebarSticky.running) {
						window.clearInterval(stickyUpdate);
						uix.sidebarSticky.update();
					}
				});
			});
		}
		if (uix.performanceLog) uix.log("~UIX.init.collapsibleNodes : " + (Date.now() - performanceTimer) + " ms")
	}
		
	uix.init.offcanvas = function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		$('.uix_sidePane .navTab.selected').addClass('active');
		$('.uix_sidePane .SplitCtrl').on('click', function(e) {
			$('.uix_sidePane .navTab').removeClass('active');
			$(e.target).closest('.navTab').toggleClass('active');
			return false;
		});
		uix.offcanvas = {};
		uix.offcanvas.wrapper = $('.off-canvas-wrapper');
		uix.offcanvas.move = function(direction){
			uix.offcanvas.wrapper.addClass('move-'+direction);
		},
			
		uix.offcanvas.reset = function(){
			uix.offcanvas.wrapper.removeClass('move-right').removeClass('move-left');
		};
			
		$('.left-off-canvas-trigger').on('click', function(){
			uix.offcanvas.move('right');
			return false;
		});
		$('.right-off-canvas-trigger').on('click', function(){
			uix.offcanvas.move('left');
			return false;
		});
			
		$('.exit-off-canvas').on('touchstart click', function(){
			uix.offcanvas.reset();
			return false;
		});
		if (uix.performanceLog) uix.log("~UIX.init.offcanvas : " + (Date.now() - performanceTimer) + " ms")
	}

	uix.init.scrollFunctions = function(){
		var scrollTimer = null;
		var scrollDelay = 10;
		var endScroll = null;

		$window.on('touchmove gesturechange scroll', function(e){
			touchEvent();
		});

		function touchEvent(){
			if (scrollTimer == null){
				scrollUpdate();
				scrollTimer = setTimeout(function() {
					scrollTimer = null;
					window.clearTimeout(endScroll);
					endScroll = setTimeout(function(){scrollUpdate();}, 100); // check for any momentum scrolling
				}, scrollDelay);   // set new timer
			} 
		}

		function scrollUpdate(){
			if (uix.viewportRunning) uix.fn.viewportCheck();
			if (uix.sticky.running) uix.sticky.check();
			if (uix.sidebarSticky.running) uix.sidebarSticky.check();
			if (uix.jumpToFixedRunning) uix.fn.jumpToFixed();
		}
	}

	uix.init.sticky = function(){
		sticky = uix.sticky;
		sticky.set({
			betaMode: uix.betaMode,
			performanceLog: uix.performanceLog,
			minWidthDefault: uix.stickyNavigation_minWidth,
			maxWidthDefault: uix.stickyNavigation_maxWidth,
			minHeightDefault: uix.stickyNavigation_minHeight,
			maxHeightDefault: uix.stickyNavigation_maxHeight,
			stickyMinPos: uix.stickyGlobalMinimumPosition,
			postAddFunc: function(){
				setTimeout(uix.init.fixScrollLocation, 20);
			},
			postStickFunc: function(){
				if ( uix.elm.logoSmall.length && uix.elm.logo.length ) uix.fn.checkLogoVisibility();
				XenForo.updateVisibleNavigationTabs();
				XenForo.updateVisibleNavigationLinks();
			},
			postUnstickFunc: function(){
				uix.fn.checkRadius();
				if ( uix.elm.logoSmall.length && uix.elm.logo.length ) uix.fn.checkLogoVisibility();
				XenForo.updateVisibleNavigationTabs();
				XenForo.updateVisibleNavigationLinks();
			},
			postDelayUnstickFunc: function(){
				if ( uix.elm.logoSmall.length && uix.elm.logo.length ) uix.fn.checkLogoVisibility();
				if (uix.sidebarSticky.running) uix.sidebarSticky.check();
				window.setTimeout(function(){ 
					uix.fn.checkRadius();
				}, 100);
				uix.slidingSidebar = true;
				XenForo.updateVisibleNavigationTabs();
				XenForo.updateVisibleNavigationLinks();
			},
			preDelayUnstickFunc: function(){
				if (uix.elm.sidebar.length && uix.stickySidebar) {
					if (uix.stickySidebarBottomFixed == 0) { // bit of a hack, but stops sidebar flicker
						uix.sidebarSticky.innerWrapper.css({ transition: 'top 0.2s' });
					} else {
						uix.sidebarSticky.innerWrapper.css({ transition: 'top 0s' }); // remove transition to stop flicker
						uix.slidingSidebar = false;
					}
				}
				uix.sidebarSticky.check();
			}
		});

		var stickySel = $('.stickyTop')
		for (var i = 0; i < stickySel.length; i++) {
			item = "#" + stickySel[i].id
			if (uix.stickyItems[item] !== undefined && sticky.hasItem(item) == false) sticky.add(item, uix.stickyItems[item].normalHeight, uix.stickyItems[item].stickyHeight, uix.stickyItems[item].options);
		}
		
	}
		
		//check viewport on resize and orientation change
	$window.on('resize orientationchange', function(){
		if (uix.performanceLog) performanceTimer = Date.now();
		uix.init.viewportCheck(); //update viewport variables
		uix.fn.checkRadius();
		uix.fn.updateSidebar() //updates sidebar css
		uix.sidebarSticky.resize() //update stickysidebar position
		if (uix.performanceLog) uix.log("Resize or orientation change: " + (Date.now() - uix.performanceTimer) + " ms");
	});

	$window.on('load',uix.init.fixScrollLocation);
		
	uix.on('init', function(){
		if (uix.performanceLog) uix.log("Pre UIX Viewport Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.slidingSidebar = false;
		if (uix.sidebarMaxResponsiveWidthStr.replace(" ", "") == "100%") uix.sidebarMaxResponsiveWidth = 999999;
		uix.init.viewportCheck();
			
		//Beta mode warning
		if (uix.betaMode) {
			console.warn("%cUI.X IS IN BETA MODE", "color:#E74C3C;font-weight:bold");
		}

		if (uix.performanceLog) uix.log("Pre UIX Welcome Block Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.init.welcomeBlock();

		if (uix.performanceLog) uix.log("Pre UIX Jump to Fixed Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.init.jumpToFixed();

		//sidebar
		if (uix.performanceLog) uix.log("Pre UIX Sidebar Init: " + (Date.now() - uix.performanceTimer) + " ms");
		if (uix.elm.sidebar.length && uix.stickySidebar && uix.windowWidth > uix.sidebarMaxResponsiveWidth) {
			uix.elm.sidebar.wrapInner('<div class="inner_wrapper"></div>');
			uix.elm.sidebar.css({
				'width': uix.elm.sidebar_inner.outerWidth(),
				'float': uix.sidebar_innerFloat
			});
			uix.sidebarSticky.innerWrapper = uix.elm.sidebar_inner;
		}
		uix.init.mainSidebar();

		if (uix.performanceLog) uix.log("Pre UIX Collapsible Nodes Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.init.collapsibleNodes();

		if (uix.performanceLog) uix.log("Pre UIX Off Canvas Init: " + (Date.now() - uix.performanceTimer) + " ms");
		if (uix.offCanvasSidebar) uix.init.offcanvas();

		if (uix.performanceLog) uix.log("Pre UIX AdminLinks Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.init.setupAdminLinks();
		
		if (uix.performanceLog) uix.log("Pre UIX Check Radius Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.fn.checkRadius();
		
		if (uix.performanceLog) uix.log("Pre UIX Sticky Init: " + (Date.now() - uix.performanceTimer) + " ms");
		if (uix.hasSticky) uix.init.sticky();

		if (uix.performanceLog) uix.log("Pre UIX Sticky Sidebar Init: " + (Date.now() - uix.performanceTimer) + " ms");
		if (uix.elm.sidebar.length && uix.stickySidebar && uix.windowWidth > uix.sidebarMaxResponsiveWidth && uix.elm.sidebar.is(":visible")) {
			uix.init.stickySidebar();
		}

		if (uix.performanceLog) uix.log("Pre UIX Fix Scroll Location Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.init.fixScrollLocation();

		if (uix.performanceLog) uix.log("Pre UIX Scroll Functions Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.init.scrollFunctions();
		
		if (uix.performanceLog) uix.log("Pre Search Init: " + (Date.now() - uix.performanceTimer) + " ms");
		if ( $('#searchBar.hasSearchButton').length) {
			$("#QuickSearch .primaryControls span").click(function(e) {
				e.preventDefault();
				$("#QuickSearch > .formPopup").submit();
			});
		}
				
		if (uix.performanceLog) uix.log("Pre content Init: " + (Date.now() - uix.performanceTimer) + " ms");
		uix.slidingSidebar = true;
		if ( $("#content.register_form").length ) $("#loginBarHandle").hide();

	});
		
	if (uix.performanceLog) uix.log("Pre UIX Init: " + (Date.now() - uix.performanceTimer) + " ms");
	uix.init(); //Initialize UIX
	uix.log("Post UIX Init: " + (Date.now() - uix.performanceTimer) + " ms");	
});




