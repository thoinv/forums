<?php

class ThreadRating_Model_Thread extends XFCP_ThreadRating_Model_Thread
{
	const FETCH_THREADRATE = 0x800;
	
	public function prepareThreadFetchOptions(array $fetchOptions)
	{
		$options = parent::prepareThreadFetchOptions($fetchOptions);

		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_THREADRATE)
			{
				$options['selectFields'] .= ',
					IF(rate.count IS NULL, 0, rate.count) AS thread_rate_count, IF(rate.sum IS NULL, 0, rate.sum) AS thread_rate_sum, IF(rate.avg IS NULL, 0, rate.avg) AS thread_rate_avg';
				$options['joinTables'] .= '
					LEFT JOIN tr_thread_rate AS rate ON (rate.thread_id = thread.thread_id)';

				//this should only happen when the above table is joined
				if (!empty($fetchOptions['order']))
				{
					if ($fetchOptions['order'] == 'rating')
					{

						if (!isset($fetchOptions['orderDirection']) || $fetchOptions['orderDirection'] == 'desc')
						{
							$direction = ' DESC';
						}
						else
						{
							$direction = ' ASC';
						}

						$options['orderClause'] = 'ORDER BY thread_rate_avg ' . $direction . ', thread.last_post_date DESC';
					}
				}
			}
		}

		return $options;
	}
}