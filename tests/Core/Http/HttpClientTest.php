<?php
use GooBiq\Core\Http\GooBiqHttpException;
use GooBiq\Core\Http\HttpClient;
use GooBiq\Core\Http\HttpMethod;
use GooBiq\Core\Http\HttpRequest;
use GooBiq\Core\Http\HttpResponse;
use GooBiq\Core\Http\HttpHeader;

/**
 * Http Client Test
 *
 * @author Jason Lam
 * @see GooBiq\Core\Http\HttpClient
 */
class HttpClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test against echo json test
     * 
     * @see http://www.jsontest.com/
     */
    /*
    public function testGET() 
    {
        $request = new HttpRequest();
        $request->setUrl('http://echo.jsontest.com/key/value/');
        $request->setMethod(HttpMethod::POST);
        $httpClient= new HttpClient();
        $httpClient->setRequest($request);
        $response = $httpClient->execute();
        $data = json_decode($response->getContent());
        $this->assertEquals($data->key,'value');

    }
    */
    
    /**
     * @expectedException     GooBiq\Core\Http\GooBiqHttpException
     * @expectedExceptionCode GooBiq\Core\Http\HttpClient::HTTP_REQUEST_MISSING_REQUEST_OBJECT
     */
    public function testNoRequestSet() 
    {
        $httpClient= new HttpClient();
        $httpClient->setRequest(null);
        $httpClient->execute();
    }
    
}