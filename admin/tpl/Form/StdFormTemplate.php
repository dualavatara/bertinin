<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 14:24
 */
namespace Form;

use Admin\Extension\Template\Template;

/**
 * Class StdFormTemplate
 */
class StdFormTemplate extends Template {
    /**
     * @var bool
     */
    private $isEdit;

    /**
     * @var \Model
     */
    private $model;


    /**
     * @param \Admin\Application $app
     * @param $isEdit
     * @param $action
     * @param $model
     */
    public function __construct(\Admin\Application $app, $isEdit, $section, $model) {
        parent::__construct($app);
        $this->model = $model;
        $this->isEdit = $isEdit;
        $this->section = $section;
    }

    /**
     * @param $data
     * @param null $content
     */
    public function show($data, $content = null) {

        ?>
        <div class="submenubar">
            <?php $this->showLink('[Список]', $this->section . '_list')?>
        </div>
        <div class="group">
            <div class="capture"><?php echo $this->isEdit ? 'Редактирование' : 'Создание';?></div>
            <form method="post" id="editForm" class="required" minlength="2" action="<?php echo $this->getUrl($this->section . '_save'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="form[id]" value="<?php echo $this->model->count() ? $this->model[0]->id: ''; ?>"/>
                <div id="general">
                    <table>
                        <?php
                        foreach($this->fields as $field) {
                            $field['formfield']->show($data, $content);
                        };
                            ?>
                    </table>
                </div>
                <div class="button button-save" style="margin-left: 150px;">
                    <div class="icon icon-save"></div>
                    <span>Сохранить</span>
                </div>
            </form>
        </div>
    <?php
    }
}