<?php

class Andy_LinkCheck_CronEntry_LinkCheck
{
	public static function runLinkCheck()
	{
		//########################################		
		// declare variables
		
		$results = array();
		$posts = array();
		
		// get options from Admin CP -> Options -> Link Check -> Limit
		$limit = XenForo_Application::get('options')->linkCheckLimit;
		
		// get options from Admin CP -> Options -> Link Check -> Offset
		$offset = XenForo_Application::get('options')->linkCheckOffset;			
		
		//########################################
		// exclude forums
		//########################################	
		
		// declare variable
		$whereclause = '';				
		
		// get options from Admin CP -> Options -> Link Check -> Exclude Forums
		$excludeForums = XenForo_Application::get('options')->linkCheckExcludeForums;
		
		if ($excludeForums != '')
		{
			// remove trailing comma
			$excludeForums = rtrim($excludeForums, ',');				
			
			$nodeIds = explode(',', $excludeForums);		
			
			// create whereclause1 of excluded forums
			$whereclause = 'AND (xf_thread.node_id <> ' . implode(' AND xf_thread.node_id <> ', $nodeIds);
			$whereclause = $whereclause . ')';
		}
		
		// get database
		$db = XenForo_Application::get('db');						
		
		// run query		
		$results = $db->fetchAll("
		SELECT xf_post.post_id, 
		xf_post.post_date,
		xf_post.message, 
		xf_thread.title
		FROM xf_post
		INNER JOIN xf_thread ON xf_thread.thread_id = xf_post.thread_id
		INNER JOIN xf_node ON xf_node.node_id = xf_thread.node_id
		WHERE xf_post.message LIKE " . XenForo_Db::quoteLike('[URL', 'lr') . "
		$whereclause
		ORDER BY xf_post.post_date DESC
		LIMIT " . $offset . "," . $limit . "
		");

		// main loop
		foreach ($results as $result)
		{						
			// define variables
			$currentPostDate = $result['post_date'];
			$currentPostId = $result['post_id'];				
			$currentTitle = $result['title'];
			$message = $result['message'];
			$done = '';
			$parsedMessage = '';
			$showStatusCode = '';
		
			// check for [URL='link'][/URL]
			if (preg_match_all("/\[URL=\'(.+?)\'\]/i", $message, $out))
			{			
				for ($i=0; $i < count($out[1]); $i++)
				{																
					//########################################
					// start cURL function
					//########################################
					
					// create a curl handle
					$ch = curl_init($out[1][$i]);
					
					// set options
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_NOBODY, true);
					curl_setopt($ch, CURLOPT_TIMEOUT, 5);
					
					// execute curl
					curl_exec($ch);
					
					// get http code
					$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
					
					// delare variable
					$show404 = '';
				
					// show status code if 404
					if ($httpcode == 404)
					{
						// get headers
						$headers = @get_headers($out[1][$i]);
						
						// get httpcode
						$httpcode = substr($headers[0], 9, 3);		
						
						// show status code if 404
						if ($httpcode == 404)
						{
							$show404 = 'yes';
						}
					}

					// close handle
					curl_close($ch);
					
					//########################################
					// end cURL function
					//########################################							
					
					// assign value to posts variable					
					if ($show404 == 'yes') 
					{
						$posts[] = array(
							'post_date' => $currentPostDate,
							'post_id' => $currentPostId,
							'title' => $currentTitle,
							'status' => $httpcode,
							'url' => $out[1][$i]
						);						
					}
				}
			}
			
			// clear variables
			$show404 = '';
			unset($out);
			
			// check for [URL]link[/URL]
			if (preg_match_all("/\[URL\](.+?)\[\/URL\]/i", $message, $out))
			{			
				for ($i=0; $i < count($out[1]); $i++)
				{																						
					//########################################
					// start cURL function
					//########################################
					
					// create a curl handle
					$ch = curl_init($out[1][$i]);
					
					// set options
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_NOBODY, true);
					curl_setopt($ch, CURLOPT_TIMEOUT, 5);
					
					// execute curl
					curl_exec($ch);
					
					// get http code
					$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
				
					// delare variable
					$show404 = '';					
				
					// show status code if 404
					if ($httpcode == 404)
					{
						// get headers
						$headers = @get_headers($out[1][$i]);
						
						// get httpcode
						$httpcode = substr($headers[0], 9, 3);		
						
						// show status code if 404
						if ($httpcode == 404)
						{
							$show404 = 'yes';
						}
					}

					// close handle
					curl_close($ch);
					
					//########################################
					// end cURL function
					//########################################							
					
					// assign values to posts variable					
					if ($show404 == 'yes') 
					{
						$posts[] = array(
							'post_date' => $currentPostDate,
							'post_id' => $currentPostId,
							'title' => $currentTitle,
							'status' => $httpcode,
							'url' => $out[1][$i]
						);						
					}
				}
			}
		}
		
