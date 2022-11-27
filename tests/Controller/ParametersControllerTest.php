<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ParametersControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideParametersData
     */
    public function testParameters($uri, $result): void
    {
        $client = static::createClient();
        $client->request('GET',  $uri);

        $this->assertResponseIsSuccessful();
        $this->assertEquals($result, $client->getResponse()->getContent());
    }

    public function provideParametersData(): array
    {
        return [
            [
                '/parameter',
                '{"parameter1":["A","B","C"],"parameter2":["X","Y","Z"]}'
            ],
            [
                '/parameter?parameter1=B',
                '{"parameter1":["B"],"parameter2":["X","Y","Z"]}'
            ],
            [
                '/parameter?parameter1=A',
                '{"parameter1":["A"],"parameter2":["X","Z"]}'
            ],
            [
                '/parameter?parameter2=Z',
                '{"parameter1":["A","B"],"parameter2":["Z"]}'
            ]
        ];
    }
}
