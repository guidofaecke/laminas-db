<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Db
 */

namespace ZendTest\Db\RowGateway;

use Zend\Db\RowGateway\RowGateway;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-03-01 at 21:02:22.
 */
class RowGatewayTest extends \PHPUnit_Framework_TestCase
{

    protected $mockAdapter = null;

    public function setup()
    {
        // mock the adapter, driver, and parts
        $mockResult = $this->getMock('Zend\Db\Adapter\Driver\ResultInterface');
        $mockResult->expects($this->any())->method('current')->will($this->returnValue(array('id' => 'example')));
        $mockStatement = $this->getMock('Zend\Db\Adapter\Driver\StatementInterface');
        $mockStatement->expects($this->any())->method('execute')->will($this->returnValue($mockResult));
        $mockConnection = $this->getMock('Zend\Db\Adapter\Driver\ConnectionInterface');
        $mockDriver = $this->getMock('Zend\Db\Adapter\Driver\DriverInterface');
        $mockDriver->expects($this->any())->method('createStatement')->will($this->returnValue($mockStatement));
        $mockDriver->expects($this->any())->method('getConnection')->will($this->returnValue($mockConnection));

        // setup mock adapter
        $this->mockAdapter = $this->getMock('Zend\Db\Adapter\Adapter', null, array($mockDriver));
    }

    public function testOffsetSet()
    {
        // If we set with an index, both getters should retrieve the same value:
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $row['testColumn'] = 'test';
        $this->assertEquals('test', $row->testColumn);
        $this->assertEquals('test', $row['testColumn']);
    }

    public function test__set()
    {
        // If we set with a property, both getters should retrieve the same value:
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $row->testColumn = 'test';
        $this->assertEquals('test', $row->testColumn);
        $this->assertEquals('test', $row['testColumn']);
    }

    public function test__isset()
    {
        // Test isset before and after assigning to a property:
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $this->assertFalse(isset($row->foo));
        $row->foo = 'bar';
        $this->assertTrue(isset($row->foo));

        // Test isset before and after assigning to an index:
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $this->assertFalse(isset($row->foo));
        $row['foo'] = 'bar';
        $this->assertTrue(isset($row->foo));
    }

    public function testOffsetExists()
    {
        // Test isset before and after assigning to a property:
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $this->assertFalse(isset($row['foo']));
        $row->foo = 'bar';
        $this->assertTrue(isset($row['foo']));

        // Test isset before and after assigning to an index:
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $this->assertFalse(isset($row['foo']));
        $row['foo'] = 'bar';
        $this->assertTrue(isset($row['foo']));
    }

    public function test__unset()
    {
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $row->foo = 'bar';
        $this->assertEquals('bar', $row->foo);
        unset($row->foo);
        $this->assertEmpty($row->foo);
        $this->assertEmpty($row['foo']);
    }

    public function testOffsetUnset()
    {
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $row['foo'] = 'bar';
        $this->assertEquals('bar', $row['foo']);
        unset($row['foo']);
        $this->assertEmpty($row->foo);
        $this->assertEmpty($row['foo']);
    }

    public function testSave()
    {
        // If we insert a new row, we should be able to read the ID after saving it.
        // For the purposes of this test, the mocks are set up to always generate an
        // id of "example" (see setup method above).
        $row = new RowGateway('id', 'fake', $this->mockAdapter);
        $row->foo = 'bar';
        $row->save();
        $this->assertEquals('example', $row->id);
        $this->assertEquals('example', $row['id']);
    }
}
