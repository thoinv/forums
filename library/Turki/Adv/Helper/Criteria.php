<?php

class Turki_Adv_Helper_Criteria
{
	public static function postCriteria($criteria, $matchOnEmpty = FALSE)
	{
		if (!$criteria = self::unserializeCriteria($criteria)) {
			return (boolean)$matchOnEmpty;
		}

		foreach ($criteria AS $criterion) {
			$data = $criterion['data'];
			if (!empty($data)) {
				return FALSE;
			}
		}
	}


	public static function unserializeCriteria($criteria)
	{
		if (!is_array($criteria)) {
			$criteria = @unserialize($criteria);
			if (!is_array($criteria)) {
				return array();
			}
		}

		return $criteria;
	}
}