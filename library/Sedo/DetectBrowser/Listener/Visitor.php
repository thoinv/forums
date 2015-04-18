<?php
class Sedo_DetectBrowser_Listener_Visitor
{
	private static $IE;

	public static function BrowserDetect(XenForo_Visitor &$visitor)
	{
		if(!isset($visitor['getBrowser']))
		{
			//Ini values to avoid 'Undefined index' errors
			$wip = array(
				'isIE' => false,
				'IEis' => false,
				'isMobile' => false,
				'isTablet' => false,
				'mobile' => array(
					'phones' => array(
						'isiPhone' => false,
						'isBlackBerry' => false,
						'isHTC' => false,
						'isNexus' => false,
						'isDellStreak' => false,
						'isMotorola' => false,
						'isSamsung' => false,
						'isSony' => false,
						'isAsus' => false,
						'isPalm' => false,
						//Version 2.5.5
						'isFly' => false,
						//Version 2.7.9
						'isLG' => false,
						'isMicromax' => false,
						'isiMobile' => false,
						'isSimValley' => false,
						//Version 2.8.11
						'isWolfgang' => false,
						'isAlcatel' => false,
						'isNintendo' => false,
						'isAmoi' => false,
						'isINQ' => false,				
						//Generic
						'isGenericPhone' => false,
					),
					'tablets' => array(	
						'isBlackBerryTablet' => false,
						'isiPad' => false,
						'isKindle' => false,
						'isSamsungTablet' => false,
						'isHTCtablet' => false,
						'isMotorolaTablet' => false,
						'isAsusTablet' => false,
						'isNookTablet' => false,
						'isAcerTablet' => false,
						'isYarvikTablet' => false,
	    					//Version 2.5.3
	    					'isToshibaTablet' => false,
	    					'isCubeTablet' => false,
	    					'isCobyTablet' => false,
	    					'isSMiTTablet' => false,
	    					'isRockChipTablet' => false,
	    					'isTelstraTablet' => false,
	    					//Version 2.5.5
	    					'isPlaystationTablet' => false,
	    					'isNabiTablet' => false,
	    					'isNecTablet' => false,
	    					'isHuaweiTablet' => false,
	    					'isbqTablet' => false,
	    					'isFlyTablet' => false,
	    					'isLGTablet' => false,
	    					//Version 2.7.9
						'isSurfaceTablet' => false,
						'isHPTablet' => false,
						'isFujitsuTablet' => false,
						'isPrestigioTablet' => false,
						'isLenovoTablet' => false,
						'isIntensoTablet' => false,
						'isIRUTablet' => false,
						'isMegafonTablet' => false,
						'isEbodaTablet' => false,
						'isAllViewTablet' => false,
						'isSonyTablet' => false,
						'isMIDTablet' => false,
						'isPantechTablet' => false,
						'isBronchoTablet' => false,
						'isVersusTablet' => false,
						'isZyncTablet' => false,
						'isPositivoTablet' => false,
						'isKoboTablet' => false,
						'isDanewTablet' => false,
						'isTexetTablet' => false,
						'isTrekstorTablet' => false,
						'isPyleAudioTablet' => false,
						'isAdvanTablet' => false,
						'isDanyTechTablet' => false,
						'isGalapadTablet' => false,
						'isMicromaxTablet' => false,
						'isKarbonnTablet' => false,
						'isAllFineTablet' => false,
						'isPROSCANTablet' => false,
						'isYONESTablet' => false,
						'isChangJiaTablet' => false,
						'isGUTablet' => false,
						'isPointOfViewTablet' => false,
						'isOvermaxTablet' => false,
						'isHCLTablet' => false,
						'isDPSTablet' => false,
						'isVistureTablet' => false,
						'isCrestaTablet' => false,
						'isMediatekTablet' => false,
						'isConcordeTablet' => false,
						'isGoCleverTablet' => false,
						'isModecomTablet' => false,
						'isVoninoTablet' => false,
						'isECSTablet' => false,
						'isStorexTablet' => false,
						'isVodafoneTablet' => false,
						'isEssentielBTablet' => false,
						'isRossMoorTablet' => false,
						'isiMobileTablet' => false,
						'isTolinoTablet' => false,
						'isHudl' => false,
						//Version 2.8.11
						'isAudioSonicTablet' => false,
						'isAMPETablet' => false,
						'isSkkTablet' => false,
						'isTecnoTablet' => false,
						'isJXDTablet'  => false,
						'isiJoyTablet' => false,
						'isFX2Tablet' => false,
						'isXoroTablet' => false,
						'isViewsonicTablet' => false,
						'isOdysTablet' => false,
						'isCaptivaTablet' => false,
						'isIconbitTablet' => false,
						'isTeclastTablet' => false,
						'isJaytechTablet' => false,
						'isBlaupunktTablet' => false,
						'isDigmaTablet' => false,
						'isEvolioTablet' => false,
						'isLavaTablet' => false,
						'isCelkonTablet' => false,
						'isMiTablet' => false,
						'isNibiruTablet' => false,
						'isNexoTablet' => false,
						'isUbislateTablet' => false,
						'isPocketBookTablet' => false,
	    					//Generic
						'isGenericTablet' => false
					),
					'os' => array(
						'isAndroidOS' => false,
						'isBlackBerryOS' => false,
						'isPalmOS' => false,
						'isSymbianOS' => false,
						'isWindowsMobileOS' => false,
						'isiOS' => false,
						'isJavaOS' => false,
						'isNokiaOS' => false,
						'iswebOS' => false,
						'isbadaOS' => false,
						'isBREWOS' => false
					),
					'browser' => array(
						//Doesn't work well because broswers let users select which useragent they want to use; ie: Dolfin (Dolphin)
						'isChrome' => false,
						'isDolfin' => false,
						'isOpera' => false,
						'isSkyfire' => false,
						'isIE' => false,
						'isFirefox' => false,
						'isBolt' => false,
						'isTeaShark' => false,
						'isBlazer' => false,
						'isSafari' => false,
						//Version 2.5.3
	      					'isMidori' => false,
	      					'isDiigoBrowser' => false,
	      					'isPuffin' => false,
						//Version 2.7.9
	      					'isMercury' => false,
						//Version 2.8.11
						'isbaiduboxapp' => false,
						'isbaidubrowser' => false,
						'isObigoBrowser' => false,
						'isNetFront' => false,
						//Generic
	      					'isGenericBrowser' => false
					)
				)
			);

      			if( isset($_SERVER['HTTP_USER_AGENT']) )
      			{
      				$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);

      				//Check if mobile
      				$Mobiledetect = new Sedo_DetectBrowser_Helper_MobileDetect();
      				if( $Mobiledetect->isMobile() )
      				{
					$wip['isMobile'] = true;
					
					$wip['mobile']['phones'] = array(
						'isiPhone' => $Mobiledetect->isiPhone(),
						'isBlackBerry' => $Mobiledetect->isBlackBerry(),
						'isHTC' => $Mobiledetect->isHTC(),
						'isNexus' => $Mobiledetect->isNexus(),
						'isDellStreak' => $Mobiledetect->isDellStreak(),
						'isMotorola' => $Mobiledetect->isMotorola(),
						'isSamsung' => $Mobiledetect->isSamsung(),
						'isSony' => $Mobiledetect->isSony(),
						'isAsus' => $Mobiledetect->isAsus(),
						'isPalm' => $Mobiledetect->isPalm(),
						//Version 2.5.5
						'isFly' => $Mobiledetect->isFly(),
						//Version 2.7.9
						'isLG' => $Mobiledetect->isLG(),
						'isMicromax' => $Mobiledetect->isMicromax(),
						'isiMobile' => $Mobiledetect->isiMobile(),
						'isSimValley' => $Mobiledetect->isSimValley(),
						'isWolfgang' => $Mobiledetect->isWolfgang(),
						'isAlcatel' => $Mobiledetect->isAlcatel(),
						'isNintendo' => $Mobiledetect->isNintendo(),
						'isAmoi' => $Mobiledetect->isAmoi(),
						'isINQ' => $Mobiledetect->isINQ(),							
						//Generic
						'isGenericPhone' => $Mobiledetect->isGenericPhone()
					);
					
					$wip['mobile']['os'] = array(
      						'isAndroidOS' => $Mobiledetect->isAndroidOS(),
      						'isBlackBerryOS' => $Mobiledetect->isBlackBerryOS(),
      						'isPalmOS' => $Mobiledetect->isPalmOS(),
      						'isSymbianOS' => $Mobiledetect->isSymbianOS(),
      						'isWindowsMobileOS' => $Mobiledetect->isWindowsMobileOS(),
      						'isiOS' => $Mobiledetect->isiOS(),
      						'isJavaOS' => $Mobiledetect->isJavaOS(),
      						'isNokiaOS' => $Mobiledetect->isNokiaOS(),
      						'iswebOS' => $Mobiledetect->iswebOS(),
      						'isbadaOS' => $Mobiledetect->isbadaOS(),
      						'isBREWOS' => $Mobiledetect->isBREWOS()
					);

					$wip['mobile']['browser'] = array(
						//Doesn't work well because broswers let users select which useragent they want to use; ie: Dolfin (Dolphin)
						'isChrome' => $Mobiledetect->isChrome(),
      						'isDolfin' => $Mobiledetect->isDolfin(),
      						'isOpera' => $Mobiledetect->isOpera(),
      						'isSkyfire' => $Mobiledetect->isSkyfire(),
      						'isIE' => $Mobiledetect->isIE(),
      						'isFirefox' => $Mobiledetect->isFirefox(),
      						'isBolt' => $Mobiledetect->isBolt(),
      						'isTeaShark' => $Mobiledetect->isTeaShark(),
      						'isBlazer' => $Mobiledetect->isBlazer(),
      						'isSafari' => $Mobiledetect->isSafari(),
      						//Version 2.5.3
      	      					'isMidori' => false, //had been taken back
      	      					'isDiigoBrowser' => $Mobiledetect->isDiigoBrowser(),
      	      					'isPuffin' => $Mobiledetect->isPuffin(),
      						//Version 2.7.9
            					'isMercury' => $Mobiledetect->isMercury(),
						//Version 2.8.11
						'isbaiduboxapp' => $Mobiledetect->isbaiduboxapp(),
						'isbaidubrowser' => $Mobiledetect->isbaidubrowser(),
						'isObigoBrowser' => $Mobiledetect->isObigoBrowser(),
						'isNetFront' => $Mobiledetect->isNetFront(),            					
      						//Generic
      	      					'isGenericBrowser' => $Mobiledetect->isGenericBrowser()
					);
					
      					//TABLETS
      					if( $Mobiledetect->isTablet() )
      					{
	      					$wip['isTablet'] = true;
						$wip['mobile']['tablets'] = array(
	      						'isBlackBerryTablet' => $Mobiledetect->isBlackBerryTablet(),
	      						'isiPad' => $Mobiledetect->isiPad(),
	      						'isKindle' => $Mobiledetect->isKindle(),
	      						'isSamsungTablet' => $Mobiledetect->isSamsungTablet(),
	      						'isHTCtablet' => $Mobiledetect->isHTCtablet(),
	      						'isMotorolaTablet' => $Mobiledetect->isMotorolaTablet(),
	      						'isAsusTablet' => $Mobiledetect->isAsusTablet(),
	      						'isNookTablet' => $Mobiledetect->isNookTablet(),
	      						'isAcerTablet' => $Mobiledetect->isAcerTablet(),
	      						'isYarvikTablet' => $Mobiledetect->isYarvikTablet(),
	      						
	      						//Version 2.5.3
	      						'isToshibaTablet' => $Mobiledetect->isToshibaTablet(),
	      						'isCubeTablet' => $Mobiledetect->isCubeTablet(),
	      						'isCobyTablet' => $Mobiledetect->isCobyTablet(),
	      						'isSMiTTablet' => $Mobiledetect->isSMiTTablet(),
	      						'isRockChipTablet' => $Mobiledetect->isRockChipTablet(),
	      						'isTelstraTablet' => $Mobiledetect->isTelstraTablet(),
	
	      						//Version 2.5.5
	    						'isPlaystationTablet' => $Mobiledetect->isPlaystationTablet(),
	    						'isNabiTablet' => $Mobiledetect->isNabiTablet(),
	    						'isNecTablet' => $Mobiledetect->isNecTablet(),
	    						'isHuaweiTablet' => $Mobiledetect->isHuaweiTablet(),
	    						'isbqTablet' => $Mobiledetect->isbqTablet(),
		    					'isFlyTablet' => $Mobiledetect->isFlyTablet(),
		    					'isLGTablet' => $Mobiledetect->isLGTablet(),
	
		    					//Version 2.7.9
							'isSurfaceTablet' => $Mobiledetect->isSurfaceTablet(),
							'isHPTablet' => $Mobiledetect->isHPTablet(),
							'isFujitsuTablet' => $Mobiledetect->isFujitsuTablet(),
							'isPrestigioTablet' => $Mobiledetect->isPrestigioTablet(),
							'isLenovoTablet' => $Mobiledetect->isLenovoTablet(),
							'isIntensoTablet' => $Mobiledetect->isIntensoTablet(),
							'isIRUTablet' => $Mobiledetect->isIRUTablet(),
							'isMegafonTablet' => $Mobiledetect->isMegafonTablet(),
							'isEbodaTablet' => $Mobiledetect->isEbodaTablet(),
							'isAllViewTablet' => $Mobiledetect->isAllViewTablet(),
							'isSonyTablet' => $Mobiledetect->isSonyTablet(),
							'isMIDTablet' => $Mobiledetect->isMIDTablet(),
							'isPantechTablet' => $Mobiledetect->isPantechTablet(),
							'isBronchoTablet' => $Mobiledetect->isBronchoTablet(),
							'isVersusTablet' => $Mobiledetect->isVersusTablet(),
							'isZyncTablet' => $Mobiledetect->isZyncTablet(),
							'isPositivoTablet' => $Mobiledetect->isPositivoTablet(),
							'isKoboTablet' => $Mobiledetect->isKoboTablet(),
							'isDanewTablet' => $Mobiledetect->isDanewTablet(),
							'isTexetTablet' => $Mobiledetect->isTexetTablet(),
							'isTrekstorTablet' => $Mobiledetect->isTrekstorTablet(),
							'isPyleAudioTablet' => $Mobiledetect->isPyleAudioTablet(),
							'isAdvanTablet' => $Mobiledetect->isAdvanTablet(),
							'isDanyTechTablet' => $Mobiledetect->isDanyTechTablet(),
							'isGalapadTablet' => $Mobiledetect->isGalapadTablet(),
							'isMicromaxTablet' => $Mobiledetect->isMicromaxTablet(),
							'isKarbonnTablet' => $Mobiledetect->isKarbonnTablet(),
							'isAllFineTablet' => $Mobiledetect->isAllFineTablet(),
							'isPROSCANTablet' => $Mobiledetect->isPROSCANTablet(),
							'isYONESTablet' => $Mobiledetect->isYONESTablet(),
							'isChangJiaTablet' => $Mobiledetect->isChangJiaTablet(),
							'isGUTablet' => $Mobiledetect->isGUTablet(),
							'isPointOfViewTablet' => $Mobiledetect->isPointOfViewTablet(),
							'isOvermaxTablet' => $Mobiledetect->isOvermaxTablet(),
							'isHCLTablet' => $Mobiledetect->isHCLTablet(),
							'isDPSTablet' => $Mobiledetect->isDPSTablet(),
							'isVistureTablet' => $Mobiledetect->isVistureTablet(),
							'isCrestaTablet' => $Mobiledetect->isCrestaTablet(),
							'isMediatekTablet' => $Mobiledetect->isMediatekTablet(),
							'isConcordeTablet' => $Mobiledetect->isConcordeTablet(),
							'isGoCleverTablet' => $Mobiledetect->isGoCleverTablet(),
							'isModecomTablet' => $Mobiledetect->isModecomTablet(),
							'isVoninoTablet' => $Mobiledetect->isVoninoTablet(),
							'isECSTablet' => $Mobiledetect->isECSTablet(),
							'isStorexTablet' => $Mobiledetect->isStorexTablet(),
							'isVodafoneTablet' => $Mobiledetect->isVodafoneTablet(),
							'isEssentielBTablet' => $Mobiledetect->isEssentielBTablet(),
							'isRossMoorTablet' => $Mobiledetect->isRossMoorTablet(),
							'isiMobileTablet' => $Mobiledetect->isiMobileTablet(),
							'isTolinoTablet' => $Mobiledetect->isTolinoTablet(),
							'isHudl' => $Mobiledetect->isHudl(),

							//Version 2.8.11
							'isAudioSonicTablet' => $Mobiledetect->isAudioSonicTablet(),
							'isAMPETablet' => $Mobiledetect->isAMPETablet(),
							'isSkkTablet' => $Mobiledetect->isSkkTablet(),
							'isTecnoTablet' => $Mobiledetect->isTecnoTablet(),
							'isJXDTablet' => $Mobiledetect->isJXDTablet(),
							'isiJoyTablet' => $Mobiledetect->isiJoyTablet(),
							'isFX2Tablet' => $Mobiledetect->isFX2Tablet(),
							'isXoroTablet' => $Mobiledetect->isXoroTablet(),
							'isViewsonicTablet' => $Mobiledetect->isViewsonicTablet(),
							'isOdysTablet' => $Mobiledetect->isOdysTablet(),
							'isCaptivaTablet' => $Mobiledetect->isCaptivaTablet(),
							'isIconbitTablet' => $Mobiledetect->isIconbitTablet(),
							'isTeclastTablet' => $Mobiledetect->isTeclastTablet(),
							'isJaytechTablet' => $Mobiledetect->isJaytechTablet(),
							'isBlaupunktTablet' => $Mobiledetect->isBlaupunktTablet(),
							'isDigmaTablet' => $Mobiledetect->isDigmaTablet(),
							'isEvolioTablet' => $Mobiledetect->isEvolioTablet(),
							'isLavaTablet' => $Mobiledetect->isLavaTablet(),
							'isCelkonTablet' => $Mobiledetect->isCelkonTablet(),
							'isMiTablet' => $Mobiledetect->isMiTablet(),
							'isNibiruTablet' => $Mobiledetect->isNibiruTablet(),
							'isNexoTablet' => $Mobiledetect->isNexoTablet(),
							'isUbislateTablet' => $Mobiledetect->isUbislateTablet(),
							'isPocketBookTablet' => $Mobiledetect->isPocketBookTablet(),

							//Generic
		      					'isGenericTablet' => $Mobiledetect->isGenericTablet()
						);
      					}
      				}

      				//Check if IE
      				if(self::isIE($useragent) == true)
      				{
      					$wip['isIE'] = true;
      					$wip['IEis'] = self::$IE['version'];
      				}      											
			}

			//Insert into visitor object
			$visitor['getBrowser'] = $wip;
			//Zend_Debug::dump($wip);
		}
	}

	public static function isIE($useragent)
	{
		/***
		 *	Home made function - tested without IE and IEtester
		 **/
		if(preg_match('/msie/', $useragent))
       		{
      			if (preg_match('/trident\/(\d{1,2})/', $useragent, $match))
       			{
      				$IE['version'] = $match[1] + 4;
	       		}
       			else
       			{
      				preg_match('/msie (\d{1,2})/', $useragent, $match);
				if(!isset($match[1]) || empty($match[1]))
				{
					$IE['version'] = 'unknown';
				}
				else
				{
	     				$IE['version'] = $match[1];
	     			}
	       		}
	       		
			self::$IE = $IE;
			
	       		return true;
	       	}
	       	elseif(strpos($useragent, 'like gecko') !== false && preg_match('#trident/(\d{1,2})\.(\d{1,2})#', $useragent, $match))
	       	{
	       		if(intval($match[1]) == 7)
	       		{
	       			//Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv 11.0) like Gecko
	       			$IE['version'] = 11;
	       			self::$IE = $IE;
				return true;
	       		}
	       	}	       	

		return false;
	}
}	
//Zend_Debug::dump($abc);