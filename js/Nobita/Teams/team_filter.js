!function(e,t,n,r){XenForo.EventListenerOption=function(e){this.__construct(e)};XenForo.EventListenerOption.prototype={__construct:function(t){this.$select=t;this.url=t.data("descurl");this.$target=e(t.data("desctarget"));if(!this.url||!this.$target.length){return}t.bind({keyup:e.context(this,"fetchDescriptionDelayed"),change:e.context(this,"fetchDescription")});if(t.val().length){this.fetchDescription()}},fetchDescriptionDelayed:function(){if(this.delayTimer){clearTimeout(this.delayTimer)}this.delayTimer=setTimeout(e.context(this,"fetchDescription"),250)},fetchDescription:function(){if(!this.$select.val().length){this.$target.html("");return}if(this.xhr){this.xhr.abort()}this.xhr=XenForo.ajax(this.url,{team_category_id:this.$select.val()},e.context(this,"ajaxSuccess"),{error:true})},ajaxSuccess:function(e){if(e){this.$target.html(e.description)}else{this.$target.html("")}}};XenForo.register("select.EventListenerOption","XenForo.EventListenerOption")}(jQuery,this,document)