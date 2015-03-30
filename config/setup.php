<?php

return [

    'user' => [

        'roles' => [
            'user',
            'admin',
        ],

    ],


    'properties' => [

        /**
         * name, element, type, is_void
         */
        'types' => [
            [
                'name'    => 'Text',
                'element' => 'input',
                'type'    => 'text',
                'is_void' => true,
            ],
            [
                'name'    => 'Email',
                'element' => 'input',
                'type'    => 'email',
                'is_void' => true,
            ],
            [
                'name'    => 'Password',
                'element' => 'input',
                'type'    => 'password',
                'is_void' => true,
            ],
            [
                'name'    => 'Date',
                'element' => 'input',
                'type'    => 'date',
                'is_void' => true,
            ],
            [
                'name'    => 'Radio',
                'element' => 'input',
                'type'    => 'radio',
                'is_void' => true,
            ],
            [
                'name'    => 'Checkbox',
                'element' => 'input',
                'type'    => 'checkbox',
                'is_void' => true,
            ],
            [
                'name'    => 'Hidden',
                'element' => 'input',
                'type'    => 'hidden',
                'is_void' => true,
            ],
            [
                'name'    => 'Textarea',
                'element' => 'textarea',
                'type'    => null,
                'is_void' => false,
            ],
            [
                'name'    => 'Select',
                'element' => 'select',
                'type'    => null,
                'is_void' => false,
            ],
            [
                'name'    => 'Option',
                'element' => 'option',
                'type'    => null,
                'is_void' => false,
            ],
        ],


    ],


];
