<?php
  
class Dark_PostRating_Model_Session extends XFCP_Dark_PostRating_Model_Session
{
	public function prepareSessionActivityFetchOptions(array $fetchOptions)
	{      
		$options = parent::prepareSessionActivityFetchOptions($fetchOptions);		
		
		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_USER)
			{			
				$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);				
				if(isset($limitOptions['limit']) && $limitOptions['limit'] < 100 && $limitOptions['limit'] > 0){
					
					$ratingsModel = $this->getModelFromCache('Dark_PostRating_Model');
					$ratings = $ratingsModel->getRatings();
					$positive = $negative = $neutral = array();
					foreach($ratings as $id => $rating){
						if($rating['type'] == 1)
							$positive[]=$id;
						else if($rating['type'] == -1)
							$negative[]=$id;
						else $neutral[]=$id;
					}
					if(!empty($positive))
						$options['selectFields'] .= "
							,(select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $positive).")) as positive_rating_count
						";

					if(!empty($negative))
						$options['selectFields'] .= "
							,(select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $negative).")) as negative_rating_count
						";
					if(!empty($neutral))
						$options['selectFields'] .= "
							,(select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $neutral).")) as neutral_rating_count
						";
						
				}
			}
		}
		
		return $options;

	}
}
