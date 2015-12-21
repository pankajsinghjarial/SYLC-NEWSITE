<?php 
extract($_POST);
require_once('lib/iContactApi.php'); 
// code for lead save on iContact                        
                iContactApi::getInstance()->setConfig(array(
                    'appId' => '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels',
                    'apiPassword' => '230300AY1',
                    'apiUsername' => 'Sylccorp'
                ));
                // Store the singleton
                $oiContact = iContactApi::getInstance();
		try {
                //Create a contact
                $oiContact = iContactApi::getInstance();
		$cid = $oiContact->CustomaddContactForm($email,'normal' , NULL ,$fax,$phone,$notes);
		$res = $oiContact->subscribeContactToList($cid->contactId, 80172, 'normal');
                } catch (Exception $oException) { // Catch any exceptions
                    // Dump errors
                    var_dump($oiContact->getErrors());
                    // Grab the last raw request data
                    //var_dump($oiContact->getLastRequest());
                    // Grab the last raw response data
                    var_dump($oiContact->getLastResponse());
                }
		

?>
