<?php

namespace Logs;

use Admin\Extension\Template\Template;

class ListTemplate extends Template {

	public function __construct($app) {
		parent::__construct($app);
		$this->setParent('Layout');
	}

	protected function show($data, $content = null) {
		?>
        <script language="JavaScript">

        </script>
	<table class="list">
		<tr>
			<th width="1%">Id</th>
			<th width="1%">Timestamp</th>
			<th width="1%">Class</th>
			<th width="1%">Action</th>
			<th width="1%">Url</th>
			<th>Form data</th>
			<th width="1%"></th>
		</tr>
		<?php foreach ($data['model'] as $i => $item): ?>
			<tr class="<?php echo ($i % 2) ? 'odd' : 'even'; ?>">
				<td><?php echo $item->id; ?></td>
				<td nowrap><?php echo $item->ts; ?></td>
				<td nowrap><?php echo $item->class; ?></td>
				<td nowrap><?php echo $item->action; ?></td>
				<td nowrap><?php echo $item->url; ?></td>
				<td>
                    <?php
                    if ($item->form) {
                    ?>
                    <a href="javascript:void(0)" id="aform<?php echo $item->id; ?>" onclick="toggle('formdata<?php echo $item->id; ?>', 'aform<?php echo $item->id; ?>', ['скрыть', 'показать']);">показать</a>
                    <div id="formdata<?php echo $item->id; ?>" style="display: none">
                        <?php var_dump(unserialize($item->form)); ?>
                    </div>
                    <?php
                    };
                    ?>
                </td>
				<td>
                    &nbsp;
                </td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php if (0 == $data['model']->count()): ?>
		<div class="list-empty">Список пуст!</div>
		<?php endif; ?>
	<?php

	}
}