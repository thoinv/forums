<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @author mikespook
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

$lang = array();
$lang['title'] = 'AJAX Chat';
$lang['userName'] = '用户名';
$lang['password'] = '密码';
$lang['login'] = '登录';
$lang['logout'] = '退出';
$lang['channel'] = '频道';
$lang['style'] = '样式';
$lang['language'] = '语言';
$lang['inputLineBreak'] = '按 SHIFT + ENTER 输入新行';
$lang['messageSubmit'] = '提交';
$lang['registeredUsers'] = '注册用户';
$lang['onlineUsers'] = '在线用户';
$lang['toggleAutoScroll'] = '自动滚动 开/关';
$lang['toggleAudio'] = '声音 开/关';
$lang['toggleHelp'] = '显示/隐藏 帮助';
$lang['toggleSettings'] = '显示/隐藏 设置';
$lang['toggleOnlineList'] = '显示/隐藏 在线列表';
$lang['bbCodeLabelBold'] = '粗体';
$lang['bbCodeLabelItalic'] = '斜体';
$lang['bbCodeLabelUnderline'] = '下划线';
$lang['bbCodeLabelQuote'] = '引用';
$lang['bbCodeLabelCode'] = '代码';
$lang['bbCodeLabelURL'] = 'URL';
$lang['bbCodeLabelImg'] = 'Image';
$lang['bbCodeLabelColor'] = '文字颜色';
$lang['bbCodeTitleBold'] = '粗体：[b]文字[/b]';
$lang['bbCodeTitleItalic'] = '斜体：[i]文字[/i]';
$lang['bbCodeTitleUnderline'] = '下划线：[u]文字[/u]';
$lang['bbCodeTitleQuote'] = '引用：[quote]引用[/quote] or [quote=作者]引用[/quote]';
$lang['bbCodeTitleCode'] = '显示代码：[code]代码[/code]';
$lang['bbCodeTitleURL'] = '插入 URL：[url]http://example.org[/url] 或者 [url=http://example.org]文字[/url]';
$lang['bbCodeTitleImg'] = 'Insert image: [img]http://example.org/image.jpg[/img]';
$lang['bbCodeTitleColor'] = '文字颜色：[color=red]文字[/color]';
$lang['help'] = '帮助';
$lang['helpItemDescJoin'] = '加入频道';
$lang['helpItemCodeJoin'] = '/join 频道名';
$lang['helpItemDescJoinCreate'] = '创建私人房间（仅限注册用户）：';
$lang['helpItemCodeJoinCreate'] = '/join';
$lang['helpItemDescInvite'] = '邀请某人（例如进入私人房间）：';
$lang['helpItemCodeInvite'] = '/invite 用户名';
$lang['helpItemDescUninvite'] = '取消邀请：';
$lang['helpItemCodeUninvite'] = '/uninvite 用户名';
$lang['helpItemDescLogout'] = '推出登录：';
$lang['helpItemCodeLogout'] = '/quit';
$lang['helpItemDescPrivateMessage'] = '悄悄话';
$lang['helpItemCodePrivateMessage'] = '/msg 用户名 内容';
$lang['helpItemDescQueryOpen'] = '打开私人频道：';
$lang['helpItemCodeQueryOpen'] = '/query 用户名';
$lang['helpItemDescQueryClose'] = '关闭私人频道：';
$lang['helpItemCodeQueryClose'] = '/query';
$lang['helpItemDescAction'] = '动作描述：';
$lang['helpItemCodeAction'] = '/action 文字';
$lang['helpItemDescDescribe'] = '在悄悄话中做动作：';
$lang['helpItemCodeDescribe'] = '/describe 用户名 文字';
$lang['helpItemDescIgnore'] = '忽略/接受用户消息：';
$lang['helpItemCodeIgnore'] = '/ignore 用户名';
$lang['helpItemDescIgnoreList'] = '列出忽略用户：';
$lang['helpItemCodeIgnoreList'] = '/ignore';
$lang['helpItemDescWhereis'] = '显示用户频道：';
$lang['helpItemCodeWhereis'] = '/whereis 用户名';
$lang['helpItemDescKick'] = '踢出用户（仅限版主）：';
$lang['helpItemCodeKick'] = '/kick 用户名 [倒数秒数]';
$lang['helpItemDescUnban'] = '取消用户禁言（仅限版主）：';
$lang['helpItemCodeUnban'] = '/unban 用户名';
$lang['helpItemDescBans'] = '列出禁言用户（仅限版主）：';
$lang['helpItemCodeBans'] = '/bans';
$lang['helpItemDescWhois'] = '显示用户 IP（仅限版主）：';
$lang['helpItemCodeWhois'] = '/whois 用户名';
$lang['helpItemDescWho'] = '列出在线用户：';
$lang['helpItemCodeWho'] = '/who [频道名]';
$lang['helpItemDescList'] = '列出可用频道：';
$lang['helpItemCodeList'] = '/list';
$lang['helpItemDescRoll'] = '摇骰子：';
$lang['helpItemCodeRoll'] = '/roll [number]d[sides]';
$lang['helpItemDescNick'] = '修改用户名：';
$lang['helpItemCodeNick'] = '/nick Username';
$lang['settings'] = '设置';
$lang['settingsBBCode'] = '可用 BBCode：';
$lang['settingsBBCodeImages'] = 'Enable image BBCode:';
$lang['settingsBBCodeColors'] = 'Enable font color BBCode:';
$lang['settingsHyperLinks'] = '可用超链接：';
$lang['settingsLineBreaks'] = '可用换行：';
$lang['settingsEmoticons'] = '可用表情符号：';
$lang['settingsAutoFocus'] = '自动将焦点定位于输入框：';
$lang['settingsMaxMessages'] = '消息列表中的最大消息数：';
$lang['settingsWordWrap'] = '开启超宽换行：';
$lang['settingsMaxWordLength'] = '行宽：';
$lang['settingsDateFormat'] = '时间和日期显示格式：';
$lang['settingsPersistFontColor'] = '字体颜色：';
$lang['settingsAudioVolume'] = '音量：';
$lang['settingsSoundReceive'] = '声音提示进入信息：';
$lang['settingsSoundSend'] = '声音提示离开信息：';
$lang['settingsSoundEnter'] = '声音提示登录或进入频道信息：';
$lang['settingsSoundLeave'] = '声音提示退出或离开频道信息：';
$lang['settingsSoundChatBot'] = '声音提示机器人信息：';
$lang['settingsSoundError'] = '声音提示错误信息：';
$lang['settingsBlink'] = '有新消息时闪烁窗口标题：';
$lang['settingsBlinkInterval'] = '空闲间隔毫秒数：';
$lang['settingsBlinkIntervalNumber'] = '空闲间隔数：';
$lang['playSelectedSound'] = '播放选择的声音';
$lang['requiresJavaScript'] = '需要 JavaScript。';
$lang['errorInvalidUser'] = '不合法的用户名。';
$lang['errorUserInUse'] = '用户名已被使用。';
$lang['errorBanned'] = '用户名或 IP 被禁止。';
$lang['errorMaxUsersLoggedIn'] = '聊天室达到最大用户数。';
$lang['errorChatClosed'] = '当前聊天室暂停服务。';
$lang['logsTitle'] = 'AJAX Chat - 日志';
$lang['logsDate'] = '日期';
$lang['logsTime'] = '时间';
$lang['logsSearch'] = '搜索';
$lang['logsPrivateChannels'] = '私人频道';
$lang['logsPrivateMessages'] = '私人消息';
/* XenForo Integration */
$lang['shoutBoxPlaceholder'] = 'Type here!';
?>