		if (count($posts) > 0)
		{
			//########################################
			// prepare message
			//########################################
	
			// get options from Admin CP -> Options -> Basic Board Information -> Board Title
			$boardTitle = XenForo_Application::get('options')->boardTitle;	
			
			// get options from Admin CP -> Options -> Link Check -> Language ID
			$languageId = XenForo_Application::get('options')->linkCheckLanguageId;			
			
			// set language
			if ($languageId > 0)
			{
				XenForo_Phrase::setLanguageId($languageId);	
			}
			
			// get subject
			$subject = new XenForo_Phrase('linkcheck_subject');
			
			// get postDatePhrase
			$postDatePhrase = new XenForo_Phrase('linkcheck_post_date');
			
			// get postIdPhrase
			$postIdPhrase = new XenForo_Phrase('linkcheck_post_id');
			
			// get threadTitlePhrase
			$threadTitlePhrase = new XenForo_Phrase('linkcheck_thread_title');
			
			// get statusPhrase
			$statusPhrase = new XenForo_Phrase('linkcheck_status');
			
			// get urlPhrase
			$urlPhrase = new XenForo_Phrase('linkcheck_url');
			
			// start table
			$message = '
<table cellspacing="5">
<tr>
<th align="left">' . $postDatePhrase . '</th>
<th align="left">' . $postIdPhrase . '</th>
<th align="left">' . $threadTitlePhrase . '</th>
<th align="left">' . $statusPhrase . '</th>
<th align="left">' . $urlPhrase . '</th>
';	
			// foreach threads
			foreach ($posts as $post)
			{
				// format date
				$formatedDate = date("M d Y", $post['post_date']);
				
				// build link
				$link = XenForo_Link::buildPublicLink('posts', $post);			
				
				// message details
				$message .= '<tr><td>' . $formatedDate . '</td>';
				$message .= '<td>' . '<a href="' . $link . '">' . $post['post_id'] . '</a></td>';
				$message .= '<td>' . $post['title'] . '</td>';
				$message .= '<td>' . $post['status'] . '</td>';
				$message .= '<td>' . '<a href="' . $post['url'] . '">' . $post['url'] . '</a></td></tr>';
			}
			
			// end table
			$message .= '</tr></table>';
	
			//########################################
			// prepare mail variables
			//########################################				
	
			// get options from Admin CP -> Options -> Register Email -> Email From Username   
			$username = XenForo_Application::get('options')->linkCheckEmailFromUsername;			
			
			// get options from Admin CP -> Options -> Register Email -> Email To    
			$emailTo = XenForo_Application::get('options')->linkCheckEmailTo;
			
			// put into array
			$email = explode(',', $emailTo);					
			
			// subject					
			$subject = new XenForo_Phrase('linkcheck_link_check');				
			
			//########################################
			// send mail
			//########################################
			
			$count = count($email);
			
			for ($i=0; $i<$count; $i++)
			{
				// define user variable
				$user = array(
					'username' => $username,
					'email' => $email[$i]
				);
				
				// prepare mailParams                    
				$mailParams = array(
					'user' => $user,
					'subject' => $subject,
					'message' => $message
				);
					
				// prepare mail variable
				$mail = XenForo_Mail::create('linkcheck_contact', $mailParams);
				
				// send mail
				$mail->queue($user['email'], $user['username']);
			}	
		}
	}
}