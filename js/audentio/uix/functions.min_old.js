$(document).ready(function(){var e=$(window),t=$("html"),n=$("head"),r=$("body");uix.windowWidth=0;uix.windowHeight=0;uix.scrollTop=window.scrollY||document.documentElement.scrollTop;var i=[];for(var s in uix.stickyItems){i.push(s);uix.stickyItems[s].elm=$(s);uix.stickyItems[s].offset=uix.stickyItems[s].elm.offset();uix.stickyItems_length++}uix.elm={sticky:$(i.join()),navigation:$("#navigation"),userBar:$("#moderatorBar"),logo:$("#logo"),logoBlock:$("#logoBlock"),logoSmall:$("#logo_small"),jumpToFixed:$("#uix_jumpToFixed"),mainSidebar:$(".uix_mainSidebar"),mainContent:$(".mainContent"),mainContainer:$(".mainContainer"),welcomeBlock:$("#uix_welcomeBlock"),stickyCSS:$("#uixStickyCSS")};uix.elm.sidebar=$(".uix_mainSidebar");uix.elm.sidebar_inner=uix.elm.sidebar.find(".sidebar");uix.hasSticky=uix.stickyItems_length?true:false;uix.stickyHeight=0;uix.stickyRunning=false;uix.contentHeight=uix.elm.mainContent.outerHeight();uix.emBreak=uix.elm.mainContainer.scrollTop();uix.resizeTimer=undefined;uix.log=function(e){if(uix.betaMode){console.log(e)}};uix.info=function(e){if(uix.betaMode){console.info(e)}};uix.sticky={stick:function(e){var t=uix.stickyItems[e].elm,n=uix.stickyItems[e].wrapper,r=uix.stickyItems[e].normalHeight;$(".lastSticky").removeClass("lastSticky");t.addClass("lastSticky").removeClass("inactiveSticky").addClass("activeSticky").css("height",r);n.css("top",uix.stickyHeight);uix.stickyHeight+=uix.stickyItems[e].stickyHeight;if(uix.elm.logoSmall.length&&uix.elm.logo.length){uix.fn.checkLogoVisibility()}},unstick:function(e){var t=uix.stickyItems[e].elm,n=uix.stickyItems[e].wrapper,r=uix.stickyItems[e].stickyHeight;t.addClass("inactiveSticky").removeClass("lastSticky").removeClass("activeSticky").css("height","");n.css("top","");uix.stickyHeight-=r;$(".activeSticky").last().addClass("lastSticky");if(uix.elm.logoSmall.length&&uix.elm.logo.length){uix.fn.checkLogoVisibility()}},check:function(){for(var e=0,t=uix.elm.sticky.length;e<t;e++){var n="#"+uix.elm.sticky[e].id,r=uix.stickyItems[n],i=r.elm,s=r.wrapper,o=s[0].getBoundingClientRect().top;if(i.hasClass("activeSticky")){if(!r.alwaysSticky&&i[0].getBoundingClientRect().top>=o){uix.sticky.unstick(n)}}else{if(o-uix.stickyHeight<=0){uix.sticky.stick(n)}}}}};uix.sidebarSticky={running:false,update:function(){uix.sidebarSticky.sidebarOffset=uix.elm.sidebar.offset();uix.sidebarSticky.sidebarFromLeft=uix.sidebarSticky.sidebarOffset.left;uix.sidebarSticky.mainContainerHeight=uix.elm.mainContainer.outerHeight();uix.sidebarSticky.bottomLimit=uix.elm.mainContainer.offset().top+uix.sidebarSticky.mainContainerHeight;uix.sidebarSticky.maxTop=uix.sidebarSticky.bottomLimit-(uix.sidebarSticky.sidebarOffset.top+uix.sidebarSticky.sidebarHeight);uix.sidebarSticky.check()},check:function(){if(uix.sidebarSticky.mainContainerHeight>=uix.sidebarSticky.sidebarHeight){var e=uix.sidebarSticky.sidebarOffset.top-(uix.stickyHeight+uix.scrollTop),t=uix.sidebarSticky.bottomLimit-uix.scrollTop;if(t-uix.stickyHeight<=uix.sidebarSticky.sidebarHeight+uix.globalPadding){uix.sidebarSticky.fixBottom()}else if(uix.elm.sidebar.hasClass("sticky")&&e-uix.globalPadding>0){uix.sidebarSticky.unstick()}else if(t-uix.stickyHeight>uix.sidebarSticky.sidebarHeight+uix.globalPadding&&e-uix.globalPadding<=0){uix.sidebarSticky.stick()}}else if(uix.sidebarSticky.running){uix.sidebarSticky.unstick()}},stick:function(){uix.elm.sidebar.addClass("sticky");uix.sidebarSticky.innerWrapper.css({top:uix.stickyHeight+uix.globalPadding,left:uix.sidebarSticky.sidebarOffset.left})},unstick:function(){uix.elm.sidebar.removeClass("sticky");uix.sidebarSticky.innerWrapper.css({top:"",left:""})},fixBottom:function(){uix.elm.sidebar.removeClass("sticky");uix.sidebarSticky.innerWrapper.css({top:uix.sidebarSticky.maxTop,left:""})},reset:function(){uix.sidebarSticky.unstick();uix.sidebarSticky.innerWrapper.css("width","");e.off("scroll.sidebarStickyCheck");uix.sidebarSticky.running=false}};uix.fn={determineIfLandscape:function(e){if(e<=400){t.addClass("isLandscape");return true}else{t.removeClass("isLandscape");return false}},checkRadius:function(){var t=function(e,t){if(!t){e.addClass("noBorderRadius")}else{$direction=t.charAt(0).toUpperCase()+t.slice(1);e.addClass("noBorderRadius"+$direction)}},n=function(e){e.removeClass("noBorderRadius").removeClass("noBorderRadiusTop").removeClass("noBorderRadiusBottom")};var r=["#logoBlock .pageContent","#content .pageContent","#userBar .pageContent","#navigation .pageContent",".footer .pageContent","#uix_footer_columns .pageContent",".footerLegal .pageContent"],i=$("#uix_wrapper"),s=i.offset();var o=r;var u={};for(var a=0;a<r.length;a++){var f=o[a],l=$(f);u[f]={};n(l);if(l.length){var c=l.outerHeight(),h=l.offset();if(h.top==s.top){t(l,"top")}if(h.top+c==s.top){t(l,"bottom")}for(var p=0;p<o.length;p++){var d=$(o[p]);if(d.length){var v=d.outerHeight(),m=d.offset();if(o[a]!=o[p]){var g=h.top-(m.top+v)==0,y=h.top+c==m.top;if(g){t(l,"top");u[f]["top"]="reset"}else if(u[f]["top"]!="reset"){l.removeClass("noBorderRadiusTop")}if(y){t(l,"bottom");u[f]["bottom"]="reset"}else if(u[f]["bottom"]!="reset"){l.removeClass("noBorderRadiusBottom")}}}}if(l.outerWidth()==e.width()){t(l)}}}},checkLogoVisibility:function(){if(uix.elm.navigation.hasClass("activeSticky")){var e=uix.elm.logo.offset().top+uix.elm.logo.outerHeight(true)/2,n=uix.elm.navigation.find(".sticky_wrapper"),r=n.offset().top+n.outerHeight(true);if(e<r){t.addClass("activeSmallLogo")}else{t.removeClass("activeSmallLogo")}}else{t.removeClass("activeSmallLogo")}}};uix.init.scrollDetector=function(){var n=0;e.on("scroll",function(){if(uix.scrollTop>n){uix.scrollDirection="down";t.removeClass("scrollDirection-up").addClass("scrollDirection-down")}else{uix.scrollDirection="up";t.removeClass("scrollDirection-down").addClass("scrollDirection-up")}n=uix.scrollTop})},uix.init.viewportCheck=function(){var n=window,r="inner";if(!window.innerWidth){r="client";n=document.documentElement||document.body}var i={width:n[r+"Width"],height:n[r+"Height"]};uix.windowWidth=i.width;uix.windowHeight=i.height;e.on("scroll",function(){uix.scrollTop=window.scrollY||document.documentElement.scrollTop;if(uix.scrollTop==0){t.removeClass("scrollNotTouchingTop")}else if(!t.hasClass("scrollNotTouchingTop")){t.addClass("scrollNotTouchingTop")}})};uix.init.welcomeBlock=function(){if(uix.elm.welcomeBlock.length&&uix.elm.welcomeBlock.hasClass("uix_welcomeBlock_fixed")){if($.getCookie("hiddenWelcomeBlock")==1){if(uix.reinsertWelcomeBlock){uix.elm.welcomeBlock.removeClass("uix_welcomeBlock_fixed")}else{uix.elm.welcomeBlock.hide()}}uix.elm.welcomeBlock.find(".close").on("click",function(e){e.preventDefault();$.setCookie("hiddenWelcomeBlock",1);uix.elm.welcomeBlock.fadeOut("slow",function(){if(uix.reinsertWelcomeBlock){uix.elm.welcomeBlock.removeClass("uix_welcomeBlock_fixed");uix.elm.welcomeBlock.fadeIn()}})})}};uix.init.setupTabLinks=function(){$(".moderatorTabs").children().each(function(){var e=$(this);if(e.is("a")){e.addClass("navLink")}if(!e.is("li")){e.wrap('<li class="navTab" />')}});$(".uix_adminMenu .blockLinksList").children().each(function(){var e=$(this);if(e.is("a")){e.addClass("navLink")}if(!e.is("li")){e.wrap('<li class="navTab" />')}});if($(".moderatorTabs .admin").length){var e=$(".uix_adminMenu").find(".itemCount"),t=0,n=0;e.each(function(){var e=$(this);t+=parseInt(e.text(),10);if(e.hasClass("alert")){n=1}});if(t>0){$(".moderatorTabs .admin .itemCount").removeClass("Zero").find(".Total").text(t);if(n){$(".moderatorTabs .admin .itemCount").addClass("alert")}}}};uix.init.jumpToFixed=function(){var t=function(e){if(e=="bottom"){$("html, body").stop().animate({scrollTop:$(document).height()},400)}else{$("html, body").stop().animate({scrollTop:0},400)}return false};var n=uix.elm.jumpToFixed;$(".topLink").on("click",function(){t("top")});if(n.length){n.find("a").on("click",function(){t($(this).data("position"))});if(uix.jumpToFixed_delayHide){n.hover(function(){clearTimeout(r);n.stop(true,true).show()},function(){n.stop(true,true).fadeOut()})}var r=null;e.scroll(function(){if(uix.jumpToFixed_delayHide){if(r){clearTimeout(r)}}if(uix.scrollTop>140){if(uix.elm.jumpToFixed.is(":hidden")){n.stop().fadeIn();if(uix.jumpToFixed_delayHide){r=setTimeout(function(){r=null;n.stop(true,true).fadeOut()},1500)}}}else{if(uix.elm.jumpToFixed.is(":visible")){n.stop().fadeOut()}}})}};uix.init.fixScrollLocation=function(){if(document.location.hash){var e=$(document.location.hash);var t=e.offset().top-uix.stickyHeight-uix.globalPadding;if(e.length){window.scrollTo(0,t)}}};uix.init.mainSidebar=function(){var e=uix.elm.mainSidebar,n=$(".uix_sidebar_collapse"),r=$(".uix_sidebar_collapse_phrase"),i=$(".mainContainer .mainContent");if(e.length&&t.hasClass("hasSidebarToggle")){var s=parseInt(uix.maxResponsiveWideWidth,10),o=e.hasClass("uix_mainSidebar_left")?"left":"right",u,a=0;if(uix.mainContainerMargin.length){a=uix.mainContainerMargin}$(window).on("resize orientationchange",function(){if(uix.windowWidth<=s){i.css("marginRight",0);i.css("marginLeft",0)}else{if(e.is(":visible")){if(o=="left"){i.css("marginLeft",a)}else{i.css("marginRight",a)}}}});if($.getCookie("collapsedSidebar")==1){n.addClass("uix_sidebar_collapsed");r.text(uix.collapsibleSidebar_phrase_open);e.hide();if(o=="left"){i.css("marginLeft",0)}else{i.css("marginRight",0)}}n.find("a").on("click",function(t){t.preventDefault();if(e.is(":visible")){$.setCookie("collapsedSidebar",1);n.addClass("uix_sidebar_collapsed");r.text(uix.collapsibleSidebar_phrase_open);if(o=="left"){if(uix.windowWidth>s){e.fadeOut("slow",function(){i.stop().animate({marginLeft:0})})}else{e.hide();i.css("marginLeft",0)}}else{if(uix.windowWidth>s){e.fadeOut("slow",function(){i.stop().animate({marginRight:0})})}else{e.hide();i.css("marginRight",0)}}}else{$.setCookie("collapsedSidebar",0);n.removeClass("uix_sidebar_collapsed");r.text(uix.collapsibleSidebar_phrase_close);var u=uix.stickySidebar&&uix.windowWidth>800&&!uix.sidebarSticky.running;if(o=="left"){if(uix.windowWidth>s){i.animate({marginLeft:a},function(){e.fadeIn(400,function(){if(u){uix.init.stickySidebar()}})})}else{e.show();i.css("marginLeft",0);if(u){uix.init.stickySidebar()}}}else{if(uix.windowWidth>s){i.stop().animate({marginRight:a},function(){e.fadeIn(400,function(){if(u){uix.init.stickySidebar()}})})}else{e.show();if(u){uix.init.stickySidebar()}i.css("marginRight",0)}}}})}};uix.modernSticky={stick:function(e,t){e.css("top",t).addClass("positionSticky")},unstick:function(e){e.css("top","").removeClass("positionSticky")}};uix.init.stickySidebar=function(){var t=uix.elm.sidebar;uix.sidebarSticky.sidebarOffset=t.offset();uix.sidebarSticky.sidebarFromLeft=uix.sidebarSticky.sidebarOffset.left;uix.sidebarSticky.sidebarHeight=t.outerHeight();uix.sidebarSticky.mainContainerHeight=uix.elm.mainContainer.outerHeight();uix.sidebarSticky.innerWrapper=t.find(".inner_wrapper");uix.sidebarSticky.innerWrapper.css("width",t.outerWidth());uix.sidebarSticky.bottomLimit=uix.elm.mainContent.offset().top+uix.sidebarSticky.mainContainerHeight;uix.sidebarSticky.maxTop=uix.sidebarSticky.bottomLimit-(uix.sidebarSticky.sidebarOffset.top+uix.sidebarSticky.sidebarHeight);uix.sidebarSticky.check();e.on("scroll.sidebarStickyCheck",uix.sidebarSticky.check);uix.sidebarSticky.running=true};uix.init.collapsibleNodes=function(){if(t.hasClass("hasCollapseNodes")){if($.getCookie("collapsedNodes")){var e=$.getCookie("collapsedNodes"),n=e.split(".");$.each(n,function(e,t){if(t){$(".node_"+t+".category > .nodeList").hide();$(".node_"+t).addClass("collapsed")}})}$(".uix_collapseNodes").click(function(e){e.preventDefault();var t=$(this).parents(".node.category").children(".nodeList");var n=$(this).parents(".node.category").attr("id").split(".")[1];var r="";if($.getCookie("collapsedNodes")){r=$.getCookie("collapsedNodes")}if(r.indexOf(n+".")>=0){r=r.replace(n+".","")}else{r=r+n+"."}$.setCookie("collapsedNodes",r);$(this).parents(".node.category").toggleClass("collapsed").children(".nodeList").slideToggle(400,function(){uix.sidebarSticky.update()})})}};uix.init.offcanvas=function(){$(".uix_sidePane .navTab.selected").addClass("active");$(".uix_sidePane .SplitCtrl").on("click",function(e){$(".uix_sidePane .navTab").removeClass("active");$(e.target).closest(".navTab").toggleClass("active");return false});uix.offcanvas={};uix.offcanvas.wrapper=$(".off-canvas-wrapper");uix.offcanvas.move=function(e){uix.offcanvas.wrapper.addClass("move-"+e)},uix.offcanvas.reset=function(){uix.offcanvas.wrapper.removeClass("move-right").removeClass("move-left")};$(".left-off-canvas-trigger").on("click",function(){uix.offcanvas.move("right");return false});$(".right-off-canvas-trigger").on("click",function(){uix.offcanvas.move("left");return false});$(".exit-off-canvas").on("touchstart click",function(){uix.offcanvas.reset();return false})};uix.init.sticky=function(){var t=0;uix.elm.sticky.each(function(){r=$(this),n=uix.stickyItems["#"+r.attr("id")];if(r.offset().top==t){n.alwaysSticky=true;t+=n.stickyHeight}});uix.stickyHeight=0;uix.stickyLast=uix.elm.sticky.last();uix.stickyLastBottom=uix.stickyLast.offset().top+uix.stickyLast.outerHeight();for(var n in uix.stickyItems){var r=uix.stickyItems[n].elm;if(!r.find(".sticky_wrapper").length){r.wrapInner('<div class="sticky_wrapper"></div>').addClass("inactiveSticky")}uix.stickyItems[n].wrapper=r.find(".sticky_wrapper")}uix.sticky.check();e.on("scroll.stickyCheck",uix.sticky.check);if(uix.elm.logoSmall.length&&uix.elm.logo.length){uix.fn.checkLogoVisibility()}uix.stickyRunning=true;setTimeout(uix.init.fixScrollLocation,20)};e.on("load resize orientationchange",function(){uix.init.viewportCheck();uix.fn.checkRadius();if(uix.stickySidebar){if(uix.windowWidth>parseInt(uix.maxResponsiveWideWidth)){uix.elm.sidebar.css({width:uix.sidebarWidth,"float":uix.sidebar_innerFloat})}else{uix.elm.sidebar.css({width:"","float":""})}}if(uix.elm.sidebar.length&&uix.stickySidebar&&uix.elm.sidebar.is(":visible")){uix.sidebarSticky.update();if(uix.windowWidth>parseInt(uix.maxResponsiveWideWidth)&&uix.sidebarSticky.running){if(uix.elm.sidebar.hasClass("sticky")){uix.sidebarSticky.innerWrapper.css({left:uix.sidebarSticky.sidebarFromLeft})}else{uix.sidebarSticky.innerWrapper.css("left","")}}else if(uix.windowWidth>parseInt(uix.maxResponsiveWideWidth)&&!uix.sidebarSticky.running){uix.init.stickySidebar()}else{uix.sidebarSticky.reset()}}uix.stickySizeCondition=uix.windowHeight<uix.stickyNavigation_maxHeight&&uix.windowHeight>uix.stickyNavigation_minHeight&&uix.windowWidth<uix.stickyNavigation_maxWidth&&uix.windowWidth>uix.stickyNavigation_minWidth;if(uix.hasSticky){if(uix.stickySizeCondition&&!uix.stickyRunning){uix.init.sticky();uix.sticky.check()}else if(!uix.stickySizeCondition&&uix.stickyRunning){for(var t in uix.stickyItems){uix.sticky.unstick(t)}e.off("scroll.stickyCheck");uix.stickyHeight=0;uix.stickyRunning=false}}});e.on("load",uix.init.fixScrollLocation);uix.on("init",function(){uix.init.viewportCheck();uix.stickySizeCondition=uix.windowHeight<uix.stickyNavigation_maxHeight&&uix.windowHeight>uix.stickyNavigation_minHeight&&uix.windowWidth<uix.stickyNavigation_maxWidth&&uix.windowWidth>uix.stickyNavigation_minWidth;if(uix.betaMode){console.warn("%cUI.X IS IN BETA MODE","color:#E74C3C;font-weight:bold")}uix.init.welcomeBlock();uix.init.jumpToFixed();if(uix.elm.sidebar.length&&uix.stickySidebar){uix.elm.sidebar.wrapInner('<div class="inner_wrapper"></div>');uix.elm.sidebar.css({width:uix.elm.sidebar_inner.outerWidth(),"float":uix.sidebar_innerFloat});uix.sidebarSticky.innerWrapper=uix.elm.sidebar_inner}uix.init.mainSidebar();uix.init.collapsibleNodes();uix.init.offcanvas();uix.init.setupTabLinks();uix.fn.checkRadius();if(uix.hasSticky&&uix.stickySizeCondition){uix.init.sticky()}if(uix.elm.sidebar.length&&uix.stickySidebar&&uix.windowWidth>800&&uix.elm.sidebar.is(":visible")){uix.init.stickySidebar()}uix.init.fixScrollLocation();if($("#searchBar.hasSearchButton").length){$("#QuickSearch .primaryControls span").click(function(e){e.preventDefault();$("#QuickSearch > .formPopup").submit()})}if($("#content.register_form").length){$("#loginBarHandle").hide()}});uix.init()})