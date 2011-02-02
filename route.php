<?php
/**
 * Route Class
 *
 * @author lzyy http://blog.leezhong.com
 * @version 0.1.0
 */
Class Route extends Witty_Base
{
	public function parse()
	{
		$request = Witty::instance('Request');

		$controller = $action = '';

		$pathinfo = $request->pathinfo;
		if (empty($pathinfo) || $pathinfo == '/')
		{
			return $this->_parse_ca($this->_config['default']);
		}

		foreach ($this->_config as $key => $val)
		{
			preg_match('#'.$key.'#', $pathinfo, $matches);
			if (!empty($matches[0]))
			{
				list($controller, $action) = array_values($this->_parse_ca($val));
				foreach ($matches as $k => $match)
				{
					if (!is_int($k))
					{
						$_GET[$k] = $match;
					}
				}
				break;
			}
		}
		if (empty($controller))
		{
			throw new Route_Exception('no route matches this uri: "{uri}"', array('{uri}' => $request->pathinfo));
		}

		return array('controller' => $controller, 'action' => $action);
	}

	protected function _parse_ca($ca)
	{
		if (strpos($ca, '/') === FALSE)
		{
			return array('controller' => $ca, 'action' => 'index');
		}
		else
		{
			$controller = substr($ca, 0, strpos($ca, '/'));
			$action = substr($ca, strpos($ca, '/')+1);
			return array('controller' => $controller, 'action' => $action);
		}
	}
}
