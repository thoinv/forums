<?php

class Turki_Adv_Model_Hooks extends XenForo_Model
{

	public function getAdvHookById($advId)
	{
		return $this->_getDb()->fetchRow('
			SELECT *
			FROM xf_advxenforo_hooks
			WHERE hook_id = ?
		', $advId);
	}

	public function getAllAdvHook()
	{
		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_advxenforo_hooks
			ORDER BY hook_title
		', 'hook_id');
	}

	public function rebuildAdvHookCache()
	{
		$cache = array();

		foreach ($this->getAllAdvHook() AS $AdvHookId => $advhook) {
			if ($advhook['active']) {
				$cache[$AdvHookId] = array(
					'hook_title' => $advhook['hook_title'],
					'hook_name'  => $advhook['hook_name']
				);
			}
		}

		$this->_getDataRegistryModel()->set('advs_hooks', $cache);
		return $cache;
	}

	public function getHooksListIfAvailable($includeCustomOption = TRUE, $includeXenForoOption = TRUE)
	{
		return $this->getHooksList($includeCustomOption, $includeXenForoOption);
	}


	public function getHooksList($includeCustomOption = TRUE, $includeXenForoOption = TRUE)
	{
		$options = array();
		$Hooks   = $this->getAllAdvHook();
		foreach ($Hooks AS $Hook) {
			if ($Hook['active'] == 1) {
				$options[$Hook['hook_name']] = $Hook['hook_title'];
			}
		}

		return $options;
	}

	public function getDefaultHook()
	{
		return '';
	}

	public function getHooksByIds(array $hookIds)
	{
		if (!$hookIds) {
			return array();
		}
		return $this->getHooks(array('hook_id' => $hookIds));
	}

	public function getHooks(array $conditions = array(), array $fetchOptions = array())
	{
		$whereClause = $this->prepareHookConditions($conditions, $fetchOptions);

		$orderClause  = $this->prepareHookOrderOptions($fetchOptions, 'hook_id');
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults('
			SELECT *
			FROM xf_advxenforo_hooks
			WHERE ' . $whereClause . '
			' . $orderClause . '
		', $limitOptions['limit'], $limitOptions['offset']
		), 'hook_id');
	}

	public function prepareHookOrderOptions(array $fetchOptions = array(), $defaultOrderSql = '')
	{
		$choices = array(
			'hook_id' => 'hook_id'
		);
		return $this->getOrderByClause($choices, $fetchOptions, $defaultOrderSql);
	}

	public function getOrderByClause(array $choices, array $fetchOptions, $defaultOrderSql = '')
	{
		$orderSql = NULL;

		if (!empty($fetchOptions['order']) && isset($choices[$fetchOptions['order']])) {
			$orderSql = $choices[$fetchOptions['order']];

			if (empty($fetchOptions['direction'])) {
				$fetchOptions['direction'] = 'asc';
			}

			$dir         = (strtolower($fetchOptions['direction']) == 'desc' ? 'DESC' : 'ASC');
			$orderSqlOld = $orderSql;
			$orderSql    = sprintf($orderSql, $dir);
			if ($orderSql === $orderSqlOld) {
				$orderSql .= ' ' . $dir;
			}
		}

		if (!$orderSql) {
			$orderSql = $defaultOrderSql;
		}
		return ($orderSql ? 'ORDER BY ' . $orderSql : '');
	}


	public function prepareHookConditions(array $conditions = array(), array $fetchOptions = array())
	{
		$db            = $this->_getDb();
		$sqlConditions = array();

		if (!empty($conditions['all'])) {
			$sqlConditions[] = '1=1';
		}

		if (!empty($conditions['hook_id'])) {
			if (is_array($conditions['hook_id'])) {
				$sqlConditions[] = 'hook_id IN (' . $db->quote($conditions['hook_id']) . ')';
			} else {
				$sqlConditions[] = 'hook_id = ' . $db->quote($conditions['hook_id']);
			}
		}

		if (isset($conditions['active'])) {
			$sqlConditions[] = 'active = ' . ($conditions['active'] ? 1 : 0);
		}

		return $this->getConditionsForClause($sqlConditions);
	}

	public function prepareLimitFetchOptions(array $fetchOptions)
	{
		$limitOptions = array('limit' => 0, 'offset' => 0);
		if (isset($fetchOptions['limit'])) {
			$limitOptions['limit'] = intval($fetchOptions['limit']);
		}
		if (isset($fetchOptions['offset'])) {
			$limitOptions['offset'] = intval($fetchOptions['offset']);
		}

		if (isset($fetchOptions['perPage']) && $fetchOptions['perPage'] > 0) {
			$limitOptions['limit'] = intval($fetchOptions['perPage']);
		}

		if (isset($fetchOptions['page'])) {
			$page = intval($fetchOptions['page']);
			if ($page < 1) {
				$page = 1;
			}

			$limitOptions['offset'] = intval(($page - 1) * $limitOptions['limit']);
		}

		return $limitOptions;
	}


