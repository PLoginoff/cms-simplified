<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @package App\Tests
 */
class PublicControllerTest extends WebTestCase
{
    public function testList(): array
    {
        $client = $this->createTestClient();
        $client->request('GET', '/api/article/list');
        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        return $response;
    }

    protected function createTestClient()
    {
        return static::createClient([], [
            'CONTENT_TYPE'  => 'application/json'
        ]);
    }
}
