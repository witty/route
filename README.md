## Route Class

### Basic Usage

	require '/path/to/modules/witty/witty.php';
	Witty::init();
	Witty::set_config_dir('config');

	$route = Witty::instance('Route');

	var_dump($route->parse()); // return controller/action

	var_dump($_GET);

### config

	return array(
		'Route' => array(
			'default' => 'default',
			'foo/bar/(?<id>[0-9]+)' => 'hello/world', //$_GET['id'] = 333
		),
	);

