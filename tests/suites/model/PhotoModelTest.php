<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 16:38
 */

require_once 'model/PhotoModel.php';

require_once 'tests/utils/PHPUnit_PDO_Database_TestCase.php';
require_once 'tests/utils/PHPUnit_ArrayDataSet.php';

class PhotoModelTest extends PHPUnit_PDO_Database_TestCase {

    protected $model;
    protected $refarr = array(
        array('id' => 1, 'parent_id' => 1, 'img' => 'somevar', 'imgtn' => 'test name', 'alt' => 'test value'),
        array('id' => 2, 'parent_id' => 2, 'img' => 'someothervar', 'imgtn' => 'another test name', 'alt' => 'second test value'),
        array('id' => 3, 'parent_id' => 3, 'img' => 'vardigits123', 'imgtn' => 'more test name', 'alt' => 'third test value'),
    );

    public function test__construct() {
        $this->model->get()->all()->exec();
        $i = 0;
        foreach($this->model as $row) {
            $this->assertEquals($this->refarr[$i]['id'], $row->id);
            $this->assertEquals($this->refarr[$i]['img'], $row->img);
            $this->assertEquals($this->refarr[$i]['imgtn'], $row->imgtn);
            $this->assertEquals($this->refarr[$i]['alt'], $row->alt);
            $i++;
        }
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet() {
        return new PHPUnit_ArrayDataSet(array(
            'photo' => $this->refarr
        ));
    }

    protected function setUp() {
        $this->model = new PhotoModel(self::getDb());
        parent::setUp();
    }

}
 