	public function getHookExportXml(array $hookIds)
	{
		if ($hookIds) {
			$hooks = $this->fetchAllKeyed('
				SELECT *
				FROM xf_advxenforo_hooks
				WHERE hook_id IN (' . $this->_getDb()->quote($hookIds) . ')
			', 'hook_id');
		} else {
			$hooks = array();
		}

		$document               = new DOMDocument('1.0', 'utf-8');
		$document->formatOutput = TRUE;

		$rootHook = $document->createElement('hooks_export');
		$document->appendChild($rootHook);

		$hookes         = $document->createElement('hooks');
		$hookCategories = array();
		foreach ($hooks AS $hook) {
			$_hooke = $document->createElement('hook');

			if ($hook['hook_id']) {
				$hookCategories[$hook['hook_id']] = $hook['hook_id'];
				$_hooke->setAttribute('hook_id', $hook['hook_id']);
			}

			$_hooke->setAttribute('hook_title', $hook['hook_title']);

			$_hooke->appendChild($document->createElement('template', $hook['template']));
			$_hooke->appendChild($document->createElement('hook_name', $hook['hook_name']));
			$_hooke->appendChild($document->createElement('active', $hook['active']));
			$hookes->appendChild($_hooke);
		}

		$rootHook->appendChild($hookes);

		return $document;
	}

	protected function _getHookXmlNode(DOMDocument $document, array $hook)
	{
		$attributes = array(
			'hook_id',
			'active'
		);
		$children   = array(
			'hook_title',
			'template',
			'hook_name'
		);

		$hookNode = $document->createElement('hook');

		foreach ($attributes AS $attribute) {
			$hookNode->setAttribute($attribute, $hook[$attribute]);
		}
		foreach ($children AS $child) {
			$fieldNode = $document->createElement($child);
			$fieldNode->appendChild(XenForo_Helper_DevelopmentXml::createDomCdataSection($document, $hook[$child]));
			$hookNode->appendChild($fieldNode);
		}
		return $hookNode;
	}


	public function getHookDataFromXml(SimpleXMLElement $document, &$errors = array())
	{
		if ($document->getName() != 'hooks_export') {
			throw new XenForo_Exception(new XenForo_Phrase('provided_file_is_not_valid_hooks_xml'), TRUE);
		}


		$hooks = array();
		$i     = 0;

		foreach ($document->hooks->hook AS $hook) {
			$hooks[$i] = array(
				'hook_title' => (string)$hook['hook_title'],
				'template'   => (string)$hook->template,
				'hook_name'  => (string)$hook->hook_name,
				'active'     => ($hook->active ? 1 : 0)
			);

			$i++;
		}

		return array(
			'hooks' => $hooks
		);
	}


	public function massImportHooks(array $hooks, &$errors = array())
	{
		$db = $this->_getDb();

		XenForo_Db::beginTransaction();

		$dataWriters = array();

		foreach ($hooks AS $hookId => $hook) {
			$dw = XenForo_DataWriter::create('Turki_Adv_DataWriter_Hooks');

			$dw->set('hook_title', $hook['hook_title']);
			$dw->set('template', $hook['template']);
			$dw->set('hook_name', $hook['hook_name']);
			$dw->set('active', $hook['active']);

			if ($dwErrors = $dw->getErrors()) {
				foreach ($dwErrors AS $field => $error) {
					$errors[$field . '__' . $hookId] = $error;
				}
			} else {
				$dataWriters[] = $dw;
			}
		}

		if (empty($errors)) {
			foreach ($dataWriters AS $dw) {
				$dw->save();
			}

			XenForo_Db::commit();
		} else {
			XenForo_Db::rollback();
		}
	}

	public function getHookByText($matchText)
	{
		if (!is_array($matchText)) {
			$matchText = preg_split('/\r?\n/', $matchText, -1, PREG_SPLIT_NO_EMPTY);
		}

		if (!$matchText) {
			return array();
		}

		$matches = array();
		foreach ($this->getAllAdvHook() AS $hook) {
			$hookText = preg_split('/\r?\n/', $hook['hook_name'], -1, PREG_SPLIT_NO_EMPTY);

			$textMatch = array_intersect($matchText, $hookText);
			foreach ($textMatch AS $text) {
				$matches[$text] = $hook;
			}
		}

		return $matches;
	}

}