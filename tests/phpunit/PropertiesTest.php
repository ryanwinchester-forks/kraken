<?php

class PropertiesTest extends TestCase
{
    /** @test */
    public function it_gets_list_of_properties()
    {
        $response = $this->call('GET', 'api/properties');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(20, count($content->data)); // Default count is 20
    }

    /** @test */
    public function it_limits_return_amount()
    {
        $response = $this->call('GET', 'api/properties?count=5');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_includes_forms()
    {
        $response = $this->call('GET', 'api/properties?count=5&include=forms');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->forms->data);
    }

    /** @test */
    public function it_includes_forms_and_contacts()
    {
        $response = $this->call('GET', 'api/properties?count=5&include=contacts,forms');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty('data', $content->data[0]->forms->data);
        $this->assertNotEmpty('data', $content->data[0]->contacts->data);
    }

    /** @test */
    public function it_shows_a_property()
    {
        $response = $this->call('GET', 'api/properties/1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('first_name', $content->key);
    }

    /** @test */
    public function it_shows_a_property_with_forms_and_contacts()
    {
        $response = $this->call('GET', 'api/properties/1?include=forms,contacts');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('first_name', $content->key);
        $this->assertNotEmpty('data', $content->forms->data);
        $this->assertNotEmpty('data', $content->contacts->data);
    }

    /** @test */
    public function it_deletes_a_property()
    {
        $response = $this->call('DELETE', 'api/properties/1');
        $content = json_decode($response->getContent());
        $removedProperty = \SevenShores\Kraken\Property::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals('first_name', $content->key);
        $this->assertNull($removedProperty);
    }

    /** @test */
    public function it_adds_a_property()
    {
        $data = [
            'name'     => 'Test property',
            'key'      => 'test_property',
            'label'    => 'Test property',
            'default'  => 'this is a test',
            'required' => true,
            'type_id' => 1,
        ];
        $response = $this->call('POST', 'api/properties', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['name'], $content->name);
        $this->assertEquals($data['key'], $content->key);
        $this->assertEquals($data['label'], $content->label);
        $this->assertEquals($data['default'], $content->default);
        $this->assertEquals($data['required'], $content->required);
    }

    /** @test */
    public function it_updates_a_property()
    {
        $data = [
            'key'      => 'test_property2',
            'required' => false,
        ];
        $response = $this->call('PUT', 'api/properties/1', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        $updatedProperty = \SevenShores\Kraken\Property::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['key'], $content->key);
        $this->assertEquals($data['required'], $updatedProperty->required);
    }
}
