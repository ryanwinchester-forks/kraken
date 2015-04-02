<?php

class ContactsTest extends TestCase
{
    /** @test */
    public function it_can_limit_return_amount()
    {
        $response = $this->call('GET', 'api/contacts?limit=5');

        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->contacts));
    }
}
