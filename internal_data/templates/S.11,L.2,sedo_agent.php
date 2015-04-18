<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$agent = '';
$agent .= htmlspecialchars($message['sedo_agent'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
if ($agent AND XenForo_Template_Helper_Core::callHelper('sedo_at_perms', array()))
{
$__output .= '
	';
$at_device_start = '';
$at_device_start .= '<span class="sedo_at_devicetype ' . htmlspecialchars($agent, ENT_QUOTES, 'UTF-8') . '">';
$__output .= '

	';
if ($sedoAtSimple)
{
$__output .= '
		';
$this->addRequiredExternal('css', 'sedo_agent_simple');
$__output .= '
		';
$at_message = '';
$at_message .= '<span class="sedo_at_from">' . 'via' . '</span>';
$__output .= '
		';
$at_device_end = '';
$at_device_end .= '</span>' . ',';
$__output .= '
	';
}
else
{
$__output .= '
		';
$this->addRequiredExternal('css', 'sedo_agent');
$__output .= '	
		';
$at_message = '';
$at_message .= 'Sent from';
$__output .= '
		';
$at_device_end = '';
$at_device_end .= '</span>';
$__output .= '
		<div class="sedo_at_wrapper">
	';
}
$__output .= '

	

	';
if ($xenOptions['sedo_at_displaymaxinfo'])
{
$__output .= '
		';
if ($agent == ('isBlackBerryTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a BlackBerry tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isiPad'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an iPad' . $at_device_end . '' . '
		';
}
else if ($agent == ('isKindle'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Kindle' . $at_device_end . '' . '	      			
		';
}
else if ($agent == ('isSamsungTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Samsung Tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isHTCtablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a HTC tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMotorolaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Motorola tablet' . $at_device_end . '' . '  			
		';
}
else if ($agent == ('isAsusTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Asus Tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNookTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nook Tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAcerTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Acer tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isYarvikTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Yarvik tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isToshibaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Toshiba tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isCubeTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Cube tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isCobyTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Coby tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSMiTTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a SMiT tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isRockChipTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a RockChip tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTelstraTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Telstra tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPlaystationTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Playstation device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNabiTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nabi tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNecTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nec tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isHuaweiTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Huawei tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isbqTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Bq tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isFlyTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Fly tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isLGTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'sedo_at_isLGTablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSurfaceTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Surface tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isHPTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a HP tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isFujitsuTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Fujitsu tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPrestigioTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Prestigio tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isLenovoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Lenovo tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isIntensoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Intenso tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isIRUTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an IRU tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMegafonTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Megafon tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isEbodaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Eboda tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAllViewTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an AllView tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSonyTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Sony tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMIDTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a MID tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPantechTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Pantech tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isBronchoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Broncho tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isVersusTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Versus tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isZyncTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Zync tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPositivoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Positivo tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isKoboTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Kobo tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isDanewTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Danew tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTexetTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Texet tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTrekstorTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Trekstor tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPyleAudioTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a PyleAudio tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAdvanTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Advan tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isDanyTechTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a DanyTech tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isGalapadTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Galapad tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMicromaxTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Micromax tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isKarbonnTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Karbonn tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAllFineTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a AllFine tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPROSCANTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Proscan tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isYONESTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Yonest tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isChangJiaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a ChangJia tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isGUTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a GU tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPointOfViewTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a PointOfView tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isOvermaxTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Overmax tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isHCLTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a HCL tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isDPSTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a DPS tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isVistureTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Visture tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isCrestaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Cresta tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMediatekTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Mediatek tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isConcordeTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Concorde tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isGoCleverTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a GoClever tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isModecomTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Modecom tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isVoninoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Vonino tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isECSTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a ECS tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isStorexTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Storex tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isVodafoneTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Vodafone tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isEssentielBTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an EssentielB tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isRossMoorTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a RossMoor tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isiMobileTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an iMobile tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTolinoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Tolino tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAudioSonicTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an AudioSonic tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAMPETablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Ampet tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSkkTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Skk tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTecnoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Tecno tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isJXDTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a JXD tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isiJoyTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an iJoy tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isFX2Tablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a FX2 tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isXoroTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Xoro tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isViewsonicTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Viewsonic tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isOdysTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Odys tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isCaptivaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Captiva tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isIconbitTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Iconbit tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isTeclastTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Teclast tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isJaytechTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Jaytech tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isBlaupunktTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Blaupunkt tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isDigmaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Digma tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isEvolioTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Evolio tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isLavaTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Lava tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isCelkonTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Celkon tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMiTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Mi tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNibiruTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nibiru tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNexoTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nexo tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isUbislateTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Ubislate tablet' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPocketBookTablet'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a PocketBook tablet' . $at_device_end . '' . '
	
		';
}
else if ($agent == ('isiPhone'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an iPhone' . $at_device_end . '' . '
		';
}
else if ($agent == ('isBlackBerry'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a BlackBerry' . $at_device_end . '' . '
		';
}
else if ($agent == ('isHTC'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a HTC device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNexus'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nexus device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isDellStreak'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Dell Streak' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMotorola'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Motorola device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSamsung'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Samsung mobile device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSony'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Sony mobile device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAsus'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Asus mobile device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isPalm'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Palm device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isFly'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Fly device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isLG'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a LG device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isMicromax'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Micromax device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isiMobile'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an iMobile device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isSimValley'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a SimValley device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isWolfgang'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Wolfgang device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAlcatel'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Alcatel device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isNintendo'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a Nintendo device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isAmoi'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an Amoi device' . $at_device_end . '' . '
		';
}
else if ($agent == ('isINQ'))
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'an INQ device' . $at_device_end . '' . '
		';
}
else
{
$__output .= '
			' . '' . $at_message . ' ' . $at_device_start . 'a mobile device' . $at_device_end . '' . '
		';
}
$__output .= '
	';
}
else
{
$__output .= '
		' . '' . $at_message . ' ' . $at_device_start . 'a mobile device' . $at_device_end . '' . '
	';
}
$__output .= '

	';
if (!$sedoAtSimple)
{
$__output .= '
		</div>
	';
}
$__output .= '

';
}
