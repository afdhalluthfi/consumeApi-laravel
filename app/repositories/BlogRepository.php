<?php  


namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise as PromisePromise;
class BlogRepository {

    public function getPost () 
    {
        $klient = new Client();
        $response = $klient->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');
        $responseBody = json_decode($response->getBody(), true);

        return $responseBody; 
    }
    public function baseurl()
    {
        $klient = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
        $response = $klient->request('GET', 'posts/1');
        $responseBody = json_decode($response->getBody(), true);
        dd($responseBody);
    }

    public function sinkronud()
    {
        $klient = new Client();
        $promise = $klient->requestAsync('GET', 'https://jsonplaceholder.typicode.com/posts/1');
        $promise->then(
            function (Response $res) {
                // echo $res->getStatusCode();
                $responseBody = json_decode($res->getBody(), true);
                dd($responseBody);
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
        $promise->wait();
    }

    public function cancurrent()
    {
        $klient = new Client();

        $promise1 = $klient->requestAsync('GET', 'https://jsonplaceholder.typicode.com/posts/1');
        $promise2 = $klient->requestAsync('GET', 'https://jsonplaceholder.typicode.com/posts/2');

        // simpan kedalam array
        $promises = [$promise1, $promise2];

        $result = PromisePromise\Utils::settle($promises)->wait();

        foreach ($result as $r) {
            echo $r['value']->getBody();
        }
    }

    // send query param
    public function senQuery()
    {
        $klient = new Client();

        $response = $klient->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts',
            [
                'query' => [
                    'userId' => 5
                ]
            ]
        );
        echo $response->getBody();
    }

    public function senParam()
    {
        $klient = new Client();
        // untuk ambil iduser
        $response = $klient->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');
        $body = $response->getBody();
        $string = $body->getContents();
        $json = json_decode($string);

        $response1 = $klient->request('GET', 'https://jsonplaceholder.typicode.com/users/' . $json->userId);

        $datajson = json_decode($response1->getBody());
        dd($datajson);
    }
}

