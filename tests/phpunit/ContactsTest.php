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
    public function it_limits_return_amount()
    {
        $response = $this->call('GET', 'api/contacts?count=5');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_includes_tags()
    {
        $response = $this->call('GET', 'api/contacts?count=5&include=tags');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->tags->data);
    }

    /** @test */
    public function it_includes_tags_and_properties()
    {
        $response = $this->call('GET', 'api/contacts?count=5&include=tags,properties');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->tags->data);
        $this->assertNotEmpty('data', $content->data[0]->properties->data);
    }

    /** @test */
    public function it_shows_a_contact()
    {
        $response = $this->call('GET', 'api/contacts/1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('testmeister@example.com', $content->email);
    }

    /** @test */
    public function it_shows_a_contact_with_properties_and_tags()
    {
        $response = $this->call('GET', 'api/contacts/1?include=tags,properties');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('testmeister@example.com', $content->email);
        $this->assertNotEmpty('data', $content->tags->data);
        $this->assertNotEmpty('data', $content->properties->data);
    }

    /** @test */
    public function it_deletes_a_contact()
    {
        $response = $this->call('DELETE', 'api/contacts/1');
        $content = json_decode($response->getContent());
        $removedContact = \SevenShores\Kraken\Contact::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('testmeister@example.com', $content->email);
        $this->assertNull($removedContact);
    }

    /** @test */
    public function it_adds_a_contact()
    {
        $content = '{"email": "testmeister2@example.com"}';
        $response = $this->call('POST', 'api/contacts', [], [], [], $this->headers, $content);
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('testmeister2@example.com', $content->email);
    }

    /** @test */
    public function it_updates_a_contact()
    {
        $content = '{"email": "testmeister2@example.com"}';
        $response = $this->call('PUT', 'api/contacts/1', [], [], [], $this->headers, $content);
        $content = json_decode($response->getContent());
        $updatedContact = \SevenShores\Kraken\Contact::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('testmeister2@example.com', $content->email);
        $this->assertEquals('testmeister2@example.com', $updatedContact->email);
    }
}
