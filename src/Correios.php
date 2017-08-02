<?php

namespace licor;

class Correios {

    private $url = 'https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl';
    private $soapClient;

	private function createSoapClient() {
        $soapClient = new \SoapClient($this->url, array (
            'encoding'      => 'UTF-8',
            'verifypeer'    => false,
            'verifyhost'    => false,
            'soap_version'  => SOAP_1_1,
            'trace'         => true,
            'compression'   => 0,
            'exceptions'    => true,
            'cache_wsdl'    => WSDL_CACHE_BOTH,
            'stream_context'=> stream_context_create (
                array('http'=>
                    array(
                        'protocol_version'=>'1.0',
                        'header' => 'Connection: Close'
                    )
                )
            )
        ));

		return $soapClient;
	}

    function __construct() {
        $this->soapClient = $this->createSoapClient();
    }

    function consultaCEP($cep) {
		try {
			$ret = $this->soapClient->consultaCEP(array('cep' => $cep))->return;
		} catch (Exception $e) {
			$ret = new stdclass;
			$ret->error = $e->getMessage();
		}

        return $ret;
    }
}
