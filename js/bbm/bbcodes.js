!function(n){XenForo.BbmSpoiler=function(t){t.find(".bbm_spoiler_noscript").addClass("bbm_spoiler").removeClass("bbm_spoiler_noscript"),t.find(".button").css("display","inline-block"),t.find(".button").toggle(function(){n(this).parent().parent(".bbmSpoilerBlock").children(".quotecontent").children(".bbm_spoiler").show(),n(this).children(".bbm_spoiler_show").hide(),n(this).children(".bbm_spoiler_hide").show()},function(){n(this).parent().parent(".bbmSpoilerBlock").children(".quotecontent").children(".bbm_spoiler").hide(),n(this).children(".bbm_spoiler_show").show(),n(this).children(".bbm_spoiler_hide").hide()})},XenForo.register(".bbmSpoilerBlock","XenForo.BbmSpoiler")}(jQuery,this,document);