<?
//require_once 'swift_required.php';
require_once 'lib/JBFWClassLoader.php';

require_once 'config/config.php';
require_once 'lib/dicontainer.lib.php';
require_once 'lib/logger.lib.php';

JBFWClassLoader::addException('/admin/i');

session_start();
if (isset($_SESSION['user']) and in_array('closed_index',$_SESSION['routes'])) {
    function vardump($obj) {
    var_dump($obj);
    };
}
else {
    function vardump($obj) {
    }
}

	$di = new DIContainer();
	$disp = $di->Dispatcher();
try {
    if (Settings::obj()->value('maitenance') && !isset($_SESSION['user'])) {
        require('static/html/maitenance.html');
        return;
    }
    else {
        try {
            $disp->main();
        }
        catch (\NotFoundException $e) {
            header('HTTP/1.1 404 Not Found');
            $_SERVER['REQUEST_URI'] = Settings::obj()->get()->get404();
            $disp->main();
        }
    }
} catch (ModelException $e) {
    require('static/html/maitenance.html');
    return;
}
?>
