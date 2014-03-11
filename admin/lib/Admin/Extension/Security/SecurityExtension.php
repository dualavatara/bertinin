<?php

namespace Admin\Extension\Security;

use Admin\Application;
use Admin\Event;
use Admin\ExtensionInterface;
use Admin\Response;

require_once 'model/adminlogs.model.php';
/**
 * Depends on Session extension.
 */
class SecurityExtension implements ExtensionInterface {
	
	/**
	 * @var \Admin\Application
	 */
	private $app;
	
	public function register(Application $app) {
		$user = new \SecurityUser($app);

		$app->setUser($user);
		
		$app->getDispatcher()->connect(Event::REQUEST, array($this, 'onRequest'));
		
		$this->app = $app;
	}
	
	public function onRequest(Event $event) {
		$config = $this->app->getConfig();
		$options = $config['security.options'];
		
		if (!isset($options['login_route']) || !isset($options['session_key'])) {
			throw new \InvalidArgumentException('Required options of SecurityExtension are not defined.');
		}


		$data = $event->getData();

        //Logging user requests
        $logroute = $config['routes'][$data['route']];
        $logactions = $config['logactions'];

        /** @noinspection PhpUndefinedMethodInspection */
        if ($logactions->in_array($logroute[2])) {
            $logmodel = new \AdminLogsModel($this->app['db']);
            $form = isset($_REQUEST['form']) ? serialize($_REQUEST['form']) : '';
            $logmodel[0] = array('ts' => \DateTimeWithTZField::fromTimestamp(time()),
                'user_id' =>$this->app->getUser()->id,
                'class' => $logroute[1],
                'action' => $logroute[2],
                'form' => $form,
                'url' => $data['url']
            );
            $logmodel->insert()->exec();
        }
		if (
			$data['route'] != $options['login_route'] && // If user is not on login page
			!$this->app->getUser()->isAuthenticated()       // and not logged in
		) {
			// Save requested page to redirect user back to it
			$this->app->getSession()->write('referrer', $data['url']);
			// Redirect it to login page
			$login_url = $this->app->getUrl($options['login_route']);
			return $this->app->redirect($login_url);
		}
        else if(!$this->app->getUser()->checkRoute($data['route'])) {
		    return new Response('Path restricted to user', 403);
		}
		
		return null;
	}
} 