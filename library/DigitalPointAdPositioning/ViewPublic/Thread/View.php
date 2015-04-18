<?php
class DigitalPointAdPositioning_ViewPublic_Thread_View extends XFCP_DigitalPointAdPositioning_ViewPublic_Thread_View
{
	public function renderHtml()
	{
		parent::renderHtml();		
		
		if (strpos($this->_params['unreadLink'], '#post-'))
		{
			$postIdForAd = intval(substr($this->_params['unreadLink'], strpos($this->_params['unreadLink'], '#post-') + 6));			
		}
		else
		{
			$postIdForAd = $this->_params['firstPost']['post_id'];
		}

		if (!isset($this->_params['posts'][$postIdForAd]))
		{
			reset($this->_params['posts']);
			$postIdForAd = key($this->_params['posts']);
		}		
		
		
		$userModel = XenForo_Model::create('XenForo_Model_User');
		
		$options = XenForo_Application::getOptions();
		
		try
		{
			if (
				$options->dppa_insidepost
					&&
				(!@$GLOBALS['adsenseRestrict'] || !strpos($options->dppa_insidepost_html, 'pagead2.googlesyndication.com'))
					&&
				(
					in_array($this->_params['thread']['node_id'], $options->dppa_insidepost_forceforums)
						||
					!$userModel->isMemberOfUserGroup(XenForo_Visitor::getInstance()->toArray(), $options->dppa_insidepost_hidegroups)
				)
					&&
				(!$userModel->isMemberOfUserGroup(@@$this->_params['posts'][@$postIdForAd], $options->dppa_insidepost_hidepostby) || !XenForo_Visitor::getUserId())
			)
			{
				if (!empty($this->_params['posts'][@$postIdForAd]['messageHtml']))
				{
					// Casting this object to a string, so the __ToString() magic method doesn't get triggered 4 times (each time you do something like substr() on it).
					$html = (string)@$this->_params['posts'][@$postIdForAd]['messageHtml'];
					preg_match_all("#<br />(" . chr(13) . '|' .  chr(10) . '|' .  chr(13) . chr(10) . ") *?<br />#U", $html, $matches, PREG_OFFSET_CAPTURE);

					$matches[0][] = array (1 => strlen($html));				
			
					$pick = array_rand($matches[0]);
					$offset = $matches[0][$pick][1]; 
					$part1 = substr($html, 0, $offset) . '<br />';
					$part2 = substr($html, $offset + (isset($matches[0][$pick][0]) ? 6 : 0));
						
					if ((substr_count($part1, '<div ') - substr_count($part1, '</div>')) > 0)
					{						
						$part1 = $html;
						$part2 = '';
					}
			
					$this->_params['posts'][$postIdForAd]['messageHtml'] = $part1 . (isset($this->_params['dp_ads']['adMiddle']) ? $this->_params['dp_ads']['adMiddle'] : $options->dppa_insidepost_html) . $part2;
				}
			}
		}
		catch(Exception $e)
		{

		}

		if (
			$options->dppa_afterpost
				&&
			!$userModel->isMemberOfUserGroup(XenForo_Visitor::getInstance()->toArray(), $options->dppa_afterpost_hidegroups)
		)
		{
			$this->_params['posts'][$postIdForAd]['showAdUnderPost'] = true;
		}
		
		
		// need to use $GLOBALS because params aren't passed by reference when we are rolling counter
		$GLOBALS['showAdUnderPostCounter'] = 0;
	}
}