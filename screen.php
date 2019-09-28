<?php
ini_set('display_errors','Off');

require '/var/www/html/vendor/autoload.php';

use JonnyW\PhantomJs\Client;
use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;

if(!isset($_GET['id'])) {
    echo 'Not found URL.';
}
else {
    $id = $_GET['id']; 
	$pid = $_GET['pid'];
    $postUrl = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?name='.$_GET['id'];

   $location = 'inc';
    $serviceContainer = ServiceContainer::getInstance();
    $procedureLoader = $serviceContainer->get('procedure_loader_factory')
       ->createProcedureLoader($location);

    $client = Client::getInstance();
	$client->getEngine()->setPath('/usr/local/bin/phantomjs');
     $client->getProcedureCompiler()->clearCache();
    $client->getProcedureLoader()->addLoader($procedureLoader);
    $width  = 1340;
    $height = 900;

    $request = $client->getMessageFactory()->createCaptureRequest($postUrl, 'GET', 2000);
    $file = 'img/'. $pid.'.png';
    $request->setOutputFile($file);
    $request->setViewportSize($width, $height);
    $request->setCaptureDimensions($width, $height);

    $response = $client->getMessageFactory()->createResponse();
    $client->send($request, $response);

    if($response->getStatus() != 200) {
        echo "Unable to load the address!".$response->getStatus();
		
		
    }
    else {
        echo '<html><head><body style="margin: 0px; background: #0e0e0e;"><img style="-webkit-user-select: none;cursor: zoom-in;"  src="'.$file.'"></body></html>';
       
    }
}
    ?>