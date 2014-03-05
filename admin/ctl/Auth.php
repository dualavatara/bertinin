<?php
namespace ctl;

class Auth extends \Admin\Controller {
	
	public function do_login(\Admin\Request $request) {
		if ($this->app->getUser()->isAuthenticated()) {
			return $this->redirectHome();
		}
		
		$form = isset($request['form']) ? $request['form'] : array();
				
		if ($this->app->getUser()->authenticate($form['login'], $form['password'])) {
			// Redirect back user to page that has been requested before user redirection to login
			if (null != ($referrer = $this->app->getSession()->read('referrer'))) {
				return $this->app->redirect($referrer);
			}
			
			return $this->redirectHome();
		}
		
		return $this->app->getTemplateEngine()->render('LoginTemplate', array('form' => $form));
	}
	
	public function do_logout() {
		$this->app->getUser()->logout();
		return $this->redirectHome();
	}

	private function redirectHome() {
		$url = $this->app->getUrl('home');
		return $this->app->redirect($url);
	}
}