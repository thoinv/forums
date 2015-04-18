<?php
class eipSoftware_wppages_wpquery
{
	public $statement;		//sql statemetn
	public $parameters;		//parameters for the query
	public $paramtype;		//parameter types for each parameter in the query

	public function __construct($statement,$parameters=NULL, $paramtype=NULL)
	{
		$this->statement 	= $statement;
		$this->parameters	= $parameters;
		$this->paramtype	= $paramtype;
	}
}
?>