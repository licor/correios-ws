<?php

use licor\Correios;
use PHPUnit\Framework\TestCase;

class CorreiosTest extends TestCase 
{
	protected $correios;

    public function setUp()
    {
        $this->correios = new Correios;
    }

	public function testBuscaCEP() 
	{
		$result = (array)$this->correios->consultaCEP('21920420');
		$this->assertArrayHasKey('cep', $result);

		$result = (array)$this->correios->consultaCEP('20780201');		
		$this->assertArrayHasKey('error', $result);
	}

}