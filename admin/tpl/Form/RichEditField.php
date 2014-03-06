<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 18:50
 */

namespace Form;


use Admin\Extension\Template\Template;

class RichEditField extends StdField {
    protected $size;

    public function __construct(\Admin\Application $app, $name, $label, $section, $size) {
        parent::__construct($app, $name, $label, $section);
        $this->size = $size;
    }

    protected function show($data, $content = null) {
        $value = '';
        if ($data['model']->getModel()->count()) {
            $value = $data['model']->getModel()[0]->{$this->name};
        }
        ?>
        <div style="clear:both; line-height:25px;">
            <label style="float:left; padding-right:10px; width: 150px; margin-right: -150px;text-align: right;" for="<?php echo $this->name; ?>"><?php echo $this->label; ?></label>
            <div style="margin-left: 160px;" >
            <textarea id="<?php echo $this->name; ?>" name="form[<?php echo $this->name; ?>]" rows="10" cols="<?php echo $this->size; ?>">
                <?php echo $value; ?>
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'form[<?php echo $this->name; ?>]', {
                    width: '<?php echo $this->size; ?>',
                    uiColor: '#335240',
                    fillEmptyBlocks: false
                } );
            </script>
            </div>
        </div>
    <?php
    }

} 