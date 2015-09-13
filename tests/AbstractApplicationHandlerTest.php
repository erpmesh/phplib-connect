<?php


class AbstractApplicationHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testHandleRequest()
    {
        $testDocHeader = new erpMesh\phplib\DocHeader();
        $testDocDetail = [new erpMesh\phplib\DocDetail()];
        //class_alias('erpMesh\phplib\AbstractApplicationHandler', 'AbstractApplicationHandler');

        $stub = $this->getMockForAbstractClass('erpMesh\phplib\AbstractApplicationHandler');
        $stub->expects($this->any())
            ->method('CreatePO')
            ->will($this->returnValue(TRUE));
        $stub->expects($this->any())
            ->method('CreateSO')
            ->will($this->returnValue(TRUE));

        $this->assertTrue($stub->handleRequest());
    }
}