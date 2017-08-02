<?php

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";
require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Correios.php";

use licor\Correios;
use PHPUnit\Framework\TestCase;

class CorreiosTest extends TestCase 
{
	public function testOk() 
	{
		$correios = new Correios;
		$result = $correios->consultaCEP('21920420');

		$this->assertClassHasAttribute('error', $result);	
	}
}