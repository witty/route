## Route Class

Route Class is required by app

### Basic Usage

	require '/path/to/modules/witty/witty.php';
	Witty::init();

	Route::set('default', '(<controller>(/<action>(/<id>)))')
		->defaults(array(
			'controller' => 'welcome',
			'action'     => 'index',
		));
