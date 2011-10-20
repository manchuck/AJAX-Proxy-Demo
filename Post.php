<?php 
require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();

define('API_KEY', '53nj96wqccwmvc4vd69pgvm5');

define('API_URL', 'http://api.klout.com/1/klout.json');

//Yes I know im not filtering my data sue me its early and there has been too much
//cloud drinking
$client = new Zend_Http_Client(API_URL);

$client->setParameterGet('users', $_POST['users']);
$client->setParameterGet('key', API_KEY);

$response = $client->request(Zend_Http_Client::GET);
foreach ($response->getHeaders() as $name => $value) {
	header($name . ': ' . $value);
}

echo $response->getBody();