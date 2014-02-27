<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 12:41
 */

namespace Admin\Extension\Template;


/**
 * Class ModelTemplate
 * @package Admin\Extension\Template
 */
class ModelTemplate extends Template{
    /**
     * @var \AdminModel
     */
    protected $model;

    /**
     * @param $data
     * @param null $content
     * @throws \Exception
     */
    protected function show($data, $content = null) {
        if ($data['model'] instanceof \AdminModel) $this->model = $data['model'];
        else throw new \Exception('ModelTemplate must be used with AdminModel object in params');
    }

    public function __construct(\Admin\Application $app) {
        parent::__construct($app);
        $this->setParent('Layout');
    }
}