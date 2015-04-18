<?php

/**
 * Helper Brivium Addon for EventListener.
 *
 * @package Brivium_BriviumHelper
 * Version 1.0.1
 */
abstract class Brivium_BriviumHelper_Installer
{
	protected $_db = null;
	protected $_tables = null;
	protected $_alters = null;
	protected $_data = null;
	protected $_triggerType = null;
	protected $_queryBeforeTable = null;
	protected $_queryBeforeAlter = null;
	protected $_queryBeforeData = null;
	protected $_queryFinal = null;
	protected $_licenseData = null;
	protected $_versionId = null;
	protected $_existingVersionId = null;
	protected $_preInstallCalled = null;
	protected $_preUninstallCalled = null;
	protected $_modelCache = array();
	protected $_existingAddOn = array();
	protected $_addOnData = array();
	protected static $_addOnInstaller = null;
		
	protected function _getDb()
	{
		if ($this->_db === null){
			$this->_db = XenForo_Application::get('db');
		}
		return $this->_db;
	}
	
	public function getAddOnData()
	{
		return $this->_addOnData;
	}
	
	public function getExistingAddOn()
	{
		return $this->_existingAddOn;
	}
	
	public function addColumn($table, $field, $attr)
	{
		if (!$this->checkIfExist($table, $field)) {
			return $this->_getDb()->query("ALTER TABLE `" . $table . "` ADD `" . $field . "` " . $attr);
		}
	}
	
	public function removeColumn($table, $field)
	{
		if ($this->checkIfExist($table, $field)) {
			return $this->_getDb()->query("ALTER TABLE `" . $table . "` DROP `" . $field . "`");
		}
	}
	
