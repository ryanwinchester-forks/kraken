<?php

class ContactsTest extends TestCase
{
    /** @test */
    public function it_gets_list_of_contacts()
    {
        $response = $this->call('GET', 'api/contacts');

        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(20, count($content->data)); // Default count is 20
    }

    /** @test */
    public function it_can_limit_return_amount()
    {
        $response = $this->call('GET', 'api/contacts?count=5');

        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_can_include_tags()
    {
        $response = $this->call('GET', 'api/contacts?count=5&include=tags');

        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->tags->data);
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_can_include_tags_and_properties()
    {
        $response = $this->call('GET', 'api/contacts?count=5&include=tags,properties');

        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->tags->data);
        $this->assertNotEmpty('data', $content->data[0]->properties->data);
        $this->assertEquals(5, count($content->data));
    }
}
