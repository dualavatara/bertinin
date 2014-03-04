<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 12:56
 */

namespace Form;

use Admin\Extension\Template\Template;

class HiddenField extends StdField {
    protected $defaultValue;

    public function __construct(\Admin\Application $app, $name, $label, $section, $defaultValue = null) {
        parent::__construct($app, $name, $label, $section);
        $this->defaultValue = $defaultValue;
    }

    protected function show($data, $content = null) {
        $value = $this->defaultValue;
        ?>
        <input type="hidden" name="form[<?php echo $this->name;?>]" value="<?php echo $value; ?>"/>
<?php
    }
} 