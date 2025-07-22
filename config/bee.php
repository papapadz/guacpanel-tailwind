<?php

return [
    'available_models' => [
        'Region',
        'Subregion',
        'Country',
        'State',
        'City',
        
        'BusinessType',
        'EducationType',
        'EmploymentStatus',
        'MandatoryEmploymentMembership',
        'PayrollItem',
        'Profession',
        'Position',
        'ProfessionalCertification',

        'Person',
        'CompanyProfile',
        'CompanyLicense',
        'CompanyArea',
        
        'PersonAddress',
        'PersonAffiliation', 
        'PayrollGeneration',
        'PersonFamilyInfo',
        'PersonEducation',
        'PersonMedicalInfo',
        'PersonContactInfo',
        'PersonEmploymentMembership',
        'PersonCertification',
        'AffiliationPayroll',
        'User'
    ],
    
    'model_namespace' => 'App\Models',
    
    'stub_models_path' => '/database/models/',

    'stub_migrations_path' => '/database/migrations/',

    'migration_path' => database_path('migrations'),

    'spatie' => [
        'roles' => [
            'super_admin','admin','super_user','user'
        ],
        'actions' => [
            'add', 'update', 'delete', 'view'
        ]
    ],

    'company' => [
        'areas' => [
            'Admin'
        ],
        'owner' => [
            'employee_id'           => '1',
            'first_name'            => 'Francis',
            'last_name'             => 'Cleofas',
            'middle_name'           => '',
            'birth_date'            => '2000-01-01',
            'birth_place'           => '.',
            'gender'                => 'Male',
            'citizenship_id'        => 1,
            'email'                 => 'admin@dcf.com',
            'password'              => 'password',
            'position'              => [
                'title'         => 'CEO',
                'profession'    => 'Manager'
            ],
            'area'                  => 'Admin'
        ],
        'positions' => [
            [
                'title'         => 'CEO',
                'profession'    => 'Manager'
            ]
        ],
        'profile' => [
            'business_name'             => 'Dog Coach Francis',
            'business_classification'   => 'C',
            'business_scope'            => 'National',
            'business_type'             => [
                'type' => 'Dog Training',
                'description' => 'Dog Behavior Coach and Boarding',
                'category' => 'Service'
            ],
            'city_id'                   => 1,
            'start_date'                => '2025-01-01'
        ]
    ]
];