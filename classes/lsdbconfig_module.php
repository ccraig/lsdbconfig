<?

class LsDbConfig_Module extends Core_ModuleBase
{
	/**
	* Creates the module information object
	* @return Core_ModuleInfo
	*/
	protected function createModuleInfo()
	{
		return new Core_ModuleInfo(
			"File based Database configuration for Lemonstand",
			"Allows the database to be configured via a text file instead of the 'config_tool'",
			"Chuck Does I.T.",
			"http://www.chuckdoesit.com");
	}


	public function subscribeEvents()
	{
		Backend::$events->addEvent('core:onBeforeDatabaseConnect', $this, 'onBeforeDatabaseConnect');
	}

	public function onBeforeDatabaseConnect($Db_MySQLDriver_instance)
	{

		$db   = $this->getDatabaseInformation();

		$conn = @mysql_connect($db['host'], $db['user'], $db['password']);

		mysql_select_db( $db['name'], $conn );

		return $conn;
	}

	/**
	* Returns custom database setup
	* @return $db Array database information
	*/
	public function getDatabaseInformation()
	{
		//Add custom database setup
		$db = array();

		//MAMP
		$db['host']        = '127.0.0.1';
		$db['user']        = 'root';
		$db['password']    = 'root';
		$db['name']        = '<database>';

		//AppFog
    /*
		$json = getenv("VCAP_SERVICES");

		if ( $json != '' ) {
			$json = json_decode( $json );

			foreach( $json->{'mysql-5.1'} as $service ) {
			  $db['host']     = $service->credentials->host.':'.$service->credentials->port;
			  $db['user']     = $service->credentials->user;
			  $db['password'] = $service->credentials->password;
			  $db['name']     = $service->credentials->name;
			}
		}
    *?

		//Pagodabox
    /*
		if ( isset( $_SERVER["DB1_HOST"] ) ) {
			$db['host']     = $_SERVER["DB1_HOST"].':'.$_SERVER["DB1_PORT"];
			$db['user']     = $_SERVER["DB1_USER"];
			$db['password'] = $_SERVER["DB1_PASS"];
			$db['name']     = $_SERVER["DB1_NAME"];
		}
    */

		return $db;
	}

}
?>
