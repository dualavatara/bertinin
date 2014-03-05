<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 17:18
 */

namespace Lists;


use Form\StdField;

class ValueLinkField extends StdField{
    protected function show($data, $content = null) {
        $value = '';
        $id = 0;
        if ($this->object) {
            $value = $this->object->{$this->name};
            $id = $this->object->id;
        }
        ?>
        <a href="<?php echo $value;?>" target="_blank"><?php echo $value;?></a>
<?php
    }
} 