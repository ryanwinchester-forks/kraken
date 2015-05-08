<?php

class PropertyTypesTest extends TestCase
{
    /** @test */
    public function it_gets_list_of_propertyTypes()
    {
        $response = $this->call('GET', 'api/property-types');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function it_limits_return_amount()
    {
        $response = $this->call('GET', 'api/property-types?count=5');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(5, count($content->data));
    }

    /** @test */
    public function it_shows_a_propertyType()
    {
        $testType = config('setup.forms.property-types')[0];
        $response = $this->call('GET', 'api/property-types/1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals($testType['name'], $content->name);
        $this->assertEquals($testType['element'], $content->element);
        $this->assertEquals($testType['type'], $content->type);
        $this->assertEquals($testType['is_void'], $content->is_void);
    }

    /** @test */
    public function it_deletes_a_propertyType()
    {
        $testType = config('setup.forms.property-types')[0];
        $response = $this->call('DELETE', 'api/property-types/1');
        $content = json_decode($response->getContent());
        $removedPropertyType = \SevenShores\Kraken\PropertyType::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals($testType['name'], $content->name);
        $this->assertEquals($testType['element'], $content->element);
        $this->assertEquals($testType['type'], $content->type);
        $this->assertEquals($testType['is_void'], $content->is_void);
        $this->assertNull($removedPropertyType);
    }

    /** @test */
    public function it_adds_a_propertyType()
    {
        $data = [
            'name'    => 'Test',
            'element' => 'text',
            'type'    => 'testastic',
            'is_void' => true,
            //'attach'  => [
            //    'properties'  => [1, 2, 3],
            //],
        ];
        $response = $this->call('POST', 'api/property-types', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        //$addedPropertyType = SevenShores\Kraken\PropertyType::where('type', $data['type'])->first();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['name'], $content->name);
        $this->assertEquals($data['element'], $content->element);
        //$this->assertEquals(3, $addedPropertyType->properties->count());
    }

    /** @test */
    public function it_updates_a_propertyType()
    {
        $data = [
            'name'      => 'Test77',
            'element'   => 'text77',
            //'relations' => [
            //    'attach' => [
            //        'properties' => [4]
            //    ],
            //    'detach' => [
            //        'properties' => [1]
            //    ],
            //],
        ];
        $response = $this->call('PUT', 'api/property-types/1', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        $updatedPropertyType = \SevenShores\Kraken\PropertyType::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['name'], $content->name);
        $this->assertEquals($data['name'], $updatedPropertyType->name);
        $this->assertEquals($data['element'], $content->element);
        $this->assertEquals($data['element'], $updatedPropertyType->element);
        //$this->assertEquals(4, $updatedPropertyType->properties->where('id', 4)->first()->id);
        //$this->assertNull($updatedPropertyType->properties->where('id', 1)->first());
    }
}
