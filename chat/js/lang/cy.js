/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 * @translation Alan Davies, ardavies@tiscali.co.uk
 * @language: Welsh (Cymraeg)
 */

// Ajax Chat language Object:
var ajaxChatLang = {
	
	login: 'Mae %s wedi mewngofnodi.',
	logout: 'Allgofnododd %s.',
	logoutTimeout: 'Allgofnodwyd %s (Terfyn amser).',
	logoutIP: 'Allgofnodwyd %s (Cyfeiriad IP annilys).',
	logoutKicked: 'Allgofnodwyd %s (Cic).',
	channelEnter: 'Mae %s wedi ymuno â\'r sianel.',
	channelLeave: 'Mae %s wedi gadael y sianel.',
	privmsg: '(sibrwd)',
	privmsgto: '(sibrwd i %s)',
	invite: 'Mae %s yn eich gwahodd i ymuno â %s.',
	inviteto: 'Mae eich gwahoddiad i %s i ymuno â sianel %s wedi\'i anfon.',
	uninvite: 'Mae %s yn tynnu\'r gwahoddiad i sianel %s yn ôl.',
	uninviteto: 'Mae\'r neges yn tynnu\'r gwahoddiad i sianel %s yn ôl wedi\'i hanfon.',	
	queryOpen: 'Agorwyd sianel breifat i %s.',
	queryClose: 'Ceuwyd sianel breifat i %s.',
	ignoreAdded: 'Ychwanegwyd %s i\'r anwybyddion.',
	ignoreRemoved: 'Tynnwyd %s bant o\'r anwybyddion.',
	ignoreList: 'Anwybyddion:',
	ignoreListEmpty: 'Dim anwybyddion wedi\'u rhestru.',
	who: 'Defnyddwyr Ar-lein:',
	whoChannel: 'Defnyddwyr Ar-lein ar sianel %s:',
	whoEmpty: 'Dim defnyddwyr ar-lein ar y sianel hon.',
	list: 'Sianeli ar gael:',
	bans: 'Gwaharddogion:',
	bansEmpty: 'Dim gwaharddogion wedi\'u rhestru.',
	unban: 'Diddymwyd gwaharddiad %s.',
	whois: 'Defnyddiwr %s - cyfeiriad IP:',
	whereis: 'Mae defnyddiwr %s yn y sianel %s.',
	roll: 'Mae %s yn rholio %s a chael %s.',
	nick: 'Enw %s nawr yw %s.',
	toggleUserMenu: 'Togl dewislen defnyddiwr ar gyfer %s',
	userMenuLogout: 'Allgofnodi',
	userMenuWho: 'Rhestr ddefnyddwyr ar-lein',
	userMenuList: 'Rhestr sianeli ar gael',
	userMenuAction: 'Disgrifio gweithred',
	userMenuRoll: 'Rholio dis',
	userMenuNick: 'Newid enw',
	userMenuEnterPrivateRoom: 'Myned i mewn i ystafell breifat',
	userMenuSendPrivateMessage: 'Anfon neges breifat',
	userMenuDescribe: 'Anfon gweithred breifat',
	userMenuOpenPrivateChannel: 'Agor sianel breifat',
	userMenuClosePrivateChannel: 'Cau sianel breifat',
	userMenuInvite: 'Gwahodd',
	userMenuUninvite: 'Tynnu gwahoddiad',
	userMenuIgnore: 'Anwybyddu/Derbyn',
	userMenuIgnoreList: 'Rhestr anwybyddion',
	userMenuWhereis: 'Dangos sianel',
	userMenuKick: 'Cic/Gwahardd',
	userMenuBans: 'Rhestr waharddogion',
	userMenuWhois: 'Dangos IP',
	unbanUser: 'Diddynu gwaharddiad %s',
	joinChannel: 'Ymuno â sianel %s',
	cite: 'Dywedodd %s:',
	urlDialog: 'Rhowch gyfeiriad (URL) y wefan:',
	deleteMessage: 'Dilëwch y neges hon',
	deleteMessageConfirm: 'Ydych wir am ddileu\'r neges hon?',
	errorCookiesRequired: 'Mae nagen cwcis ar gyfer y sgwrs hon.',
	errorUserNameNotFound: 'Gwall: Heb ffeindio %s.',
	errorMissingText: 'Gwall: testun neges ar goll.',
	errorMissingUserName: 'Gwall: Enw ar goll.',
	errorInvalidUserName: 'Gwall: Enw annilys.',
	errorUserNameInUse: 'Gwall: Enw\'n bodoli eisoes.',
	errorMissingChannelName: 'Gwall: Enw sianel ar goll.',
	errorInvalidChannelName: 'Gwall: Enw sianel annilys: %s',
	errorPrivateMessageNotAllowed: 'Gwall: Ni chaniateir negesuon preifat.',
	errorInviteNotAllowed: 'Gwall: Nid oes hawl gwahodd rhywun i\'r sianel hon.',
	errorUninviteNotAllowed: 'Gwall: Nid oes hawl tynnu gwahaoddiad yn ôl o\'r sianel hon.',
	errorNoOpenQuery: 'Gwall: Dim sianel breifat ar agor.',
	errorKickNotAllowed: 'Gwall: Nid oes hawl cicio %s.',
	errorCommandNotAllowed: 'Gwall: Nid oes hawl defnyddio\'r gorchymyn: %s',
	errorUnknownCommand: 'Gwall: Gorchymyn anhysbys: %s',
	errorMaxMessageRate: 'Gwall: Rydych wedi myn dros y nifer o negeseuon sydd hawl gennych anfon pob munud.',
	errorConnectionTimeout: 'Gwall: Terfyn amser cysylltiad. Ceisiwch eto.',
	errorConnectionStatus: 'Gwall: Statws cysylltiad: %s',
	errorSoundIO: 'Gwall: Methu â llwytho ffeil sain (Gwall Flash IO).',
	errorSocketIO: 'Gwall: Cysylltiad i\'r gweinyddwr soced wedi methu (Gwall Flash IO).',
	errorSocketSecurity: 'Gwall: Cysylltiad i\'r gweinyddwr soced wedi methu (Gwall Diogelwch Flash).',
	errorDOMSyntax: 'Gwall: Cystrawen DOM Annilys (DOM ID: %s).',
	
	/* XenForo Integration */
	reportMessage: 'Report message'
}