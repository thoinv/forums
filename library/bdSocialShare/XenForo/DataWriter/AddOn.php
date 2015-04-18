<?php

class bdSocialShare_XenForo_DataWriter_AddOn extends XFCP_bdSocialShare_XenForo_DataWriter_AddOn
{
	protected function _postSave()
	{
		if ($this->get('addon_id') == 'XIBlog')
		{
			// we have to do this to make sure the tables are setup correctly
			// regardless of the installation order of [XI] Blog and this add-on.
			// If [XI] Blog is installed first, the standard installation routine will take
			// care of everything. If [bd] Social Share is installed first, the [XI] Blog's
			// tables will be altered here instead.
			bdSocialShare_Installer::installForXIBlog();
		}

		return parent::_postSave();
	}

}
