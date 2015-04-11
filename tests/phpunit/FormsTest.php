<?php

class FormsTest extends TestCase
{
    /** @test */
    public function it_gets_list_of_forms()
    {
        $response = $this->call('GET', 'api/forms');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(20, count($content->data)); // Default count is 20
    }

    /** @test */
    public function it_limits_return_amount()
    {
        $response = $this->call('GET', 'api/forms?count=5');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_includes_properties()
    {
        $response = $this->call('GET', 'api/forms?count=5&include=properties');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->properties->data);
    }

    /** @test */
    public function it_includes_properties_and_tags()
    {
        $response = $this->call('GET', 'api/forms?count=5&include=properties,tags');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->properties->data);
        $this->assertNotEmpty('data', $content->data[0]->tags->data);
    }

    /** @test */
    public function it_shows_a_form()
    {
        $response = $this->call('GET', 'api/forms/1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('My test form', $content->name);
        $this->assertEquals('my-test-form', $content->slug);
    }

    /** @test */
    public function it_shows_a_form_with_properties_and_tags()
    {
        $response = $this->call('GET', 'api/forms/1?include=tags,properties');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('my-test-form', $content->slug);
        $this->assertNotEmpty('data', $content->tags->data);
        $this->assertNotEmpty('data', $content->properties->data);
    }

    /** @test */
    public function it_deletes_a_form()
    {
        $response = $this->call('DELETE', 'api/forms/1');
        $content = json_decode($response->getContent());
        $removedForm = \SevenShores\Kraken\Form::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('my-test-form', $content->slug);
        $this->assertNull($removedForm);
    }

    /** @test */
    public function it_adds_a_form()
    {
        $data = [
            'name'      => 'Test form 1',
            'slug'      => 'test-form-1',
            'attach' => [
                'properties'  => [
                    1 => ['label' => '', 'default' => '', 'required' => 0],
                    2 => ['label' => '', 'default' => '', 'required' => 0],
                    3 => ['label' => '', 'default' => '', 'required' => 0],
                ],
                'tags' => [2],
            ],
        ];
        $response = $this->call('POST', 'api/forms', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        $addedForm = SevenShores\Kraken\Form::where('slug', $data['slug'])->first();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['name'], $content->name);
        $this->assertEquals($data['slug'], $content->slug);
        $this->assertEquals(3, $addedForm->properties->count());
        $this->assertEquals(2, $addedForm->tags->first()->id);
    }

    /** @test */
    public function it_updates_a_form()
    {
        $data = [
            'slug'      => 'test-form-77',
            'relations' => [
                'sync' => [
                    'properties' => [
                        4 => ['label' => 'abcd', 'default' => '1', 'required' => 0],
                        5 => ['label' => 'efgh', 'default' => '2', 'required' => 0],
                        6 => ['label' => 'ijkl', 'default' => '3', 'required' => 0],
                    ]
                ],
                'attach' => [
                    'tags' => [10],
                ],
            ]
        ];
        $response = $this->call('PUT', 'api/forms/1', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        $updatedForm = \SevenShores\Kraken\Form::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['slug'], $content->slug);
        $this->assertEquals($data['slug'], $updatedForm->slug);
        $this->assertEquals(3, $updatedForm->properties->count());
        $this->assertEquals(10, $updatedForm->tags->last()->id);
    }
}