	public function checkIfExist($table, $field)
	{
		if ($this->_getDb()->fetchRow('SHOW columns FROM `' . $table . '` WHERE Field = ?', $field)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function checkTableExist($table)
	{
		if ($this->_getDb()->fetchRow('SHOW TABLES  LIKE ?', $table)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	
	public function initialize($existingAddOn = array(), $addOnData = array(), $triggerType = 'install')
	{
		$this->_triggerType = $triggerType;
		$this->_existingAddOn = $existingAddOn;
		$this->_addOnData = $addOnData;
	}
	
	/*
	*
	*	Installer
	*
	*/
	
	public static function install($existingAddOn, $addOnData)
	{	
		if (self::$_addOnInstaller && class_exists(self::$_addOnInstaller))
		{
			$installer = self::create(self::$_addOnInstaller);
			$installer->installAddOn($existingAddOn, $addOnData);
		}
		return true;
	}
	
	public function installAddOn($existingAddOn, $addOnData)
	{
		$this->initialize($existingAddOn, $addOnData);
		
		$this->preInstall();		

		$this->_beginDbTransaction();

		$this->_install();

		$this->_postInstall();

		$this->_commitDbTransaction();

		$this->_postInstallAfterTransaction();

		return true;
	}

	public function preInstall()
	{
		if ($this->_preInstallCalled)
		{
			return;
		}

		$this->_preInstallDefaults();
		$this->_preInstall();

		$this->_preInstallCalled = true;
	}
	
	protected function _preInstallDefaults()
	{
	}

	protected function _preInstall()
	{
	}
	
	protected function _install()
	{
		$prerequisites = $this->_getPrerequisites();
        if (!empty($prerequisites)) {
            $this->_checkPrerequisites($prerequisites);
        }
		$db = $this->_getDb();
		
		if($this->_queryBeforeTable!==null && is_array($this->_queryBeforeTable)){
			foreach ($this->_queryBeforeTable AS $queryBeforeTable)
			{
				try
				{
					$db->query($queryBeforeTable);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_tables!==null && is_array($this->_tables)){
			foreach ($this->_tables AS $tableSql)
			{
				try
				{
					$db->query($tableSql);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		
		if($this->_queryBeforeAlter!==null && is_array($this->_queryBeforeAlter)){
			foreach ($this->_queryBeforeAlter AS $queryBeforeAlter)
			{
				try
				{
					$db->query($queryBeforeAlter);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_alters!==null && is_array($this->_alters)){
			foreach ($this->_alters AS $tableName => $tableAlters)
			{
				if($tableAlters && is_array($tableAlters)){
					foreach ($tableAlters AS $tableColumn => $attributes)
					{
						try
						{
							$this->addColumn($tableName, $tableColumn, $attributes);
						}
						catch (Zend_Db_Exception $e) {}
					}
				}
			}
		}
		
		
		if($this->_queryBeforeData!==null && is_array($this->_queryBeforeData)){
			foreach ($this->_queryBeforeData AS $queryBeforeData)
			{
				try
				{
					$db->query($queryBeforeData);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_data!==null && is_array($this->_data)){
			foreach ($this->_data AS $dataSql)
			{
				try
				{
					$db->query($dataSql);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_queryFinal!==null && is_array($this->_queryFinal)){
			foreach ($this->_queryFinal AS $queryFinal)
			{
				try
				{
					$db->query($queryFinal);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		$listenerClassModel = $this->getModelFromCache('Brivium_BriviumHelper_Model_ListenerClass');
		$listenerClassModel->rebuildBriviumAddOnsCache();
		$listenerClassModel->rebuildListenerClassCache();
	}

	protected function _postInstall()
	{
	}

	protected function _postInstallAfterTransaction()
	{
		
	}
	
	/*
	*
	*	Uninstaller
	*
	*/
	
	public static function uninstall($addOnData)
	{
		if (self::$_addOnInstaller && class_exists(self::$_addOnInstaller))
		{
			$installer = self::create(self::$_addOnInstaller);
			$installer->uninstallAddOn($addOnData);
		}
	}
	
	public function uninstallAddOn($addOnData)
	{
		$this->initialize(array(), $addOnData, 'uninstall');
		$this->preUninstall();

		$this->_beginDbTransaction();

		$this->_uninstall();
		$this->_postUninstall();
		
		$this->_commitDbTransaction();

		return true;
	}

	public function preUninstall()
	{
		if ($this->_preUninstallCalled)
		{
			return;
		}

		$this->_preUninstall();

		$this->_preUninstallCalled = true;
	}

	protected function _preUninstall()
	{
	}

	protected function _uninstall()
	{
		$db = $this->_getDb();
		
		if($this->_queryBeforeTable!==null && is_array($this->_queryBeforeTable)){
			foreach ($this->_queryBeforeTable AS $queryBeforeTable)
			{
				try
				{
					$db->query($queryBeforeTable);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_tables!==null && is_array($this->_tables)){
			foreach ($this->_tables AS $tableName => $tableSql)
			{
				try
				{
					$db->query("DROP TABLE IF EXISTS `$tableName`");
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_queryBeforeAlter!==null && is_array($this->_queryBeforeAlter)){
			foreach ($this->_queryBeforeAlter AS $queryBeforeAlter)
			{
				try
				{
					$db->query($queryBeforeAlter);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		
		if($this->_alters!==null && is_array($this->_alters)){
			foreach ($this->_alters AS $tableName => $tableAlters)
			{
				if($tableAlters && is_array($tableAlters)){
					foreach ($tableAlters AS $tableColumn => $attributes)
					{
						try
						{
							$this->removeColumn($tableName, $tableColumn);
						}
						catch (Zend_Db_Exception $e) {}
					}
				}
			}
		}
		
		if($this->_queryFinal!==null && is_array($this->_queryFinal)){
			foreach ($this->_queryFinal AS $queryFinal)
			{
				try
				{
					$db->query($queryFinal);
				}
				catch (Zend_Db_Exception $e) {}
			}
		}
		$listenerClassModel = $this->getModelFromCache('Brivium_BriviumHelper_Model_ListenerClass');
		$listenerClassModel->rebuildListenerClassCache();
		$listAddOns = $listenerClassModel->rebuildBriviumAddOnsCache();
		if(empty($listAddOns)){
			$this->removeTables();
		}
	}
	
	public function removeTables()
	{
		$db = $this->_getDb();
		$table = array(
			'xf_brivium_addon',
			'xf_brivium_listener_class',
		);
		foreach ($table AS $tableName)
		{
			try
			{
				$db->query("DROP TABLE IF EXISTS `$tableName`");
			}
			catch (Zend_Db_Exception $e) {}
		}
	}
	
	/**
	* Method designed to be overridden by child classes to add pre-uninstall behaviors.
	*/
	protected function _postUninstall()
	{
	}
	
	protected function _getPrerequisites()
    {
        return array();
    }
	
	protected function _checkPrerequisites(array $prerequisites)
    {
        $addOnModel = $this->getModelFromCache('XenForo_Model_AddOn');
        $notInstalled = array();
        $outOfDate = array();
        foreach ($prerequisites as $addOnId => $requiredAddOn) {
            $addOn = $addOnModel->getAddOnById($addOnId);
            if (empty($addOn)) {
                $notInstalled[] = $requiredAddOn['title'];
            }
            if ($requiredAddOn['version_id'] && $addOn['version_id'] < $requiredAddOn['version_id']) {
                $outOfDate[] = $requiredAddOn['title'];
            }
        }
        if ($notInstalled) {
            throw new XenForo_Exception('The following required add-ons need to be installed: ' . implode(',', $notInstalled).'.', true);
        }
        if ($outOfDate) {
            throw new XenForo_Exception('The following required add-ons need to be updated: ' . implode(',', $outOfDate), true);
        }
    }
	
	protected function _beginDbTransaction()
	{
		XenForo_Db::beginTransaction($this->_db);
		return true;
	}

	/**
	* Commits a new database transaction.
	*/
	protected function _commitDbTransaction()
	{
		XenForo_Db::commit($this->_db);
		return true;
	}

	
	public function getModelFromCache($class)
    {
        if (!isset($this->_modelCache[$class])) {
            $this->_modelCache[$class] = XenForo_Model::create($class);
        }

        return $this->_modelCache[$class];
    }
	
	public static function create($class)
	{
		$createClass = XenForo_Application::resolveDynamicClass($class, 'installer_brivium');
		if (!$createClass)
		{
			throw new XenForo_Exception("Invalid installer '$class' specified");
		}
	
		return new $createClass;
	}
	
}