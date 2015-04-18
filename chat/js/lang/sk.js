/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @author Peter
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

// Ajax Chat language Object:
var ajaxChatLang = {
	
	login: '%s sa prihlásil do chatu.',
	logout: '%s sa odhlásil z chatu.',
	logoutTimeout: '%s bol odhlásený pre neaktivitu.',
	logoutIP: '%s bol odhlásený (nesprávna IP adresa).',
	logoutKicked: '%s bol odhlásený (vylúčený).',
	channelEnter: '%s vstúpil do kanálu.',
	channelLeave: '%s opustil kanál.',
	privmsg: '(súkromný hovor)',
	privmsgto: '(súkromne hovorí s %s)',
	invite: '%s vás pozýva na rozhovor %s.',
	inviteto: 'Vaša pozvánka na rozhovor s %s v kanáli %s dola odoslaná.',
	uninvite: '%s neprijal Vaše pozvanie z kanálu %s.',
	uninviteto: 'Vaše pozvanie pre %s v kanáli %s bolo poslané.',
	queryOpen: 'Súkromný kanál s %s otvorený.',
	queryClose: 'Súkromný kanál s %s zatvorený.',
	ignoreAdded: '%s je pridaný do zoznamu zamietnutých.',
	ignoreRemoved: '%s je odstránený zo zoznamu zamietnutých.',
	ignoreList: 'Zamietnutí užívatelia:',
	ignoreListEmpty: 'Zoznam zamietnutých užívateľov je prázdny.',
	who: 'Pripojení užívatelia:',
	whoChannel: 'Online Users in channel %s:',
	whoEmpty: 'Žiadni pripojení užívatelia na danom kanáli.',
	list: 'Dostupné kanály:',
	bans: 'Vylúčení užívatelia:',
	bansEmpty: 'Zoznam vylúčených užívateľov je prázdny.',
	unban: 'Vylúčenie užívateľa %s je zrušené.',
	whois: 'Užívateľová %s - IP adresa:',
	whereis: 'User %s is in channel %s.',
	roll: '%s hodil %s a padlo mu číslo %s.',
	nick: '%s is now known as %s.',
	toggleUserMenu: 'Toggle user menu for %s',
	userMenuLogout: 'Logout',
	userMenuWho: 'List online users',
	userMenuList: 'List available channels',
	userMenuAction: 'Describe action',
	userMenuRoll: 'Roll dice',
	userMenuNick: 'Change username',
	userMenuEnterPrivateRoom: 'Enter private room',
	userMenuSendPrivateMessage: 'Send private message',
	userMenuDescribe: 'Send private action',
	userMenuOpenPrivateChannel: 'Open private channel',
	userMenuClosePrivateChannel: 'Close private channel',
	userMenuInvite: 'Invite',
	userMenuUninvite: 'Uninvite',
	userMenuIgnore: 'Ignore/Accept',
	userMenuIgnoreList: 'List ignored users',
	userMenuWhereis: 'Display channel',
	userMenuKick: 'Kick/Ban',
	userMenuBans: 'List banned users',
	userMenuWhois: 'Display IP',
	unbanUser: 'Revoke ban of user %s',
	joinChannel: 'Pripojiť kanál %s',
	cite: '%s povedal:',
	urlDialog: 'Prosím, vložte adresu (URL) webstránky:',
	deleteMessage: 'Delete this chat message',
	deleteMessageConfirm: 'Really delete the selected chat message?',
	errorCookiesRequired: 'Tento chat vyžaduje mať povolené Cookies.',
	errorUserNameNotFound: 'Chyba: Užívateľ %s nenájdený.',
	errorMissingText: 'Chyba: Chýba text správy.',
	errorMissingUserName: 'Chyba: Chýba meno užívateľa.',
	errorInvalidUserName: 'Error: Invalid username.',
	errorUserNameInUse: 'Error: Username already in use.',
	errorMissingChannelName: 'Chyba: Chýba meno kanálu.',
	errorInvalidChannelName: 'Chyba: Nesprávne meno kanálu: %s',
	errorPrivateMessageNotAllowed: 'Chyba: Súkromné správy nie sú povolené.',
	errorInviteNotAllowed: 'Chyba: Nemáte povolenie pozívať užívateľov do tohoto kanálu.',
	errorUninviteNotAllowed: 'Chyba: Nemáte povolenie zamietnuť pozvanie užívateľov z tohoto kanálu.',
	errorNoOpenQuery: 'Chyba: Súkromný kanál nie je otvorený.',
	errorKickNotAllowed: 'Chyba: Nie ste oprávnený vylúčiť %s.',
	errorCommandNotAllowed: 'Chyba: Príkaz nie je povolený: %s',
	errorUnknownCommand: 'Chyba: Neznámy príkaz: %s',
	errorMaxMessageRate: 'Error: You exceeded the maximum number of messages per minute.',
	errorConnectionTimeout: 'Chyba: Vypršal časový limit pripojenia. Skúste prosím znovu.',
	errorConnectionStatus: 'Chyba: Stav pripojenia: %s',
	errorSoundIO: 'Error: Failed to load sound file (Flash IO Error).',
	errorSocketIO: 'Error: Connection to socket server failed (Flash IO Error).',
	errorSocketSecurity: 'Error: Connection to socket server failed (Flash Security Error).',
	errorDOMSyntax: 'Error: Invalid DOM Syntax (DOM ID: %s).',
	
	/* XenForo Integration */
	reportMessage: 'Report message'
}