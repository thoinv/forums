<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
main();
function main()
{
	try
	{
		if(isset($_GET['filler']) &&  filter_var($_GET['filler'], FILTER_SANITIZE_STRING)=='TRUE' )
		{
			checkPdoAvailable();
			$sf = new searchFiles();
			$sf->search();
		}
		else
		{
			$rh = new renderhtml();
			$rh->render();
		}
	}
	catch (Exception $e)
	{
		echo("An error occured " . date("m/d/Y H.i.s") . "<br/>");
	}

}
/**
 * echo feedback and append linefeeds
 * @param string $string
 * @param number $linefeeds
 */
function UserFeedback($string, $linefeeds=1)
{
	echo($string);
	for($repeat=1; $repeat <= $linefeeds; $repeat++)
	{
		echo("<br />\n");
	}
}
function checkPdoAvailable()
{
	if (!defined('PDO::ATTR_DRIVER_NAME')) 
	{
		UserFeedback('Database Connection == <b>mysqli</b>',2);
	}
	elseif (defined('PDO::ATTR_DRIVER_NAME')) 
	{
		UserFeedback('Database Connection == <b>pdo</b>',2);
	}
}

class renderhtml
{
	private $required_files;
	private function createRequiredFileList()
	{
		$this->required_files = array(	 "./html/header.html"
				,"./styles/configtool.css"
				,"./html/body.html"
				,"./js/config_support.js"
				,"./html/footer.html"
		);
	}
	/**
	 * check make sure all the needed files are there
	 */
	private function checkFiles()
	{
		$missing_file = FALSE;
		foreach ( $this->required_files as $fn)
		{
			if(!is_readable($fn))
			{
				echo("Missing file: " . $fn ."<br />");
				$missing_file = TRUE;
			}
		}
		if($missing_file == TRUE)
		{
			exit();
		}
	}
	public function render()
	{
		$this->createRequiredFileList();
		$this->checkFiles();
		ob_start();
		foreach ( $this->required_files as $fn)
		{
			readfile($fn);
		}
		ob_end_flush();
	}
}
/** search for the config files
 *
 */
class searchFiles
{
	private $wpfilename;
	private $xfFileName;
	private $path;
	private $searchstrings;
	
	public function search()
	{
		UserFeedback("Start searching: " . date("m/d/Y H.i.s"),2);
		//UserFeedback("Searching from web root: ");
		self::setsearchterms();

		foreach ($this->searchstrings AS $searchstring)
		{
			$location = FALSE;
			self::findwebroot();
			UserFeedback("Searching for : " . $searchstring);
			$location = self::findconfig($searchstring);
			
			if(!$location == FALSE)
			{
				$location = str_replace("//", "/", $location); 
				UserFeedback($searchstring . " configuration value should be: <b>" . $location ."</b>", 2);
			}
			else
			{
				UserFeedback("Could not locate " . $searchstring, 2);
			}
		}
		UserFeedback(" ",2);
		UserFeedback("Finished searching : " . date("m/d/Y H.i.s"));
	}
	private function setsearchterms()
	{
		if(isset($_GET['xfconfig']))
		{
			$this->searchstrings[] = filter_var($_GET['xfconfig'], FILTER_SANITIZE_STRING);
		}
		if(isset($_GET['wpconfig']))
		{
			$this->searchstrings[] = filter_var($_GET['wpconfig'], FILTER_SANITIZE_STRING);
		}
	}
	
	private function findwebroot()
	{
		//UserFeedback("Document Root == " . $_SERVER['DOCUMENT_ROOT'],2);
		chdir($_SERVER['DOCUMENT_ROOT']);
		$this->path[] = $_SERVER['DOCUMENT_ROOT'];
	}

	
	private function findconfig($searchstring)
	{
		$searchpath = pathinfo($searchstring);
		//cycle through the entire array
		while(count($this->path) != 0)
		{
			//UserFeedback("dir count: " . count($this->path));
			$pathShift = array_shift($this->path); 	// remove the item from the array
			foreach (glob($pathShift) as $dirItem)				//cycle through each item in the directory
			{
				$found = FALSE;
				if(is_dir($dirItem))
				{
					$this->path[] = $dirItem . '/*';	//add to the array
				}
				elseif (is_file($dirItem) && basename($dirItem) == $searchpath['basename']) 
				{
					if(!isset($searchpath['dirname']))
					{
						$found = TRUE;
					}
					elseif(!strpos($dirItem, $searchpath['dirname']) === FALSE) 
					{
						$found = TRUE;
					} 
				}
				
				if($found)
				{
					$this->path = array();
					return ($dirItem);
				}
			} //end foreach
			
		}// end while
	}
}
?>