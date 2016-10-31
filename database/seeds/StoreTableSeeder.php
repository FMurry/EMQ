<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store')->delete();
        DB::table('store')->insert(array([
        	'name' => 'Store1',
        	'address' => '2004 El Camino Real',
        	'address2' => '',
        	'city' => 'Santa Clara',
        	'state' => 'California',
        	'zip' => 95050,
        	'country' => 'United States',
        	'phone' => 4085555555,
        	'salesTax' => 8.75
        	],
            ['name' => 'Store2',
            'address' => '2161 Monterey Rd',
            'address2' => '',
            'city' => 'San Jose',
            'state' => 'California',
            'zip' => 95125,
            'country' => 'United States',
            'phone' => 4086666666,
            'salesTax' => 9.00
            ],
            ['name' => 'Store3',
            'address' => '133 Serramonte Center',
            'address2' => '',
            'city' => 'Daly City',
            'state' => 'California',
            'zip' => 94015,
            'country' => 'United States',
            'phone' => 4087777777,
            'salesTax' => 9.00
            ],
            ['name' => 'Store4',
            'address' => '2485 El Camino Real',
            'address2' => '',
            'city' => 'Redwood City',
            'state' => 'California',
            'zip' => 94063,
            'country' => 'United States',
            'phone' => 4088888888,
            'salesTax' => 9.00
            ],
            ['name' => 'Store5',
            'address' => '3747 Grand Ave',
            'address2' => '',
            'city' => 'Oakland',
            'state' => 'California',
            'zip' => 94610,
            'country' => 'United States',
            'phone' => 4081111111,
            'salesTax' => 9.50
            ],
            ['name' => 'Store6',
            'address' => '43950 Pacific Commons Blvd',
            'address2' => '',
            'city' => 'Fremont',
            'state' => 'California',
            'zip' => 94538,
            'country' => 'United States',
            'phone' => 4082222222,
            'salesTax' => 9.50
            ],
            ['name' => 'Store7',
            'address' => '2111 Mission St',
            'address2' => '',
            'city' => 'Santa Cruz',
            'state' => 'California',
            'zip' => 95060,
            'country' => 'United States',
            'phone' => 4083333333,
            'salesTax' => 8.25
            ],
            ['name' => 'Store8',
            'address' => '1415 Main St',
            'address2' => '',
            'city' => 'Watsonville',
            'state' => 'California',
            'zip' => 95076,
            'country' => 'United States',
            'phone' => 4084444444,
            'salesTax' => 8.25
            ],
            ['name' => 'Store9',
            'address' => '2600 Willow Pass Rd',
            'address2' => '',
            'city' => 'Concord',
            'state' => 'California',
            'zip' => 94520,
            'country' => 'United States',
            'phone' => 4081112222,
            'salesTax' => 9.00
            ],
            ['name' => 'Store10',
            'address' => '1871 N Main St',
            'address2' => '',
            'city' => 'Walnut Creek',
            'state' => 'California',
            'zip' => 94596,
            'country' => 'United States',
            'phone' => 4081113333,
            'salesTax' => 8.50
            ],
            ['name' => 'Store11',
            'address' => '789 Mission St',
            'address2' => '',
            'city' => 'San Francisco',
            'state' => 'California',
            'zip' => 94103,
            'country' => 'United States',
            'phone' => 4081114444,
            'salesTax' => 8.75
            ],
            ['name' => 'Store12',
            'address' => '4950 Mission St',
            'address2' => '',
            'city' => 'San Francisco',
            'state' => 'California',
            'zip' => 94112,
            'country' => 'United States',
            'phone' => 4081115555,
            'salesTax' => 8.75
            ]
        ));
    }
}
