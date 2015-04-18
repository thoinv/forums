<?php

class Andy_SimilarThreads_ControllerPublic_Thread extends XFCP_Andy_SimilarThreads_ControllerPublic_Thread
{	
	public function actionIndex()
	{
		//########################################
		// Show similar threads in thread view.
		//########################################
				
		// get parent	
		$parent = parent::actionIndex();
		
		// return parent action if this is a redirect or other non View response	 
		if (!$parent instanceof XenForo_ControllerResponse_View)
		{
			return $parent;
		}
		
		// check for user group permission
		if (XenForo_Visitor::getInstance()->hasPermission('similarThreadsGroupID', 'similarThreadsID'))
		{
			// get currentNodeId
			$currentNodeId = $parent->params['thread']['node_id'];
			
			// get options from Admin CP -> Options -> Similar Threads -> Exclude Forums  
			$excludeForums = XenForo_Application::get('options')->similarThreadsExcludeForums;
	   
			// run if there are excluded forums
			if ($excludeForums != '')
			{
				// remove trailing comma if there is one
				$excludeForums = rtrim($excludeForums, ',');
								
				// put into array
				$excludeForumsArray = explode(',', $excludeForums); 	 
				  
				// check for excluded forums
				if (in_array($currentNodeId, $excludeForumsArray))
				{
					// return parent
					return $parent;
				}
			}
					
			// get options from Admin CP -> Options -> Similar Threads -> Show Below First Post    
			$showBelowFirstPost = XenForo_Application::get('options')->showBelowFirstPost;	
				
			// get options from Admin CP -> Options -> Similar Threads -> Show Below Quick Reply    
			$showBelowQuickReply = XenForo_Application::get('options')->showBelowQuickReply;			
		
			// show similar threads if true
			if ($showBelowFirstPost OR $showBelowQuickReply)
			{ 			
				// declare variables
				$viewParams = array();
				$searchWords = array();
				$similarThreads = array();
				$searchWord1 = '';
				$searchWord2 = '';	
				
				// get currentNodeId
				$currentNodeId = $parent->params['thread']['node_id'];					
	
				// get currentThreadId
				$currentThreadId = $parent->params['thread']['thread_id'];
							
				// get threadTitle
				$threadTitle = $parent->params['thread']['title']; 
				
				// get options from Admin CP -> Options -> Similar Threads -> Remove Punctuations
				$removePunctuations = XenForo_Application::get('options')->removePunctuations;
				
				// put into array
				$removePunctuationsArray = explode(' ', $removePunctuations);			
				
				// remove punctuations			
				$threadTitle = str_replace($removePunctuationsArray, '', $threadTitle);
	
				// get options from Admin CP -> Options -> Similar Threads -> Multibyte
				$multibyte = XenForo_Application::get('options')->similarThreadsMultibyte;
				
				if ($multibyte == 0)
				{
					// put into array
					$threadTitle = explode(' ', $threadTitle);
				}
				
				if ($multibyte == 1)
				{			
					// put into array
					$threadTitle = mb_split(' ', $threadTitle);
				}
				
				// get common words in model    
				$commonWords = $this->getModelFromCache('Andy_SimilarThreads_Model')->getCommonWords(); 			
				
				// remove any common words from array
				foreach ($threadTitle as $var)
				{
					if ($multibyte == 0)
					{
						if (!in_array(strtolower($var), $commonWords))
						{
							// get options from Admin CP -> Options -> Similar Threads -> Miniumum Common Word Length    
							$minimumCommonWordLength = XenForo_Application::get('options')->minimumCommonWordLength;					
							
							if (strlen($var) >= $minimumCommonWordLength)
							{
								$searchWords[] = $var;
							}
						}
					}
	
					if ($multibyte == 1)
					{
						if (!in_array(mb_strtolower($var), $commonWords))
						{
							// get options from Admin CP -> Options -> Similar Threads -> Miniumum Common Word Length    
							$minimumCommonWordLength = XenForo_Application::get('options')->minimumCommonWordLength;					
							
							if (mb_strlen($var) >= $minimumCommonWordLength)
							{
								$searchWords[] = $var;
							}
						}
					}
				}
				
				$count = count($searchWords);
				
				// only continue if we have a search word
				if ($count > 0)
				{				
					// get first search word
					$searchWord1 = $searchWords[0];
					
					if ($count > 1)
					{	
						// get second search word
						$searchWord2 = $searchWords[1];	
					}			
				}
				
				// run query if we have a search word
				if ($searchWord1 != '')
				{
					// run query in model    
					$similarThreads = $this->getModelFromCache('Andy_SimilarThreads_Model')->getThreads($searchWord1,$searchWord2,$currentNodeId,$currentThreadId);    
				} 
				
				// prepare viewParams
				if ($parent instanceOf XenForo_ControllerResponse_View)
				{
					$viewParams = array(
					'similarThreads' => $similarThreads,
					'showBelowFirstPost' => $showBelowFirstPost,
					'showBelowQuickReply' => $showBelowQuickReply,
					'searchWord1' => $searchWord1,
					'searchWord2' => $searchWord2
					);
					
					// add viewParams to parent params
					$parent->params += $viewParams;
				}	
				
				// return parent
				return $parent;	
			}
			else
			{
				// neither option switch is set so return parent
				return $parent;	
			}
		}
		// no user group permission
		return $parent;	
	}
}