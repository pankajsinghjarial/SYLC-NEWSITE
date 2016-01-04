<?php
	/**
     * This component is used for Do Direct payment method
     */

    class Paypal { 
     
    /**
     * API credentials of user depand upon account type sandbox/live
     * @var array
     */
    protected $_credentials = array(
        //~ 'USER' => "buisness_api1.seobrand.com",
        //~ 'PWD' => '4B4Y2UVSU3TYH5MQ',
        //~ 'SIGNATURE' => 'AS9MV74Nv7V8ku8ydAMFCwvsPhyiALZ03zgof6-kqrEisV9QSpy3YsCr',
        'USER' => "seobranddev117-facilitator_api1.gmail.com",
        'PWD' => 'WJCLDP3RP2PXGQMZ',
        'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AAMimBWU2KB3wpwtz2IaclKc9tMS'
    );
    /**
     * API Version
     * @var string
     */
    protected $_version = '86.0';
    
    /**
     * API endpoint
     * Live - https://api-3t.paypal.com/nvp
     * Sandbox - https://api-3t.sandbox.paypal.com/nvp
     * @var string
     */
    protected $_endPoint = 'https://api-3t.sandbox.paypal.com/nvp';
    
    /**
     * To send request to paypal server.
     * @param	(sting) type of method,(array)parameters
     * @return	(array) payment info
     */
    public function request($method,$params = array()) {
        //Check if API method is not empty
        if( empty($method) ) { 
            return false;
        }
        //Our request parameters
        $requestParams = array(
            'METHOD' => $method,
            'VERSION' => $this -> _version
        ) + $this -> _credentials;

        //Building our NVP string
		$request = http_build_query($requestParams + $params);
   
        
        //cURL settings
        $curlOptions = array (
            CURLOPT_URL => $this -> _endPoint,
            CURLOPT_VERBOSE => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $request
        );
        
        $ch = curl_init();
        curl_setopt_array($ch,$curlOptions);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        $response = curl_exec($ch);
        
        //Checking for cURL errors
        if (curl_errno($ch)) {
            $this -> _errors = curl_error($ch);
            curl_close($ch);
            return false;
        } else  {
            curl_close($ch);
            $responseArray = array();
            parse_str($response,$responseArray);  // Break the NVP string to an array
            return $responseArray;
        }
    }
}
?>
