<?php

return [

    'user' => [

        'roles' => [
            'user',
            'admin',
        ],

    ],


    'forms' => [

        /**
         */
        'property-types' => [
            [
                'id'       => 1,
                'template' => 'single-line-text',
                'name'     => 'Text',
                'element'  => 'input',
                'type'     => 'text',
            ],
            [
                'id'       => 2,
                'template' => 'single-line-text',
                'name'     => 'Email',
                'element'  => 'input',
                'type'     => 'email',
            ],
            [
                'id'       => 3,
                'template' => 'single-line-text',
                'name'     => 'Password',
                'element'  => 'input',
                'type'     => 'password',
            ],
            [
                'id'       => 4,
                'template' => 'single-line-text',
                'name'     => 'Date',
                'element'  => 'input',
                'type'     => 'date',
            ],
            [
                'id'       => 5,
                'template' => 'radio',
                'name'     => 'Radio',
                'element'  => 'input',
                'type'     => 'radio',
            ],
            [
                'id'       => 6,
                'template' => 'check',
                'name'     => 'Checkbox',
                'element'  => 'input',
                'type'     => 'checkbox',
            ],
            [
                'id'       => 7,
                'template' => 'single-line-text',
                'name'     => 'Hidden',
                'element'  => 'input',
                'type'     => 'hidden',
            ],
            [
                'id'       => 8,
                'template' => 'multi-line-text',
                'name'     => 'Textarea',
                'element'  => 'textarea',
                'type'     => null,
            ],
            [
                'id'       => 9,
                'template' => 'select',
                'name'     => 'Select',
                'element'  => 'select',
                'type'     => null,
            ],
            [
                'id'       => '10',
                'template' => 'select-with-other',
                'name'     => '',
                'element'  => '',
                'type'     => '',
            ],
            [
                'id'       => '10',
                'template' => 'multi-select',
                'name'     => '',
                'element'  => '',
                'type'     => '',
            ],
            [
                'id'       => '10',
                'template' => 'multi-check',
                'name'     => '',
                'element'  => '',
                'type'     => '',
            ],
        ],

        'property-options' => [
            [
                'value' => 'male',
                'label' => 'Male',
                'property_id' => 22,
            ],
            [
                'value' => 'female',
                'label' => 'Female',
                'property_id' => 22,
            ],
        ],


    ],


];
