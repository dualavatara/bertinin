<?
require_once('config/webhandler.config.php');
require_once('lib/requesthandler.lib.php');


class WebRequestHandler extends RequestHandler implements IRequestHandler {
	/**
	 * @param \IDispatcher $dispatcher
	 */
	public function __construct(IDispatcher $dispatcher) {
		parent::__construct($dispatcher);

		$this->addMatcher($this->di->WebRequestMatcher('/^\/$/', 'IndexCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru$/', 'IndexCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en$/', 'IndexCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

		$this->addMatcher($this->di->WebRequestMatcher('/^\/solutions$/', 'SolutionsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/solutions$/', 'SolutionsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/solutions$/', 'SolutionsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/advantages$/', 'AdvantagesCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/advantages$/', 'AdvantagesCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/advantages$/', 'AdvantagesCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

		$this->addMatcher($this->di->WebRequestMatcher('/^\/about_us$/', 'AboutUsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/about_us$/', 'AboutUsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/about_us$/', 'AboutUsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/registration$/', 'RequestsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/registration$/', 'RequestsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/registration$/', 'RequestsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/contacts$/', 'ContactsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/contacts$/', 'ContactsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/contacts$/', 'ContactsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/career$/', 'CareerCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/career$/', 'CareerCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/career$/', 'CareerCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/blog$/', 'BlogCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/blog$/', 'BlogCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/blog$/', 'BlogCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/sitemap/', 'SiteMapCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/sitemap/', 'SiteMapCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/sitemap/', 'SiteMapCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/terms/', 'TermsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/terms/', 'TermsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/terms/', 'TermsCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/privacy/', 'PrivacyCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/ru\/privacy/', 'PrivacyCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/en\/privacy/', 'PrivacyCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk$/', 'LkCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk\/logout$/', 'LkCtl', 'logout', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk\/pform$/', 'LkCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk\/contractors$/', 'LkCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk\/banks$/', 'LkCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));
        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk\/documents$/', 'LkCtl', 'main', IRequestMatcher::NO_AUTH_REQUIRED));

        $this->addMatcher($this->di->WebRequestMatcher('/^\/lk\/documents\/load$/', 'LkCtl', 'upload', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/s\/(?<key>.*)$/', 'StaticCtl', 'get', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/realty$/', 'RealtyCtl', 'index', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/realty\/profile\/(?<realtyId>.*)$/', 'RealtyCtl', 'profile', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/car$/', 'CarCtl', 'index', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/carorder\/(?<carId>.*)$/', 'CarCtl', 'order', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/carorder2\/(?<carId>.*)$/', 'CarCtl', 'order2', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/carorderfinish\/(?<carId>.*)$/', 'CarCtl', 'finish', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/car\/profile\/(?<carId>.*)$/', 'CarCtl', 'profile', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/article\/(?<id>.*)$/', 'ArticleCtl', 'article', IRequestMatcher::NO_AUTH_REQUIRED));
		//$this->addMatcher($this->di->WebRequestMatcher('/^\/places\/(?<id>.*)$/', 'CarCtl', 'places', IRequestMatcher::NO_AUTH_REQUIRED));
	}

	/**
	 * @param string $requestUri
	 * @return bool
	 */
	public function handle($requestUri) {

        $uri_arr = explode('&', $requestUri);
        //var_dump($uri_arr);

        if( is_array($uri_arr) ){
            //удаляем из урла параметры препятствующие его корректному разбору функцией parse_url, актуально для авторизации через vk
            array_walk( $uri_arr, function($param, $count) use (&$uri_arr) { if( strpos($param, 'photo') !== false || strpos($param, 'photo_rec') !== false ){ unset($uri_arr[$count]); } } );
            $requestUri = implode('&', $uri_arr);
        }

		$path = parse_url($requestUri, PHP_URL_PATH);

		$res = $this->callCtlMethod($path);
        /*
		if (!$res) {
			$m = UrlAliases::obj()->get();
			$m->get()->filter($m->filterExpr()->eq('alias', $path))->exec();
			if ($m->count()) {
				$path = parse_url($m[0]->url, PHP_URL_PATH);
				$query = parse_url($m[0]->url, PHP_URL_QUERY);
				$r = array();
				parse_str($query, $r);
				$_REQUEST = array_merge($r, $_REQUEST);
				$res = $this->callCtlMethod($path);
			}
		}
        */
		return $res;
	}
}
?>