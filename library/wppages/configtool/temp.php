<?php

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
	public function search()
	{
		echo("Start: " . date("m/d/Y H.i.s") ."<br />");
		echo("searched for files");
	}
}

function main()
{
	try
	{
		if(isset($_GET['filler']) &&  filter_var($_GET['filler'], FILTER_SANITIZE_STRING)=='TRUE' )
		{
			$sf = new searchFiles();
			$sf->search();
		}
		else
		{
			$rh = new renderhtml();
			$rh->render();
		}
		echo("<br /><br/>Ended At " . date("m/d/Y H.i.s") . "<br/>");
	}
	catch (Exception $e)
	{
		echo("An error occured " . date("m/d/Y H.i.s") . "<br/>");
	}

}
main();
*/
