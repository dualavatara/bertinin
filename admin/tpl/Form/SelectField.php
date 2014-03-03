<?php

namespace Form;

use Admin\Extension\Template\Template;

/**
 * Field of form
 *
 * Input data:
 * $data = array(
 *   'name' => 'name_of_form_field',
 *   'values' => array( 'value' => 'text' ),
 *   'selected' => 'key_of_selected_item',
 *   ['empty' => true],
 * );
 */
class SelectField extends StdField {
    private $values;

    private $empty;

    public function __construct(\Admin\Application $app, $name, $label, $values, $empty = false) {
        parent::__construct($app, $name, $label);
        $this->values = $values;
        $this->empty = $empty;
    }

    protected function show($data, $content = null) {
		$selected = $data['selected'];
		?>
        <div style="clear:both; line-height:25px;">
        <label style="float:left; padding-right:10px; width: 150px; margin-right: -150px;text-align: right;" for="<?php echo $this->name; ?>"><?php echo $this->label; ?></label>
	<select style="margin-left: 150px;" name="form[<?php echo $this->name; ?>]">
	<?php if ($this->empty) { ?>
		<option value="" <?php echo ('' == $selected) ? 'selected' : ''; ?>>---</option>
	<?php }; ?>
	<?php foreach ($this->values as $value => $text): ?>
		<option value="<?php echo $value; ?>" <?php echo $selected == $value ? 'selected' : ''; ?>>
			<?php echo $text; ?>
		</option>
	<?php endforeach; ?>
	</select>
        </div>
	<?php

	}
}