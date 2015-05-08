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
         * name, element, type, is_void
         */
        'property-types' => [
            [
                'id'      => 1,
                'name'    => 'Text',
                'element' => 'input',
                'type'    => 'text',
                'is_void' => true,
            ],
            [
                'id'      => 2,
                'name'    => 'Email',
                'element' => 'input',
                'type'    => 'email',
                'is_void' => true,
            ],
            [
                'id'      => 3,
                'name'    => 'Password',
                'element' => 'input',
                'type'    => 'password',
                'is_void' => true,
            ],
            [
                'id'      => 4,
                'name'    => 'Date',
                'element' => 'input',
                'type'    => 'date',
                'is_void' => true,
            ],
            [
                'id'      => 5,
                'name'    => 'Radio',
                'element' => 'input',
                'type'    => 'radio',
                'is_void' => true,
            ],
            [
                'id'      => 6,
                'name'    => 'Checkbox',
                'element' => 'input',
                'type'    => 'checkbox',
                'is_void' => true,
            ],
            [
                'id'      => 7,
                'name'    => 'Hidden',
                'element' => 'input',
                'type'    => 'hidden',
                'is_void' => true,
            ],
            [
                'id'      => 8,
                'name'    => 'Textarea',
                'element' => 'textarea',
                'type'    => null,
                'is_void' => false,
            ],
            [
                'id'      => 9,
                'name'    => 'Select',
                'element' => 'select',
                'type'    => null,
                'is_void' => false,
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
