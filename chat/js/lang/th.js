/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 * @Translate by Charge01 @ http://www.thaira2lovers.co.cc
 */

// Ajax Chat language Object:
var ajaxChatLang = {
	
	login: '%s เข้าสู่ห้องแชท',
	logout: '%s ออกจากห้องแชท',
	logoutTimeout: '%s ออกจากห้องแชทแล้ว (Timeout).',
	logoutIP: '%s ออกจากระบบแล้ว (IP address ไม่ถูกต้อง).',
	logoutKicked: '%s ออกจากระบบแล้ว (ถูกไล่).',
	channelEnter: '%s เข้าห้องมา',
	channelLeave: '%s ออกห้องไป',
	privmsg: '(กระซิบ)',
	privmsgto: '(กระซิบไป %s)',
	invite: '%s เชิญให้ %s เข้าร่วม',
	inviteto: 'การเชิญ %s เพื่อเข้าสู่ห้อง %s ถูกส่งแล้ว',
	uninvite: '%s ถอนคำเชิญออกจากห้อง %s.',
	uninviteto: 'การเชิญ %s สำหรับห้อง %s ถูกส่งแล้ว',	
	queryOpen: 'ห้องส่วนตัวถูกเปิดที่ %s',
	queryClose: 'ห้องส่วนตัว %s ถูกปิด',
	ignoreAdded: 'เพิ่ม %s สู่รายการไม่สนใจ',
	ignoreRemoved: 'ลบ %s ออกจากรายการไม่สนใจ',
	ignoreList: 'ผู้ใช้ที่ถูกไม่สนใจ:',
	ignoreListEmpty: 'ไม่มีผู้ใช้ที่ไม่สนใจ',
	who: 'ผู้ใช้ออนไลนอยู่:',
	whoChannel: 'ผู้ใช้ออนไลน์ในห้อง %s:',
	whoEmpty: 'ไม่มีผู้ใช้ออนไลน์อยู่ในห้อง',
	list: 'ห้องแชทที่มีอยู่:',
	bans: 'ผู้ใช้ถูกแบน:',
	bansEmpty: 'ไม่มีผู้ใช้ที่ถูกแบน',
	unban: 'การแบนของ %s ถูกยกเลิก',
	whois: 'ผู้ใช้ %s - IP address:',
	whereis: 'ผู้ใช้ %s อยู่ในห้อง %s.',
	roll: '%s rolls %s and gets %s.',
	nick: '%s ตอนนี้เปลี่ยนชื่อเป็น %s.',
	toggleUserMenu: 'เปิดเมนูสำหรับ %s',
	userMenuLogout: 'ออกจากระบบ',
	userMenuWho: 'รายชื่อผู้ใช้',
	userMenuList: 'รายชื่อห้องที่ปรากฎ',
	userMenuAction: 'บอกกล่าวการกระทำ',
	userMenuRoll: 'ทอยลูกเต๋า',
	userMenuNick: 'เปลี่ยนชื่อ',
	userMenuEnterPrivateRoom: 'เข้้าห้องส่วนตัว',
	userMenuSendPrivateMessage: 'ส่งข้อความส่วนตัว',
	userMenuDescribe: 'ส่งการกระทำส่วนตัว',
	userMenuOpenPrivateChannel: 'เปิดห้องแชทส่วนตัว',
	userMenuClosePrivateChannel: 'ปิดห้องแชทส่วนตัว',
	userMenuInvite: 'เชิญ',
	userMenuUninvite: 'ถอนคำเชิญ',
	userMenuIgnore: 'ไม่สนใจ/ยอมรับ',
	userMenuIgnoreList: 'รายชื่อผู้ใช้ที่ไม่สนใจ',
	userMenuWhereis: 'แสดงห้องแชท',
	userMenuKick: 'ไล่/แบน',
	userMenuBans: 'รายชื่อที่ถูกแบน',
	userMenuWhois: 'แสดง IP',
	unbanUser: 'ปลดการแบนของผู้ใช้ %s',
	joinChannel: 'ร่วมห้อง %s',
	cite: '%s พูด:',
	urlDialog: 'กรุณาใส่ที่อยู่เว็บ (URL):',
	deleteMessage: 'ลบข้อความแชทนี้',
	deleteMessageConfirm: 'แน่ใจว่าจะลบข้อความที่เลือกนี้?',
	errorCookiesRequired: 'ห้องแชทนี้ต้องการใช้งานคุกกี้',
	errorUserNameNotFound: 'Error: ไม่พบผู้ใช้ %s',
	errorMissingText: 'Error: ข้อความหายไป',
	errorMissingUserName: 'Error: ผู้ใช้หายไป',
	errorInvalidUserName: 'Error: ผู้ใช้ไม่ถูกต้อง',
	errorUserNameInUse: 'Error: ผู้ใช้นี้ถูกใช้งานอยู่',
	errorMissingChannelName: 'Error: ชื่อห้องแชทหายไป',
	errorInvalidChannelName: 'Error: ชื่อห้องแชทไม่ถูกต้อง: %s',
	errorPrivateMessageNotAllowed: 'Error: ไม่อนุญาตข้อความส่วนตัว',
	errorInviteNotAllowed: 'Error: ไม่อนุญาตให้คุณเชิญใครในห้องนี้',
	errorUninviteNotAllowed: 'Error: ไม่อนุญาตให้คุณถอดการเชิญในห้องนี้',
	errorNoOpenQuery: 'Error: ไม่เปิดห้องส่วนตัว',
	errorKickNotAllowed: 'Error: ไม่อนุญาตให้คุณไล่ %s.',
	errorCommandNotAllowed: 'Error: ไม่อนุญาตคำสั่ง : %s',
	errorUnknownCommand: 'Error: คำสั่งอะไรเนีย: %s',
	errorMaxMessageRate: 'Error: ส่งข้อความเกินกำหนดใน 1 นาที',
	errorConnectionTimeout: 'Error: การเชื่อมต่อหมดเวลา กรุณาลองอีกครั้ง',
	errorConnectionStatus: 'Error: สถานะการเชื่อมต่อ: %s',
	errorSoundIO: 'Error: โหลดไฟล์เสียงผิดพลาด (อาจเกิดจาก Flash IO Error, โปรแกรมช่วยดาวน์โหลด).',
	errorSocketIO: 'Error: การเชื่อมต่อถึง socket เซิร์ฟเวอร์ผิดพลาด (อาจเกิดจาก Flash IO Error).',
	errorSocketSecurity: 'Error: การเชื่อมต่อถึง socket เซิร์ฟเวอร์ผิดพลาด (Flash Security Error).',
	errorDOMSyntax: 'Error: DOM Syntax ไม่ถูกต้อง (DOM ID: %s).',
	
	/* XenForo Integration */
	reportMessage: 'Report message'
}