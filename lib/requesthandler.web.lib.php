<?
require_once('config/webhandler.config.php');
require_once('lib/requesthandler.lib.php');


class WebRequestHandler extends RequestHandler implements IRequestHandler {
	/**
	 * @param \IDispatcher $dispatcher
	 */
	public function __construct(IDispatcher $dispatcher, array $cfg) {
		parent::__construct($dispatcher);
        foreach($cfg as $record) {
            $rec = explode('->', $record[1]);
		    $this->addMatcher($this->di->WebRequestMatcher($record[0], $rec[0], $rec[1], $record[2]));
        }
	}

	/**
	 * @param string $requestUri
	 * @return bool
	 */
	public function handle($requestUri) {

        $uri_arr = explode('&', $requestUri);

        if( is_array($uri_arr) ){
            //удаляем из урла параметры препятствующие его корректному разбору функцией parse_url, актуально для авторизации через vk
            array_walk( $uri_arr, function($param, $count) use (&$uri_arr) { if( strpos($param, 'photo') !== false || strpos($param, 'photo_rec') !== false ){ unset($uri_arr[$count]); } } );
            $requestUri = implode('&', $uri_arr);
        }

		$path = parse_url($requestUri, PHP_URL_PATH);

		$res = $this->callCtlMethod($path);

		return $res;
	}
}
?>