<?php

ini_set('display_errors','ON');
error_reporting(-1);
require_once __DIR__.'/autoloader.php';



class doRequest{
   public function request ($url)
   {
      $httpClient  = new HttpClient();
      $curlAdapter = new HttpClientAdapterCurl();
      $httpClient->setAdapter($curlAdapter);
      $httpClient->setUri($url);
      $responseObj = false;
      try {
         $responseObj = $httpClient->request(HttpClient::POST);
      } catch (HttpClientException $e) {
         // TODO log message
      }
      return array(
            'requestObj' => $httpClient->getLastRequest(),
            'responseObj' => $responseObj
      );
   }

}

$objRequest = new doRequest();
$reponse = $objRequest->request('http://localhost');
var_dump($reponse);


?>
