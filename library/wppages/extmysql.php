<?php
class eipSoftware_wppages_extmysql
{
	private $query;			//query object
	private $db;			//database connection
	private $stmt;			//sql statement
	private $querydata;		//hold results of the query
	
	public function __construct($connectInfo, $querytype="SELECT")
	{
		try 
		{
			if(is_array($connectInfo))
			{
				self::UseArrayOptions($connectInfo);
			}
			else
			{
				self::UseFileOptions($connectInfo);
			}
		} 
		catch(ExceptionHandler $e)
		{
			$e->ParseError("Error connecting to dbase");
		}
	}
	private function UseArrayOptions($arrayInfo)
	{
		$this->db = new mysqli($arrayInfo['host'], $arrayInfo['username'], $arrayInfo['password'], $arrayInfo['dbname']);		
		if (!$this->db->set_charset("utf8")) 
		{
    		printf("Error loading character set utf8: %s\n", $mysqli->error);
		}
	}
	private function UseFileOptions($filename)
	{
		exit();
	}
	private function PrepStatement()
	{
		$this->query->statement = preg_replace('/:[A-Za-z]*\s/', ' ? ', $this->query->statement);		
		$this->stmt = $this->db->prepare( $this->query->statement);		
		foreach ($this->query->parameters as $parameter => $value)
		{
			$this->stmt->bind_param("s", $value);
		}
	}
	private function ExecuteQuery()
	{
		$this->stmt->execute();
		$this->stmt->store_result();
		
		$meta = $this->stmt->result_metadata();		//get the info about the query
		while ($field = $meta->fetch_field()) 
		{
			$parameters[] = &$row[$field->name];	//build array of the field names
		}
		call_user_func_array(array($this->stmt, 'bind_result'), $parameters); //bind them for the result set
		while ($this->stmt->fetch()) 
		{
			foreach($row as $key => $value) 
			{
				$data[$key] = $value;
			}
			$this->querydata[] = $data;
		}
	}
	
	public function RunQuery($query)
	{
		$this->query = $query;
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