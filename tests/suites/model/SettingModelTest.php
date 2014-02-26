<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 13:05
 */

require_once 'lib/PDODatabase.php';
require_once 'model/SettingModel.php';

require_once 'tests/utils/PHPUnit_PDO_Database_TestCase.php';
require_once 'tests/utils/PHPUnit_ArrayDataSet.php';

class SettingModelTest extends PHPUnit_PDO_Database_TestCase {
    /**
     * @var SettingModel
     */
    protected $object;

    public function testValue() {
        $this->assertEquals('test value', $this->object->value('somevar'));
        $this->setExpectedException('ModelException', 'Varname not found');
        $this->object->value('unexpected');
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet() {
        return new PHPUnit_ArrayDataSet(array(
            'settings' => array(
                array('id' => 1, 'varname' => 'somevar', 'name' => 'test name', 'value' => 'test value'),
                array('id' => 2, 'varname' => 'someothervar', 'name' => 'another test name', 'value' => 'second test value'),
                array('id' => 3, 'varname' => 'vardigits123', 'name' => 'more test name', 'value' => 'third test value'),
            )
        ));
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new SettingModel(self::getDb());
        parent::setUp();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
    }

    /**
     * @covers SettingModel::__construct
     */
    public function test__construct() {
        $this->assertInstanceOf("CharField", $this->object->getField("name"));
        $this->assertInstanceOf("CharField", $this->object->getField("value"));
    }


}
 