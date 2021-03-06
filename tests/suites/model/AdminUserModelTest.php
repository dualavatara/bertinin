<?php
require_once 'tests/utils/PHPUnit_PDO_Database_TestCase.php';
require_once 'tests/utils/PHPUnit_ArrayDataSet.php';

require_once 'model/adminuser.model.php';

/**
 * Test class for AdminUserModel.
 * Generated by PHPUnit on 2012-03-13 at 03:17:31.
 */
class AdminUserModelTest extends PHPUnit_PDO_Database_TestCase {
	/**
	 * @var AdminUserModel
	 */
	protected $object;

	/**
	 * Returns the test dataset.
	 *
	 * @return PHPUnit_Extensions_Database_DataSet_IDataSet
	 */
	protected function getDataSet() {
		return new PHPUnit_ArrayDataSet(array(
			'admin_users' => array(
				array(
					'id' => 1,
					'login' => 'testlogin',
					'password' => 'testpass',
					'name' => 'testname',
					'created' => '2012-01-23 14:58:32'
				)
			)
		));
	}

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new AdminUserModel(self::getDb());
		parent::setUp();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
	}

	/**
	 * @covers AdminUserModel::__construct
	 */
	public function test__construct() {
		$this->assertInstanceOf("IntField", $this->object->getField("id"));
		$this->assertInstanceOf("CharField", $this->object->getField("login"));
		$this->assertInstanceOf("CharField", $this->object->getField("password"));
		$this->assertInstanceOf("CharField", $this->object->getField("name"));
		$this->assertInstanceOf("DateTimeWithTZField", $this->object->getField("created"));
	}
}

?>
