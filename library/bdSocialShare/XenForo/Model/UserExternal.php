<?php

class bdSocialShare_XenForo_Model_UserExternal extends XFCP_bdSocialShare_XenForo_Model_UserExternal
{
	public function updateExternalAuthAssociationExtra($userId, $provider, array $extra = null)
	{
		$response = parent::updateExternalAuthAssociationExtra($userId, $provider, $extra);

		if (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_FACEBOOK]))
		{
			if ($provider === 'facebook')
			{
				$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_FACEBOOK]->bdSocialShare_actionFacebook($this);
			}
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_TWITTER]))
		{
			if ($provider === 'twitter')
			{
				$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_TWITTER]->bdSocialShare_actionTwitter($this);
			}
		}

		return $response;
	}

}
