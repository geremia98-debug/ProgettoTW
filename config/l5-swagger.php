<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'API predefinita',
                'version' => '1.0',
                'description' => 'Descrizione dell\'API predefinita',
            ],
            'routes' => [
                /*
                 * Route for accessing api documentation interface
                 */
                'api' => 'api/documentation',
            ],
            'paths' => [
                /*
                 * Edit to include full URL in UI for assets
                 */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),
                'docs' => storage_path('api-docs'),

                /*
                 * File name of the generated JSON documentation file
                 */
                'docs_json' => 'api-docs.json',

                /*
                 * File name of the generated YAML documentation file
                 */
                'docs_yaml' => 'api-docs.yaml',

                /*
                 * Set this to `json` or `yaml` to determine which documentation file to use in UI
                 */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),

                /*
                 * Absolute paths to directories containing the Swagger annotations are stored.
                 */
                'annotations' => [
                    base_path('app/Http/Controllers/Api'),
                ],

                'excludes' => [
                    // Elenco dei percorsi da escludere
                ],
                'base' => base_path('app/Http/Controllers/Api'), // Imposta questo valore con il percorso di base dell'API
            ],
        ],
        'cars' => [
            'api' => [
                'title' => 'API delle auto',
                'version' => '1.0',
                'description' => 'Descrizione dell\'API delle auto',
            ],
            'routes' => [
                /*
                 * Route for accessing the API documentation interface for cars
                 */
                'api' => 'api/documentation/cars',
            ],
            'paths' => [
                /*
                 * Edit to include full URL in UI for assets for cars
                 */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),
                'docs' => storage_path('api-docs'),

                /*
                 * File name of the generated JSON documentation file for cars
                 */
                'docs_json' => 'api-docs-cars.json',

                /*
                 * File name of the generated YAML documentation file for cars
                 */
                'docs_yaml' => 'api-docs-cars.yaml',

                /*
                 * Set this to `json` or `yaml` to determine which documentation file to use in UI for cars
                 */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),

                /*
                 * Absolute paths to directories containing the Swagger annotations for cars are stored.
                 */
                'annotations' => [
                    base_path('app/Http/Controllers/Api/CarController.php'),
                ],
                'excludes' => [
                    // Elenco dei percorsi da escludere
                ],
                'base' => base_path('app/Http/Controllers/Api'), // Imposta questo valore con il percorso di base dell'API
            ],
        ],
        'rentals' => [
            'api' => [
                'title' => 'API dei noleggi',
                'version' => '1.0',
                'description' => 'Descrizione dell\'API dei noleggi',
            ],
            'routes' => [
                /*
                 * Route for accessing the API documentation interface for rentals
                 */
                'api' => 'api/documentation/rentals',
            ],
            'paths' => [
                /*
                 * Edit to include full URL in UI for assets for rentals
                 */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),
                'docs' => storage_path('api-docs'),

                /*
                 * File name of the generated JSON documentation file for rentals
                 */
                'docs_json' => 'api-docs-rentals.json',

                /*
                 * File name of the generated YAML documentation file for rentals
                 */
                'docs_yaml' => 'api-docs-rentals.yaml',

                /*
                 * Set this to `json` or `yaml` to determine which documentation file to use in UI for rentals
                 */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),

                /*
                 * Absolute paths to directories containing the Swagger annotations for rentals are stored.
                 */
                'annotations' => [
                    base_path('app/Http/Controllers/Api/RentalController.php'),
                ],
                'excludes' => [
                    // Elenco dei percorsi da escludere
                ],
                'base' => base_path('app/Http/Controllers/Api'), // Imposta questo valore con il percorso di base dell'API
            ],
        ],
        'users' => [
            'api' => [
                'title' => 'API degli utenti',
                'version' => '1.0',
                'description' => 'Descrizione dell\'API degli utenti',
            ],
            'routes' => [
                /*
                 * Route for accessing the API documentation interface for users
                 */
                'api' => 'api/documentation/users',
            ],
            'paths' => [
                /*
                 * Edit to include full URL in UI for assets for users
                 */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),
                'docs' => storage_path('api-docs'),
                /*
                 * File name of the generated JSON documentation file for users
                 */
                'docs_json' => 'api-docs-users.json',
                /*
                 * File name of the generated YAML documentation file for users
                 */
                'docs_yaml' => 'api-docs-users.yaml',
                /*
                 * Set this to `json` or `yaml` to determine which documentation file to use in UI for users
                 */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),
                /*
                 * Absolute paths to directories containing the Swagger annotations for users are stored.
                 */
                'annotations' => [
                    base_path('app\Http\Controllers\Api\UserController.php'),
                ],
                'excludes' => [
                    // Elenco dei percorsi da escludere
                ],
                'base' => base_path('app/Http/Controllers/Api'), // Imposta questo valore con il percorso di base dell'API
            ],
        ],
    ],
    'defaults' => [
        // Rest of your L5-Swagger configuration settings...
    ],
];
