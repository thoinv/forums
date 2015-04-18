<?php

class bdSocialShare_Template_Helper
{
	public static function isConnectedWith($target, $viewingUser)
	{
		$authId = bdSocialShare_Helper_Common::getAuthId($viewingUser, $target);

		return !empty($authId);
	}

	public static function checked($noDefault, $scheduled, $target, $value = false)
	{
		$visitor = XenForo_Visitor::getInstance();
		$checked = false;

		if (is_array($scheduled))
		{
			// scheduled value has the highest priority
			if (!empty($scheduled['targets'][$target]))
			{
				if ($value === false OR $value == $scheduled['targets'][$target])
				{
					$checked = true;
				}
			}
		}
		else
		{
			if ($noDefault)
			{
				// no default flag is set
			}
			elseif (!bdSocialShare_Option::get('remember'))
			{
				// the remember option is not turned on
			}
			else
			{
				$visitorOptionValue = $visitor->get('bdsocialshare_' . $target);
				if (!empty($visitorOptionValue))
				{
					if ($value === false)
					{
						// any value
						$checked = true;
					}
					else
					{
						$visitorOptions = self::getOptions($visitorOptionValue);
						if (in_array(strval($value), $visitorOptions, true))
						{
							$checked = true;
						}
					}
				}
			}
		}

		if ($checked)
		{
			return ' checked="checked"';
		}
	}

	public static function checkedOptInOptOutOff($systemOptionId, $visitorOptionsOfTarget)
	{
		$value = bdSocialShare_Helper_Common::getOptInOptOutOffEffectiveValue($systemOptionId, $visitorOptionsOfTarget);

		if (!empty($value))
		{
			return ' checked="checked"';
		}
	}

	public static function getOptions($optionRawValue)
	{
		if (is_array($optionRawValue))
		{
			return $optionRawValue;
		}

		$options = array();

		$options[] = strval($optionRawValue);

		if (is_string($optionRawValue) AND !empty($optionRawValue) AND strpos($visitorOption, '[') === 0)
		{
			$jsonDecoded = json_decode($optionRawValue, true);
			if (is_array($jsonDecoded))
			{
				foreach ($jsonDecoded as $entry)
				{
					$entry = trim(strval($entry));
					if (!empty($entry))
					{
						$options[] = $entry;
					}
				}
			}
		}

		return $options;
	}

}
