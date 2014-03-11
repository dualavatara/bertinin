<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 13:25
 */

namespace Form;

/**
 * Class EditField
 * @package Form
 */
class EditField extends StdField {

    /**
     * @var
     */
    private $size;

    /**
     * @param \Admin\Application $app
     * @param $name
     * @param $label
     * @param $size
     * @param $section
     */
    public function __construct(\Admin\Application $app, $name, $label, $section, $size) {
        parent::__construct($app, $name, $label, $section);
        $this->size = $size;
    }

    /**
     * @param $data
     * @param null $content
     */
    protected function show($data, $content = null) {
        $value = '';
        if ($data['model']->getModel()->count()) {
            $value = $data['model']->getModel()[0]->{$this->name};
        }
        ?>
        <div style="clear:both; line-height:25px;">
            <label style="float:left; padding-right:10px; width: 150px; margin-right: -150px;text-align: right;"
                   for="<?php echo $this->name; ?>"><?php echo $this->label; ?></label>
            <input style="margin-left: 150px;" id="<?php echo $this->name; ?>" name="form[<?php echo $this->name; ?>]"
                   size="<?php echo $this->size; ?>"
                   value="<?php echo $value; ?>"/>
        </div>
    <?php
    }
}