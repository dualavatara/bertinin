<?php

namespace Form;

/**
 * Field of form for editing images.
 * Support images stored in data storage.
 * Show key of current image and show lightbox preview on click.
 * 
 * Input data:
 * $data = array(
 *   'name' => 'name_of_form_field',
 *   'key' => 'image_key_in_storage',
 * );
 */
class ImageField extends StdField {
    public function __construct(\Admin\Application $app, $name, $label, $section) {
        parent::__construct($app, $name, $label, $section);
    }

    function show($data, $content = null) {
        $value = '';
        if ($data['model']->getModel()->count()) {
            $value = $data['model']->getModel()[0]->{$this->name};
        }
        ?>
        <div style="clear:both; line-height:25px;">
            <label style="float:left; padding-right:10px; width: 150px; margin-right: -150px;text-align: right;"
                   for="<?php echo $this->name; ?>"><?php echo $this->label; ?></label>
            <input type="hidden" name="form[<?php echo $this->name; ?>]" value="<?php echo $value; ?>"/>
            <input type="file" style="margin-left: 150px;" id="<?php echo $this->name; ?>" name="<?php echo $this->name; ?>"
                   size="<?php echo $this->size; ?>"
                   value="<?php echo $value; ?>"/>
            <?php if ($value): ?>
                <a href="<?php echo $value; ?>" data-lightbox="<?php echo $value; ?>" target="_blank"><?php echo $value; ?></a>
            <?php endif; ?>
        </div>
        <?php
	}
}