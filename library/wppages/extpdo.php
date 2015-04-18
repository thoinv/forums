<?php
class eipSoftware_wppages_extpdo extends PDO
{
	private $query;				//query object
	private $querytype;			//the type of query
	private $querydata;			//hold results of the query
	private $stmt;				//sql statement
	private $options;			//standard PDO options
	
	public function __construct($connectInfo, $querytype="SELECT")
	{//overrides pdo construct
		try
		{
			$this->options = array(PDO::ATTR_EMULATE_PREPARES => FALSE,
							 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
							 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
			);
			$this->querytype = $querytype;
			if(is_array($connectInfo))
			{
				self::UseArrayOptions($connectInfo);
			}
			else
			{
				self::UseFileOptions($connectInfo);
			}
		}
		catch (PDOException $e)
		{
			echo("Query failed: " . $e->getMessage());
		}
	}
	/**
	 * use the supplied array for the connection options
	 * @param array $arrayInfo
	 */
	private function UseArrayOptions($arrayInfo)
	{
		$dsn = "mysql:host=" . $arrayInfo['host'].";dbname=".$arrayInfo['dbname'];
		parent::__construct($dsn, $arrayInfo['username'], $arrayInfo['password'], $this->options);
	}
	/**
	 * Read a file with connection options
	 * @param string $filename
	 */
	private function UseFileOptions($filename)
	{
		$lp = new configHandler($filename);
		$dsn = "mysql:host=" . $lp->getValue("database", "host").";dbname=".$lp->getValue("database", "name");
		parent::__construct($dsn, $lp->getValue("database", "username"), $lp->getValue("database","password"), $this->options);
	}
	/**
	 * Cycle through assigned parameters inserting their values
	 */
	private function PrepStatement()
	{
		$this->stmt = $this->prepare($this->query->statement);
		if($this->query->parameters !==NULL && $this->query->paramtype !==NULL
			&& count($this->query->parameters) == count($this->query->paramtype))
		{
			foreach ($this->query->parameters as $parameter => $value)
			{
				$this->stmt->bindValue($parameter, $value, $this->query->paramtype[$parameter]);
			}
		}
		elseif ($this->query->parameters!==NULL)
		{
			foreach ($this->query->parameters as $parameter => $value)
			{
				$this->stmt->bindValue($parameter, $value, pdo::PARAM_STR);
			}
		}
	}
	/**
	 * run the query, depending on type of query
	 */
	private function ExecuteQuery()
	{
		switch($this->querytype)
		{
			case "SELECT":
			{
				$this->stmt->execute();
				$this->querydata = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
				break;
			}
			case "INSERT":
			case "UPDATE":
			{
				try
				{
					$this->beginTransaction();
					$this->stmt->execute();
					$this->commit();
					break;
				}
				catch (PDOException $e)
				{
					$this->rollBack();
					echo("Query failed: " . $e->getMessage());
				}
			}
		}
	}
	/**
	 * execute the query agaisnt the db
	 * @param string $query
	 * @param string $querytype
	 * @throws ExceptionHandler
	 */
	public function RunQuery($query,$querytype="SELECT")
	{
		//print_r($query);		-- DEBUG
		$this->query = $query;
		$this->querytype = $querytype;
		if($query->statement==NULL)
		{
			throw new ExceptionHandler("Database Query not specified");
		}
		self::PrepStatement();
		self::ExecuteQuery();
		return($this->querydata);
	}
}
?>