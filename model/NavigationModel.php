<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 16:25
 */

class NavigationModel extends Model {
    /**
     * @var NavigationModel[]
     */
    protected $children = array();

    /**
     * @param IDatabase $db
     */
    public function __construct(IDatabase $db) {
        parent::__construct("navigation", $db);

        $this->field(new IntField('ord'));
        $this->field(new IntField('parent_id'));
        $this->field(new CharField('name'));
        $this->field(new CharField('url'));
        $this->field(new CharField('target'));
        $this->field(new FlagsField('flags'));
    }

    /**
     *
     */
    public function loadChildren() {
        foreach($this as $row) {
            $cm = new NavigationModel($this->db);
            $cm->get()->filter($cm->filterExpr()->eq('parent_id', $row->id))->order('ord', 1)->exec();
            $this->children[$row->id] = $cm;
        }
    }

    /**
     * @param $id
     * @return NavigationModel|array
     */
    public function getChildren($id) {
        if (isset($this->children[$id]) && $this->children[$id]->count()) return $this->children[$id];
        return array();
    }
}