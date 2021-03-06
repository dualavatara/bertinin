<?php

class SecurityUser implements \Admin\Extension\Security\SecurityUserInterface {

    const ROUTES = 'routes';

	/**
	 * @var \AdminUserModel
	 */
	private $user;
	
	/**
	 * @var \Admin\Application
	 */
	private $app;
	
	/**
	 * @var string Session key to store information about user
	 */
	private $key;
	
	/**
	 * @var array Routes that are allowed always for any user
	 */
	private $defaultRoutes;

    private $sessRoutes;
	
	public function __construct(\Admin\Application $app) {
		$config = $app->getConfig();

		$this->app = $app;
		$this->key = $config['security.options']->session_key;
		$this->defaultRoutes = array(
			$config['security.options']->login_route,
			$config['security.options']->logout_route,
		);
	}
	
	/**
	 * Validate user credentials and store user information in session.
	 * Return true if validation passed, false otherwise.
	 *
	 * @param string $login
	 * @param string $password
	 * @return boolean
	 */
	public function authenticate($login, $password) {
		// lazy model initialization
		if (null == $this->user)
			$this->user = new \AdminUserModel($this->app['db']);
		
		$this->user->get()->filter(
			$this->user->filterExpr()->
					eq('login', $login)->
					_and()->
					eq('password', md5($password))
		)->exec();
		
		// Save user info and allowed routes to session
		if (1 == $this->user->count()) {
			$this->app->getSession()->write($this->key, $this->user[0]);
            $routes = $this->getRoutes($this->user[0]->id);
            $this->app->getSession()->write(self::ROUTES, $routes);
			return true;
		}
		
		return false;
	}

	/**
	 * Logout user
	 *
	 * @return void
	 */
	public function logout() {
		$this->app->getSession()->remove($this->key);
	}

	/**
	 * Checks if the user is authenticated or not.
	 *
	 * @return Boolean true if the user is authenticated, false otherwise
	 */
	public function isAuthenticated() {
		return  (null != $this->app->getSession()->read($this->key));
	}

	/**
	 * Return value of user model field.
	 *
	 * @throws \BadMethodCallException
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function __get($name) {
		$user = $this->app->getSession()->read($this->key);
		
		if (null == $user)
			throw new \BadMethodCallException('User is not authenticated');
		
		return $user->$name;
	}

	public function getDefaultRoutes() {
		return $this->defaultRoutes;
	}

	public function getRoutes($user_id = null) {
        //var_dump($user_id, $this->isAuthenticated());
        //$user_id = 1;
		if ((null == $user_id) && (!$this->isAuthenticated())){
			return $this->defaultRoutes;
		} else {
//			$user_id = 2;
//			var_dump($user_id);
			if (null == $user_id) {
                if ($this->sessRoutes) return $this->sessRoutes;
                else {
                    $user_id = $this->id;
                    $accessModel = new \AdminAccessModel($this->app['db']);
                    $route_names = $accessModel->getRouteNames($user_id);
                    $this->sessRoutes = array_merge($route_names->route_name, $this->defaultRoutes);
                    return $this->sessRoutes;
                }
            } //$user_id = $this->id;
			$accessModel = new \AdminAccessModel($this->app['db']);
			$route_names = $accessModel->getRouteNames($user_id);
			return array_merge($route_names->route_name, $this->defaultRoutes);
		}
	}

	/**
	 * Checks that user can get access to specified route
	 * 
	 * @param string $name Route name
	 * 
	 * @return bool
	 */
	public function checkRoute($name) {
		return in_array($name, $this->getRoutes());
	}
}