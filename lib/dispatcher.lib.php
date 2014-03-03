<?
require_once('lib/exception.lib.php');
require_once('lib/dicontainer.lib.php');
require_once('lib/abstract.lib.php');

interface IDispatcher {

	/**
	 * @abstract
	 * @return array
	 */
	public function getRequest();

	/**
	 * @abstract
	 * @return DIContainer
	 */
	public function di();

	/**
	 * @return Session
	 */
	public function getSession();

	/**
	 * @param Session $session
	 */
	public function setSession(Session $session);

	/**
	 * @abstract
	 * @param string $url    URL for redirect to
	 */
	public function redirect($url);

	/**
	 * @abstract
	 * @return string
	 */
	public function getReferer();
}

class Dispatcher implements IDispatcher {

	/**
	 * @var RequestHandler[]
	 */
	private $classes;

	/**
	 * @var DIContainer
	 */
	private $di;

	/**
	 * @var Session
	 */
	private $session;

	/**
	 * @param DIContainer $di
	 */
	public function __construct(DIContainer $di) {
		$this->di = $di;
		$this->classes = array(
			$this->di->WebRequestHandler($this)
		);
	}

	/**
	 * @throws JBFWAPIException
	 * @return void
	 */
	public function main() {
		$handled = false;

		foreach ($this->classes as $class) {
			$handled = $class->handle($_SERVER['REQUEST_URI']);
            if ($handled) break;
		}

		if (!$handled) {
			throw new NotFoundException();
		}
	}

	/**
	 * @return array
	 */
	public function getRequest() {
		return $_REQUEST;
	}

	/**
	 * @return DIContainer
	 */
	public function di() {
		return $this->di;
	}


	public function setDI($value) {
		$this->di = $value;
	}

	/**
	 * @return ISession
	 */
	public function getSession() {
		return $this->session;
	}

	public function killSession() {
		$this->session->clean();
		$this->oauth->delete();
	}

	/**
	 * @param Session $session
	 */
	public function setSession(Session $session) {
		$this->session = $session;
	}

	/**
	 */
	public function redirect($url) {
		header('Location: ' . $url);
	}

	/**
	 * @return string
	 */
	public function getReferer() {
		return $_SERVER['HTTP_REFERER'];
	}
}

?>