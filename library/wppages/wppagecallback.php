<?php
class eipSoftware_wppages_wppagecallback
{
	private static $filename = "/media/webfiles/articles/wp-config.php";  
	private static $conntype = "pdo";	//"mysqli"; 
	private static $options = array();			//store the various forum options
	private static $pageDescription;
	private static $connInfo = array();
	private static $wpHtml = array('wpdate'=>'1/1/2013','wptitle'=>'Title Unavailable'
								  ,'wppost'=>'Empty', 'wplink'=>'index.html', 'wpuser'=>'Unknown');
	
	private static function getAddOnOptions()
	{
		self::$conntype = strtolower(self::getOptionValue("eipWPArticleAsPageNode", "eipWPPagesConnType"));
		self::$filename = self::getOptionValue("eipWPArticleAsPageNode", "eipWPConfigFileName");
	}
	/**
	 * read the option value from the admin control panel
	 * @param string $addon
	 * @param string $option_name
	 */
	private static function getOptionValue($addon,$option_name)
	{
		if(!isset(self::$options[$addon][$option_name]))
		{
			self::$options[$addon][$option_name] = XenForo_Application::get('options')->$option_name;
		}
		return(self::$options[$addon][$option_name]);
	}
	
	/**
	 * load the config info from WP file
	 */
	private static function loadWPInfo()
	{
		include_once self::$filename;
		self::$connInfo['prefix']	= $table_prefix;			//table prefix for wordpress tables
	}
	/**
	 * save the config info into an array
	 */
	private static function buildConnInfo()
	{
		self::$connInfo['host'] 	= DB_HOST;
		self::$connInfo['dbname'] 	= DB_NAME;
		self::$connInfo['username'] = DB_USER;
		self::$connInfo['password'] = DB_PASSWORD;
	}
	/**
	 * run the query and store the vaules in an array
	 */
	private static function getWPArticle()
	{
		switch (self::$conntype) 
		{
			case "mysqli":
				$db = new eipSoftware_wppages_extmysql(self::$connInfo, $querytype="SELECT");
				break;
			case "pdo":
				$db = new eipSoftware_wppages_extpdo(self::$connInfo, $querytype="SELECT");
				break;	
			default:
				$result =0;
			break;
		}	

		$result = $db->RunQuery(qry_getWPPost(array(':slug'=>self::$pageDescription),self::$conntype,self::$connInfo['prefix']));
		if (count($result) > 0)
		{
			self::$wpHtml = array('wpdate'=>date_i18n(get_option('date_format'),strtotime($result[0]['post_date']))
								,'wpreviseddate'=>date_i18n(get_option('date_format'),strtotime($result[0]['post_modified']))
								,'wptitle'=>$result[0]['post_title']
								,'wppost'=>wpautop($result[0]['post_content'])
								,'wplink'=>$result[0]['guid']
								,'wpuser'=>$result[0]['user_login']
			);
		}
	}
	/**
	 * Get the wp post and return the values back to the template
	 * @param XenForo_ControllerPublic_Abstract $controller
	 * @param XenForo_ControllerResponse_Abstract $response
	 */
	public static function respond(XenForo_ControllerPublic_Abstract $controller, XenForo_ControllerResponse_Abstract &$response)
	{
		self::getAddOnOptions();		//get the options from admin control panel
		self::$pageDescription = ($response->params["page"]["description"]) ? $response->params["page"]["description"] : "blank";
		self::loadWPInfo();
		self::buildConnInfo();
		self::getWPArticle();

		self::$wpHtml['debug'] = "start: " . date("m/d/Y H.i.s") . " <br />" . $response->params["page"]["description"] . " end";
		
		$response->params['htmlValue'] = self::$wpHtml;
		$response->templateName = "eipSoftware_wppage";
	}	
}
/**
 * Format the query to get the post
 * @param array $parmeters slug
 * @param string $prefix
 * @return eipSoftware_wppages_wpquery
 */
function qry_getWPPost($parmeters, $conntype="pdo", $prefix="")
{
	$qry = new eipSoftware_wppages_wpquery(
			"
			SELECT	p.post_date
					,p.post_modified
					,p.post_title
					,p.post_content
					,p.guid
					,u.user_login
			
			FROM	" . $prefix . "posts AS p
					LEFT OUTER JOIN " . $prefix . "users AS u
						ON p.post_author = u.id
					INNER JOIN
					(
					SELECT	p1.id
							,max(p1.post_modified_gmt)	
					FROM 	" . $prefix . "posts AS p1
					WHERE	p1.post_title = :slug
							AND p1.post_status IN ('publish','inherit')
					GROUP BY p1.post_title
					) sq
					ON p.id = sq.id
			"
			,$parmeters
			,array(':slug'=>($conntype=="pdo") ?  PDO::PARAM_STR : 's')
	);
	return($qry);
}
?>