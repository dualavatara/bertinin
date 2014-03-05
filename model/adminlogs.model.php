<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 28.02.14
 * Time: 12:06
 */

require_once 'lib/model.lib.php';

class AdminLogsModel extends Model {
    /**
     * @param IDatabase $db
     */
    public function __construct(IDatabase $db) {
        parent::__construct('admin_logs', $db);

        $this->field(new DateTimeWithTZField('ts'));
        $this->field(new CharField('class'));
        $this->field(new CharField('action'));
        $this->field(new CharField('form'));
        $this->field(new CharField('url'));
        $this->field(new IntField('user_id'));
    }
}