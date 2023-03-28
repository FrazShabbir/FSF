<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

use App\Models\Community;
use App\Models\Province;
use App\Models\City;

class HirarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::create([
            'id' => 1,
            'name' => 'Spain',
            'iso2' => 'ES',
            'iso3' => 'ESP',
            'hod' => 1,
        ]);

        Community::create([
            'id' => 1,
            'name' => 'Valenciana',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 2,
            'name' => 'Murcia',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 3,
            'name' => 'Aragón (A)',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 4,
            'name' => 'Baleares',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 5,
            'name' => 'Cataluña',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 6,
            'name' => 'Andalucía',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 7,
            'name' => 'Extremadura',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 8,
            'name' => 'Castilla-La Mancha (B)',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 9,
            'name' => 'Castilla y León',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 10,
            'name' => 'La Rioja',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 11,
            'name' => 'Navarra',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 12,
            'name' => 'País Vasco',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 13,
            'name' => 'Cantabria',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Community::create([
            'id' => 14,
            'name' => 'Madrid',
            'country_id' => 1,
            'hod' => 1,
        ]);
        Community::create([
            'id' => 15,
            'name' => 'Aragón (B)',
            'country_id' => 1,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 1,
            'name' => 'Valencia',
            'community_id' => 1,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 2,
            'name' => 'Castellón de la Plana',
            'community_id' => 1,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 3,
            'name' => 'Alicante',
            'community_id' => 1,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 4,
            'name' => 'Murcia',
            'community_id' => 2,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 5,
            'name' => 'Zarragoza',
            'community_id' => 3,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 6,
            'name' => 'Islas Baleares',
            'community_id' => 4,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 7,
            'name' => 'Barcelona',
            'community_id' => 5,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 8,
            'name' => 'Tarragona',
            'community_id' => 5,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 9,
            'name' => 'Gerona',
            'community_id' => 5,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 10,
            'name' => 'Lleida',
            'community_id' => 5,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 11,
            'name' => 'Córdoba',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 12,
            'name' => 'Sevilla',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 13,
            'name' => 'Granada',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 14,
            'name' => 'Málaga',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 15,
            'name' => 'Badajoz',
            'community_id' => 7,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 16,
            'name' => 'Almería',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 17,
            'name' => 'Jaén',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 18,
            'name' => 'Cádiz',
            'community_id' => 6,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 19,
            'name' => 'Toledo',
            'community_id' => 8,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 20,
            'name' => 'Burgos',
            'community_id' => 9,
            'hod' => 1,
        ]);

        Province::create([
            'id' => 21,
            'name' => 'La Rioja',
            'community_id' => 10,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 22,
            'name' => 'Navarra',
            'community_id' => 11,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 23,
            'name' => 'Alava',
            'community_id' => 12,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 24,
            'name' => 'Guipúzcoa',
            'community_id' => 12,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 25,
            'name' => 'Vizcaya',
            'community_id' => 12,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 26,
            'name' => 'Santander',
            'community_id' => 13,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 27,
            'name' => 'Madrid',
            'community_id' => 14,
            'hod' => 1,
        ]);
        Province::create([
            'id' => 28,
            'name' => 'Zarragoza',
            'community_id' => 15,
            'hod' => 1,
        ]);

        City::create([
            'name' => 'Valencia',
            'province_id' => 1,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Vinaros',
            'province_id' => 2,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Castellón',
            'province_id' => 2,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Burriana',
            'province_id' => 2,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Benidorm',
            'province_id' => 3,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Murcia',
            'province_id' => 4,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Alicante',
            'province_id' => 3,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Elche',
            'province_id' => 3,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Caspe',
            'province_id' => 5,
            'office_id' => 1,
            'hod' => 1,
        ]);

        City::create([
            'name' => 'Palma de Mallorca',
            'province_id' => 6,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Barcelona',
            'province_id' => 7,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Amposta',
            'province_id' => 8,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'L Aldea',
            'province_id' => 8,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Salou',
            'province_id' => 8,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Tortosa',
            'province_id' => 8,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Reus',
            'province_id' => 8,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Tarragona',
            'province_id' => 8,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Gerona',
            'province_id' => 9,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Lleida',
            'province_id' => 10,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Córdoba',
            'province_id' => 11,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Sevilla',
            'province_id' => 12,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Granada',
            'province_id' => 13,
            'office_id' => 1,
            'hod' => 1,
        ]);

        City::create([
            'name' => 'Málaga',
            'province_id' => 14,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Badajoz',
            'province_id' => 15,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Almería',
            'province_id' => 16,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Jaén',
            'province_id' => 17,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Cádiz',
            'province_id' => 18,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Albox',
            'province_id' => 19,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Toledo',
            'province_id' => 20,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Sonseca',
            'province_id' => 20,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Burgos',
            'province_id' => 21,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Haro',
            'province_id' => 22,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Logroño',
            'province_id' => 22,
            'office_id' => 1,
            'hod' => 1,
        ]);
        City::create([
            'name' => 'Pamplona',
            'province_id' => 23,
            'office_id' => 1,
            'hod' => 1,
        ]);

        City::create([
            'name' => 'Vitoria-Gasteiz',
            'province_id' => 24,
            'office_id' => 1,
            'hod' => 1,
        ]); City::create([
            'name' => 'San Sebastián',
            'province_id' => 25,
            'office_id' => 1,
            'hod' => 1,
        ]); City::create([
            'name' => 'Bilbao',
            'province_id' => 26,
            'office_id' => 1,
            'hod' => 1,
        ]); City::create([
            'name' => 'Santander',
            'province_id' => 27,
            'office_id' => 1,
            'hod' => 1,
        ]); City::create([
            'name' => 'Madrid',
            'province_id' => 28,
            'office_id' => 1,
            'hod' => 1,
        ]); City::create([
            'name' => 'Zarragoza',
            'province_id' => 5,
            'office_id' => 1,
            'hod' => 1,
        ]);
    }
}
