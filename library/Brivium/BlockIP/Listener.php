<?php
class Brivium_BlockIP_Listener
{
	
	public static function loadClassListener($class, &$extend)
	{
		$classes = array(
			'ControllerPublic_Register'
		);
		foreach($classes AS $_class)
		{
			if ($class == 'XenForo_' .$_class)
			{
				$extend[] = 'Brivium_BlockIP_' .$_class;
			}
		}
	}

}