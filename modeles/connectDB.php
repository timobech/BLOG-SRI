<?php 
class connectDB extends PDO
{
	public function __construct($file = 'param.ini')
	{
		if (!$settings = parse_ini_file($file, TRUE)) 
			throw new exception('Impossible d\'ouvrir ' . $file . '.'); 
		$dns = $settings['database']['driver'] .':host=' .$settings['database']['host'] . 
              ';port=' . $settings['database']['port']. 
              ';dbname=' . $settings['database']['schema']; 
		parent::__construct($dns, $settings['database']['username'], $settings['database']['password']); 
	}
}