<?php

return [
    'app' => [
        'title' => 'General',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-cog',

        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_name', // unique name for field
                'label' => 'Name', // you know what label it is
                'rules' => 'nullable|min:2|max:50', // validation rule of laravel
                'class' => null, // any class for input
                'value' => config('app.name') // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_description', // unique name for field
                'label' => 'Description', // you know what label it is
                'rules' => 'nullable|min:2', // validation rule of laravel
                'class' => null, // any class for input
                'value' => '' // default value if you want
            ],
        ]
    ],

    'terms & conditions' => [
        'title' => 'Terms & Conditions',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-cog',

        'elements' => [
            [
                'type' => 'textarea',
                'data' => 'string',
                'name' => 'terms',
                'label' => 'Terms & Conditions',
                'rules' => 'nullable|min:2',
                'class' => 'col-12 trems-conditions',
                'value' => ''
            ]
        ]
    ],

    'social media' => [

        'title' => 'Social Media',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'facebook',
                'label' => 'Facebook',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'file',
                'data' => 'string',
                'name' => 'contact_img',
                'label' => 'Contact Image',
                'rules' => 'nullable|image',
                'class' => null,
                'value' => '',
                'dimension' => 'contact_image',

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'twitter',
                'label' => 'Twitter',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'instagram',
                'label' => 'Instagram',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'whatsapp',
                'label' => 'Whatsapp',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'linkedin',
                'label' => 'linkedin',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'telegram',
                'label' => 'telegram',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'tiktok',
                'label' => 'tiktok',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'snapchat',
                'label' => 'snapchat',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ],
        ]
    ],

    'contact' => [

        'title' => 'Contact Account',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'email',
                'label' => 'Email',
                'rules' => 'nullable|string|email',
                'class' => null,
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'phone',
                'label' => 'Phone Number',
                'rules' => 'nullable|string',
                'class' => null,
                'value' => ''

            ]
        ]
    ],

    'logo' => [

        'title' => 'Logo',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'file',
                'data' => 'file',
                'name' => 'logo',
                'label' => 'Logo',
                'rules' => 'nullable|image',
                'class' => null,
                'value' => '',
                'dimension' => 'logo',

            ],
            [
                'type' => 'file',
                'data' => 'file',
                'name' => 'icon',
                'label' => 'Icon',
                'rules' => 'nullable|image',
                'class' => null,
                'value' => '',
                'dimension' => 'icon',

            ]
        ]
    ],

    'footer' => [

        'title' => 'Footer',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'footer',
                'label' => 'Footer',
                'rules' => 'nullable|string',
                'class' => 'col-12',
                'value' => ''

            ],
        ]
    ],
];