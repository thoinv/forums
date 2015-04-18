<?php

class DigitalPointSocialBar_Service_Twitter extends Zend_Service_Twitter
{
	public function listsOwnerships(array $params = array())
	{
		$this->init();
		$path = 'lists/ownerships';
		$response = $this->get($path, $params);

		return $this->_decodeResponse($response);
	}

	public function listsStatuses(array $params = array())
	{
		$this->init();
		$path = 'lists/statuses';

		for ($i = 1; $i <= 5; $i++)
		{
			$response = $this->get($path, $params);

			try
			{
				// Twitter is slow and gives gateway error on big sets, and is usually fine a couple seconds later when the data is actually available (probably cached on their end)
				if (is_object($response) && $response->getStatus() != 502)
				{
					break;
				}
			}
			catch(Exception $e)
			{
			}

			set_time_limit(30);
			sleep(2);
		}

		return $this->_decodeResponse($response);
	}


	public function listsMembers(array $params = array())
	{
		$this->init();
		$path = 'lists/members';
		$response = $this->get($path, $params);

		return $this->_decodeResponse($response);
	}

	public function listsMembersCreate(array $params = array())
	{
		$this->init();
		$path = 'lists/members/create';
		$response = $this->post($path, $params);

		return $response;
	}

	public function listsMembersDestroy(array $params = array())
	{
		$this->init();
		$path = 'lists/members/destroy';
		$response = $this->post($path, $params);

		return $response;
	}

	public function listsMembersCreateAll(array $params = array())
	{
		$this->init();
		$path = 'lists/members/create_all';
		$response = $this->post($path, $params);

		return $response;
	}

	public function listsMembersDestroyAll(array $params = array())
	{
		$this->init();
		$path = 'lists/members/destroy_all';
		$response = $this->post($path, $params);

		return $response;

	}




	protected function _decodeResponse($response)
	{
		try
		{
			if (is_object($response))
			{
				$response = json_decode($response->getBody());
			}
			else
			{
				$response = false;
			}
		}
		catch(Exception $e)
		{
			$response = false;
		}

		return $response;
	}



}