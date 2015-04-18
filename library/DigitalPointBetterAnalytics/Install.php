<?php

class DigitalPointBetterAnalytics_Install
{
	public static function installCode()
	{
		if (XenForo_Application::$versionId < 1020070)
		{
			throw new XenForo_Exception('Digital Point Better Analytics requires XenForo 1.2.0 or newer.', true);
		}

		try
		{
			$fieldId = 'analytics_cid';

			if (!XenForo_Model::create('XenForo_Model_UserField')->getUserFieldById($fieldId))
			{
				$dw = XenForo_DataWriter::create('XenForo_DataWriter_UserField');
				$dw->set('field_id', 'analytics_cid');

				$dw->setExtraData(
					XenForo_DataWriter_UserField::DATA_TITLE,
					'Google Analytics Client ID'
				);
				$dw->setExtraData(
					XenForo_DataWriter_UserField::DATA_DESCRIPTION,
					'Unique identifier used by Google Analytics.'
				);

				$dw->set('display_group', 'preferences');
				$dw->set('display_order', 100);
				$dw->set('field_type', 'textbox');
				$dw->set('match_type', 'none');
				$dw->set('max_length', 0);
				$dw->set('required', 0);
				$dw->set('show_registration', 0);

				if (XenForo_Application::$versionId >= 1030000)
				{
					$dw->set('moderator_editable', 0);
				}

				$dw->set('viewable_profile', 0);
				$dw->set('viewable_message', 0);
				$dw->set('user_editable', 'never');

				$dw->save();
			}

		}
		catch (Zend_Db_Exception $e)
		{
			return false;
		}
	}

	public static function uninstallCode()
	{
		// Comment this line to remove custom field (not doing it automatically in case of accidental uninstall/reinstall)
		return;

		$dw = XenForo_DataWriter::create('XenForo_DataWriter_UserField');
		$dw->setExistingData('field_id', 'analytics_cid');
		$dw->delete();
	}
}