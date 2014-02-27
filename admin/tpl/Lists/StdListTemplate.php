<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 17:41
 */

namespace Lists;

use Admin\Extension\Template\Template;

class StdListTemplate extends Template {
    /**
     * @var \Model
     */
    private $model;

    public function __construct(\Admin\Application $app, \Model $model, $section) {
        parent::__construct($app);
        $this->model = $model;
        $this->section = $section;
    }

    protected function show($data, $content = null) {
        ?>
        <div class="submenubar">
            <?php $this->showLink('[Добавить]', $this->section . '_add')?>
        </div>
        <table class="list">
            <tr>
                <th width="1%">id</th>
                <?php
                foreach($this->fields as $field) {
                    if (!$field['listfield']) continue;
                    echo '<th>';
                    echo $field['listfield']->getLabel();
                    echo '</th>';
                };
                ?>
                <th width="1%">&nbsp;</th>
            </tr>
            <?php foreach ($data['model']->getModel() as $i => $item): ?>
                <tr class="<?php echo ($i % 2) ? 'odd' : 'even'; ?>">
                    <td><?php echo $item->id; ?></td>

                    <?php
                    foreach($this->fields as $field) {
                        if (!$field['listfield']) continue;
                        echo '<td>';
                        $field['listfield']->setObject($item);
                        $field['listfield']->show($data, $content);
                        echo '</td>';
                    };
                    ?>
                    <td>
                        <?php $this->showLink('&nbsp;X&nbsp;', $this->section . '_delete', array('id' => $item->id),
                            'onClick="return AdminJS.deleteConfirmation();"');?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php if (0 == $data['model']->getModel()->count()): ?>
            <div class="list-empty">Список пуст!</div>
        <?php endif; ?>
    <?php
    }
}