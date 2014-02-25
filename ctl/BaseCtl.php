<?php
/**
 * User: dualavatara
 * Date: 3/12/12
 * Time: 1:05 AM
 */

namespace Ctl;

require_once 'lib/exception.lib.php';

abstract class BaseCtl {
	/**
	 * @var \IDispatcher
	 */
	protected $disp;

	function __construct(\IDispatcher $disp) {
		$this->disp = $disp;
	}

	abstract static public function link($method, $params);

    protected function doTranslate($uri){

        $navigation = $this->disp->di()->NavigationModel();

        if( strpos($uri,'?') !== false )
            $uri = substr($uri, 0, strpos($uri,'?'));

        $navigation->get()->filter($navigation->filterExpr()->eq('link',$uri))->exec();
        if ( $navigation ){
            $this->categoryData = $navigation->data;
            $this->categoryName = $this->categoryData[0][ $this->translate('name') ];
        }

        $navigation->get()->filter($navigation->filterExpr()->eq('id',\NavigationModel::ID_ROOT))->exec();
        $this->categoryRootName = $navigation->data[0][ $this->translate('name') ];
    }

    protected $categoryData=null;
    protected $categoryName=null;
    protected $categoryRootName=null;

    private function translate($field){
        switch( \Session::obj()->lang ){
            case 'en': $result = $field.'En';
                break;
            case 'ru': $result = $field;
                break;
            default: $result = $field;
            break;
        }
        return $result;
    }

    protected function authorize(){
        if( isset($_POST['login']) && isset($_POST['pwd']) && $_POST['login'] != '' && $_POST['pwd'] != '' ){
            if( $this->auth_user($_POST) ){
                $this->disp->redirect('/lk');
            }
            else{
                $this->disp->redirect('/?message=Неверный адрес электронной почты или пароль');
            }
        }

        if( isset($_POST['login']) && isset($_POST['pwd']) && $_POST['login'] != '' && $_POST['pwd'] == '' ){
            if( $this->renewPass($_POST['login']) ){

            }
        }
    }
    private function renewPass($login){

        $user = $this->disp->di()->SUserModel();

        $user->get()->filter( $user->filterExpr()->eq('login', $login) )->exec();

        if (1 == $user->count()){
            $newPwd = substr(md5(rand()), 0, 8);

            $usrParams = $user->data[0];
            $user[0] = array(   'id'=>$usrParams['id'],
                                'login'=>$usrParams['login'],
                                'password'=>md5($newPwd),
                                'name'=>$usrParams['name'],
                                'company_name'=>$usrParams['company_name'],
                                'type'=>$usrParams['type']);

            $user->update()->exec();
            mail( $usrParams['login'], 'Восстановление пароля на сайте WILLANCE', 'Новый пароль: '.$newPwd, 'From: WILLANCE'."\r\n".'Content-Type: text/plain; charset=utf-8'."\r\n");
        }
        else{
            $this->disp->redirect('/?message=Неверный адрес электронной почты');
        }
    }

    private function auth_user($data){

        $user = $this->disp->di()->SUserModel();

        $user->get()->filter(
            $user->filterExpr()->
                eq('login', $data['login'])->
                _and()->
                eq('password', md5($data['pwd']))
        )->exec();

        if (1 == $user->count()) {

            if( null == $this->disp->getSession() ){
                $this->disp->setSession($this->disp->di()->Session());
            }
            $session = $this->disp->getSession();

            $session->__set('suser', $user->data[0]['id']);
            $session->__set('sroutes', array('/lk'));

            return true;
        }
        return false;
    }

}
