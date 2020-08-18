<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @package App\Tests
 */
class CrudControllerTest extends WebTestCase
{
    public function testForbidden(): array
    {
        $client = $this->createTestClient();

        $data = ['new' => 'new',];
        $client->request('POST', '/api/article/create', [], [], [
            'CONTENT_TYPE' => 'application/json',
            'HTTP_AUTHORIZATION' => "TOKEN"
        ], json_encode($data));
        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(401, $client->getResponse()->getStatusCode());

        return $response;
    }

    protected function createTestClient()
    {
        return static::createClient([], [
            'HTTP_AUTHORIZATION' => "TOKEN",
            'CONTENT_TYPE'  => 'application/json'
        ]);
    }
}
