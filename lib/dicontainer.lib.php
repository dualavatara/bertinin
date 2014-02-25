<?
require_once('config/config.php');

//lib classes
require_once('lib/requesthandler.web.lib.php');
require_once('lib/dispatcher.lib.php');
require_once 'lib/PDODatabase.php';
require_once 'lib/Session.php';

//model classes
require_once 'model/SettingModel.php';

//view classes
require_once 'view/TemplateView.php';

/**
 *
 */
class DIContainer extends Singletone{

	/**
	 *
	 */
	public function __construct() {}

	/**
	 * @return string
	 */
	public function getUrl() {
		if ($_SERVER["SERVER_PORT"] == HTTPS_PORT) $proto = 'https';
		else $proto = 'http';
		return $proto . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["DOCUMENT_URI"];
	}

	/**
	 * @return mixed
	 */
	public function Language() {
		if (!Language::instantiated()) {
			$isMulti = !defined('MULTI_LANG') || !MULTI_LANG;
			Language::obj()->init($isMulti, $this->Cache(CACHE_CLASS), new PhraseModel($this->PGDatabase()));
		}
		return Language::obj();
	}

	/**
	 * @param IDispatcher $dispatcher
	 * @return WebRequestHandler
	 */
	public function WebRequestHandler(IDispatcher $dispatcher) {
		return new WebRequestHandler($dispatcher);
	}

	/**
	 * @param $handler
	 * @return BaseEntryHandler
	 */
	public function BaseEntryHandler($handler) {
		return new BaseEntryHandler($handler);
	}

	/**
	 * @return DataStorageMedia
	 */
	public function DataStorageMedia() {
		require_once ('lib/datastorage.media.lib.php');
		return new DataStorageMedia('.' . PATH_DATA);
	}


	//Controllers *********************************************************************************************** //

	/**
	 * @param $dispatcher
	 * @return \Ctl\IndexCtl
	 */
	public function IndexCtl($dispatcher) {
		return new \Ctl\IndexCtl($dispatcher);
	}


	/**
	 * @param $dispatcher
	 * @return Ctl\TemplateCtl
	 */
	public function TemplateCtl($dispatcher) {
		return new \Ctl\TemplateCtl($dispatcher);
	}

	// Views **************************************************************************************************** //

	/**
	 * @return View\TemplateView
	 */
	public function TemplateView(){
		return new \View\TemplateView();
	}

	/**
	 * @return View\IndexView
	 */
	public function IndexView() {
		return new \View\IndexView();
	}

    /**
     * @return View\SolutionsView
     */
    public function SolutionsView() {
        return new \View\SolutionsView();
    }

    /**
     * @return View\AdvantagesView
     */
    public function AdvantagesView() {
        return new \View\AdvantagesView();
    }

    /**
     * @return View\AboutUsView
     */
    public function AboutUsView() {
        return new \View\AboutUsView();
    }

    /**
     * @return View\RequestsView
     */
    public function RequestsView() {
        return new \View\RequestsView();
    }

    /**
     * @return View\ContactsView
     */
    public function ContactsView() {
        return new \View\ContactsView();
    }

    /**
     * @return View\CareerView
     */
    public function CareerView() {
        return new \View\CareerView();
    }

    /**
     * @return View\BlogView
     */
    public function BlogView() {
        return new \View\BlogView();
    }

    /**
     * @return View\SiteMapView
     */
    public function SiteMapView() {
        return new \View\SiteMapView();
    }

    /**
     * @return View\TermsView
     */
    public function TermsView() {
        return new \View\TermsView();
    }

    /**
     * @return View\PrivacyView
     */
    public function PrivacyView() {
        return new \View\PrivacyView();
    }

	/**
	 * @param $ctl
	 * @return View\ArticleView
	 */
	public function ArticleView($ctl) {
		return new View\ArticleView($ctl);
	}

    /**
     * @return View\LkView
     */
    public function LkView() {
        return new View\LkView();
    }

    /**
     * @return View\TemplateLkView
     */
    public function TemplateLkView(){
        return new \View\TemplateLkView();
    }

	// Request matchers ********************************************************************************************* //

	/**
	 * @param $key
	 * @param $class
	 * @param $method
	 * @param bool $authorisationRequired
	 * @return WebRequestMatcher
	 */
	public function WebRequestMatcher($key, $class, $method, $authorisationRequired = true) {
		return new WebRequestMatcher($key, $class, $method, $authorisationRequired);
	}


	// Models ******************************************************************************************************* //

	/**
	 * @return SettingModel
	 */
	public function SettingModel() {
		return new SettingModel($this->PDODatabase());
	}

	// Misc ********************************************************************************************************* //

	/**
	 * @param string $class
	 * @return ICache
	 */
	public function Cache($class) {
		$class = class_exists($class) ? $class : 'MBCache';
		return new $class();
	}

	/**
	 * @return PGDatabase
	 */
	public function PGDatabase() {
		if (isset($GLOBALS['DB_HOST']) && isset($GLOBALS['DB_DBNAME'])) return new PGDatabase($GLOBALS['DB_HOST'],$GLOBALS['DB_PORT'],$GLOBALS['DB_USER'],$GLOBALS['DB_PASSWD'],$GLOBALS['DB_DBNAME'],'utf-8');
		else return new PGDatabase(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME, CHARSET_DB);
	}

	/**
	 * @return PDODatabase
	 */
	public function PDODatabase() {
		return new PDODatabase(DB_DSN, DB_USER, DB_PASS, DB_CHARSET);
	}

	/**
	 * @return Dispatcher
	 */
	public function Dispatcher() {
		return new Dispatcher($this);
	}

    public function Session() {
        return new Session();
    }
	/**
	 * @param $name
	 * @param $arguments
	 * @return mixed
	 * @throws JBFWLogicException
	 */
	public function __call($name, $arguments) {
		if (!method_exists('DIContainer', $name))
			throw new JBFWLogicException("Undefined DIContainer method call: " . $name);
		
		return call_user_func_array(array('DIContainer', $name), $arguments);
    }


	/**
	 * @return OSCollectionRequest
	 */
	public function OSCollectionRequest() {
		return new OSCollectionRequest();
	}
}

?>
