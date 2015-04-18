<?php

class Turki_Adv_Model_View extends XenForo_Model
{
	public function getAllAdvHooks()
	{
		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_advxenforo
			WHERE active = 1
			ORDER BY adv_id
		', 'advhook_id');
	}

}