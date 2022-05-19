<?php

require __DIR__ . '/../../Controller/Controller.php';

use PHPUnit\TextUI\XmlConfiguration\PHPUnit;

class ControllerTest extends \PHPUnit\Framework\TestCase
{
    private Controller $test;

    public function __construct()
    {
        parent::__construct();
        $this->test = new Controller();
    }

    public function testCleanItem () : void
    {
        $result = $this->test->cleanItem('<strong>mot</strong>');
        $this->assertEquals('mot', $result);
    }
}