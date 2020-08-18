<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @package App\Tests
 */
class CrudControllerTest extends WebTestCase
{
    public function testForbidden()
    {
        $client = static::createClient();
        $data = ['new' => 'new',];
        $client->request('POST', '/api/article/create', [], [], [], json_encode($data));
        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testWrongToken()
    {
        $client = $this->createTestClient();
        $data = ['new' => 'new',];
        $client->request('POST', '/api/article/create', [], [], [
            'HTTP_AUTHORIZATION' => "WRONG TOKEN"
        ], json_encode($data));
        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testCreate()
    {
        $client = $this->createTestClient();
        $data = ['new' => 'new',];
        $client->request('POST', '/api/article/create', [], [], [], json_encode($data));
        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    protected function createTestClient()
    {
        return static::createClient([], [
            'HTTP_AUTHORIZATION' => $_ENV['APP_TOKEN'],
            'CONTENT_TYPE'       => 'application/json'
        ]);
    }
}
