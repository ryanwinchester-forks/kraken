<?php

class TagsTest extends TestCase
{
    /** @test */
    public function it_gets_list_of_tags()
    {
        $response = $this->call('GET', 'api/tags');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(20, count($content->data)); // Default count is 20
    }

    /** @test */
    public function it_limits_return_amount()
    {
        $response = $this->call('GET', 'api/tags?count=5');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_includes_forms()
    {
        $response = $this->call('GET', 'api/tags?count=5&include=forms');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->forms->data);
    }

    /** @test */
    public function it_includes_forms_and_contacts()
    {
        $response = $this->call('GET', 'api/tags?count=5&include=contacts,forms');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->forms->data);
        $this->assertNotEmpty('data', $content->data[0]->contacts->data);
    }

    /** @test */
    public function it_shows_a_tag()
    {
        $response = $this->call('GET', 'api/tags/1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('Sports', $content->name);
    }

    /** @test */
    public function it_shows_a_tag_with_forms_and_contacts()
    {
        $response = $this->call('GET', 'api/tags/1?include=forms,contacts');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('Sports', $content->name);
        $this->assertNotEmpty('data', $content->forms->data);
        $this->assertNotEmpty('data', $content->contacts->data);
    }

    /** @test */
    public function it_deletes_a_tag()
    {
        $response = $this->call('DELETE', 'api/tags/1');
        $content = json_decode($response->getContent());
        $removedTag = \SevenShores\Kraken\Tag::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('Sports', $content->name);
        $this->assertNull($removedTag);
    }

    /** @test */
    public function it_adds_a_tag()
    {
        $data = [
            'name'        => 'Test tag',
            'slug'        => 'test_tag',
            'description' => 'This is a test description.',
        ];
        $response = $this->call('POST', 'api/tags', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['name'], $content->name);
        $this->assertEquals($data['slug'], $content->slug);
        $this->assertEquals($data['description'], $content->description);
    }

    /** @test */
    public function it_updates_a_tag()
    {
        $data = ['name' => 'Test tag 2'];
        $response = $this->call('PUT', 'api/tags/1', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        $updatedTag = \SevenShores\Kraken\Tag::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['name'], $content->name);
        $this->assertEquals($data['name'], $updatedTag->name);
    }
}
