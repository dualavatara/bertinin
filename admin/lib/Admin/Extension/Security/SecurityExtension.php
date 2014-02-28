<?php

namespace Admin\Extension\Security;

require_once 'model\adminlogs.model.php';
/**
 * Depends on Session extension.
 */
class SecurityExtension implements \Admin\ExtensionInterface {
	
	/**
	 * @var \Admin\Application
	 */
	private $app;
	
	public function register(\Admin\Application $app) {
		$config = $app->getConfig();
		$className = $config['security.options']->class;
		
		$user = new $className($app);
		if (!($user instanceof SecurityUserInterface)) {
			throw new \UnexpectedValueException($className . ' class is not implementing SecurityUserInterface.');
		}
		$app['user'] = $user;
		
		$app['dispatcher']->connect(\Admin\Event::REQUEST, array($this, 'onRequest'));
		
		$this->app = $app;
	}
	
	public function onRequest(\Admin\Event $event) {
		$config = $this->app->getConfig();
		$options = $config['security.options'];
		
		if (!isset($options['login_route']) || !isset($options['session_key'])) {
			throw new \InvalidArgumentException('Required options of SecurityExtension are not defined.');
		}


		$data = $event->getData();
        //$this->app['session']->remove('user');//принудительный логаут

        //Logging user requests
        $logroute = $config['routes'][$data['route']];
        $msg = 'Class: ' . $logroute[1] . ', action: ' . $logroute[2];
        $logactions = $config['logactions'];

        if ($logactions->in_array($logroute[2])) {
            $logmodel = new \AdminLogsModel($this->app['db']);
            $form = isset($_REQUEST['form']) ? serialize($_REQUEST['form']) : '';
            $logmodel[0] = array('ts' => \DateTimeWithTZField::fromTimestamp(time()),
                'user_id' =>$this->app['user']->id,
                'class' => $logroute[1],
                'action' => $logroute[2],
                'form' => $form,
                'url' => $data['url']
            );
            $logmodel->insert()->exec();
        }
		if (
			$data['route'] != $options['login_route'] && // If user is not on login page
			!$this->app['user']->isAuthenticated()       // and not logged in
		) {
			// Save requested page to redirect user back to it
			$this->app['session']->write('referrer', $data['url']); 
			// Redirect it to login page
			$login_url = $this->app->getUrl($options['login_route']);
			return $this->app->redirect($login_url);
		}
        else if(!$this->app['user']->checkRoute($data['route'])) {
		    return new \Admin\Response('Path restricted to user', 403);
		}
		
		return null;
	}
} 