!function($,window,document,_undefined)
{var propOrAttr=function($el,key,value)
{if($el.prop)
{return $el.prop(key,value);}
else
{return $el.attr(key,value);}};XenForo.bdSocialShare_TargetContainer=function($container)
{this.__construct($container);};XenForo.bdSocialShare_TargetContainer.prototype={__construct:function($container)
{this.$container=$container;this.$trigger=$container.find('a');this.$input=$container.parent().find('.bdSocialShare_Input');this.keepText=XenForo.isPositive($container.data('keeptext'));this.setup();},setup:function()
{this.$container.show();this.$trigger.bind({'bdSocialShare_Target_Chosen':$.context(this,'bdSocialShare_Target_Chosen')});this.updateTriggerText();},updateTriggerText:function()
{var value=this.$input.val(),indexOfComma=value.indexOf(','),pageName=value.substr(0,indexOfComma);if(!pageName)
{pageName=this.$container.data(value);}
if(pageName)
{if(this.keepText)
{propOrAttr(this.$trigger,'title',pageName);}
else
{this.$trigger.text(pageName);}}},bdSocialShare_Target_Chosen:function(e)
{e.api.close();var value=e.$choice.val();this.$input.val(value);if(this.$input.is(':checkbox'))
{propOrAttr(this.$input,'checked',true);}
if(this.$input.is(':disabled'))
{propOrAttr(this.$input,'disabled','');}
this.updateTriggerText();}};XenForo.bdSocialShare_Target_Choice=function($choice)
{$choice.change(function()
{var $overlay=$choice.parents('.xenOverlay'),api=$overlay.data('overlay'),$trigger=api?api.getTrigger():false;if($trigger)
{var eDataSend=$.Event('bdSocialShare_Target_Chosen');eDataSend.$overlay=$overlay;eDataSend.api=api;eDataSend.$choice=$choice;$trigger.trigger(eDataSend);}});};XenForo.bdSocialShare_XenGalleryPhotoIcon=function($container)
{var inited=$container.data('bdSocialShare_XenGalleryPhotoIcon');if(inited)
{return;}
else
{$container.data('bdSocialShare_XenGalleryPhotoIcon',true);}
$container.click(function(e)
{var $form=$container.closest('form');var photoDataIdPlaceHolder='{photo_data_id}';var $checkbox=$container.parent().find($container.data('input'));var checkboxNameIsGood=false;var name=$checkbox.attr('name');if(name.indexOf(photoDataIdPlaceHolder)>-1)
{var $li=$container.parents('li');var liId=$li.attr('id');var contentId=0;if(liId)
{if(liId.indexOf('photo')==0)
{contentId=liId.substr(5);}
if(liId.indexOf('content')==0)
{contentId=liId.substr(7);}}
if(contentId)
{$checkbox.attr('name',name.replace(photoDataIdPlaceHolder,contentId));checkboxNameIsGood=true;}}
else
{checkboxNameIsGood=true;}
if(checkboxNameIsGood)
{if($checkbox.val()!='')
{$container.removeClass('active');$checkbox.val('');}
else
{$container.addClass('active');$checkbox.val('1');}}});};XenForo.bdSocialShare_FacebookInput=function($input)
{var permissions=null;var fbMePermissionsCached=function(callback)
{if(permissions===null)
{return fbMePermissions(callback);}
else
{if(typeof callback=='function')
{return callback(permissions);}}};var fbMePermissions=function(callback)
{permissions=new Array();FB.api('/me/permissions',function(response)
{for(var i in response.data)
{if(response.data[i].status=='granted')
{permissions.push(response.data[i].permission);}}
if(typeof callback=='function')
{return callback(permissions);}});};var fbLogin=function(scope,callback)
{FB.login(function(response)
{if(typeof callback=='function')
{if(response.status=='connected')
{fbMePermissions(function(permissions)
{return callback(scope,permissions.indexOf(scope)!=-1);});}
else
{return callback(scope,false);}}},{scope:'public_profile,email,'+scope});};$input.change(function(e)
{var requiredScope='publish_actions';var fbEnabled=false;var isCheckbox=false;if($input.attr('type')=='checkbox')
{fbEnabled=$input.is(':checked');isCheckbox=true;}
else
{fbEnabled=($input.val()!=''&&$input.val()!='0');}
if(fbEnabled&&typeof FB!='undefined')
{fbMePermissionsCached(function(permissions)
{if(permissions.indexOf(requiredScope)==-1)
{fbLogin(requiredScope,function(scope,scopeGranted)
{if(scope==requiredScope&&!scopeGranted)
{if(isCheckbox)
{$input.attr('checked',false);}
else
{$input.val('');}}});}});}});};XenForo.register('.bdSocialShare_TargetContainer','XenForo.bdSocialShare_TargetContainer');XenForo.register('.bdSocialShare_Target_Choice','XenForo.bdSocialShare_Target_Choice');XenForo.register('.bdSocialShare_icon','XenForo.bdSocialShare_XenGalleryPhotoIcon');XenForo.register('input.bdSocialShare_facebookInput','XenForo.bdSocialShare_FacebookInput');}(jQuery,this,document);