<?php

class PropertyOptionsTest extends TestCase
{
    /** @test */
    public function it_gets_list_of_propertyOptions()
    {
        $response = $this->call('GET', 'api/property-options');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function it_limits_return_amount()
    {
        $response = $this->call('GET', 'api/property-options?count=1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, count($content->data));
    }

    /** @test */
    public function it_shows_a_propertyOption()
    {
        $testOption = config('setup.forms.property-options')[0];
        $response = $this->call('GET', 'api/property-options/1');
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals($testOption['value'], $content->value);
        $this->assertEquals($testOption['label'], $content->label);
    }

    /** @test */
    public function it_deletes_a_propertyOption()
    {
        $testOption = config('setup.forms.property-options')[0];
        $response = $this->call('DELETE', 'api/property-options/1');
        $content = json_decode($response->getContent());
        $removedPropertyOption = \SevenShores\Kraken\PropertyOption::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('1', $content->id);
        $this->assertEquals($testOption['value'], $content->value);
        $this->assertEquals($testOption['label'], $content->label);
        $this->assertNull($removedPropertyOption);
    }

    /** @test */
    public function it_adds_a_propertyOption()
    {
        $data = [
            'value' => 'test_property',
            'label' => 'Test property',
            //'attach'  => [
            //    'properties'  => [1, 2, 3],
            //],
        ];
        $response = $this->call('POST', 'api/property-options', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        //$addedPropertyOption = SevenShores\Kraken\PropertyOption::where('option', $data['option'])->first();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['value'], $content->value);
        $this->assertEquals($data['label'], $content->label);
        //$this->assertEquals(3, $addedPropertyOption->properties->count());
    }

    /** @test */
    public function it_updates_a_propertyOption()
    {
        $data = [
            'value' => 'test_property77',
            'label' => 'Test property77',
            //'relations' => [
            //    'attach' => [
            //        'properties' => [4]
            //    ],
            //    'detach' => [
            //        'properties' => [1]
            //    ],
            //],
        ];
        $response = $this->call('PUT', 'api/property-options/1', [], [], [], $this->headers, json_encode($data));
        $content = json_decode($response->getContent());
        $updatedPropertyOption = \SevenShores\Kraken\PropertyOption::find(1);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data['value'], $content->value);
        $this->assertEquals($data['value'], $updatedPropertyOption->value);
        $this->assertEquals($data['label'], $content->label);
        $this->assertEquals($data['label'], $updatedPropertyOption->label);
        //$this->assertEquals(4, $updatedPropertyOption->properties->where('id', 4)->first()->id);
        //$this->assertNull($updatedPropertyOption->properties->where('id', 1)->first());
    }
}
