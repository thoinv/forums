<?php
class Sedo_MobileStyleSelector_ControllerPublic_Misc extends XFCP_Sedo_MobileStyleSelector_ControllerPublic_Misc
{
	public function actionStyle()
	{
		$parent = parent::actionStyle();
		
		if ($this->_input->inRequest('style_id'))
		{
			if(Sedo_MobileStyleSelector_Helper_MobileStyleHelper::CheckMobile('ifMember') !== false)
			{
				//isMobile & isMember
				XenForo_Helper_Cookie::setCookie('mobile_style_id', $this->_input->inRequest('style_id'), 86400 * 365);
			}
			return $parent;
		}
		
		$chk = Sedo_MobileStyleSelector_Helper_MobileStyleHelper::CheckMobile('ifForced');
		
		if($chk ==! false)
		{
			//isMobile & isForced
			foreach($parent->params['styles'] as $key => $style)
			{
				if($style['style_id'] != $chk)
				{
					unset($parent->params['styles'][$key]);
				}		
			}
		}

		return $parent;
	}
}
//Zend_Debug::dump($class);