<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'Los Talas 940, La Unión.',
            'email1'        => 'info@energiaelectrica.com.ar ',
            'email2'        => 'ventas@energiaelectrica.com.ar',
            'phone1'        => '+541157614587|(011) 57614587',
            'phone2'        => '+541124471984|(011) 24471984',
            'logo_header'   => 'images/data/header.svg',
            'logo_footer'   => 'images/data/footer.svg'
        ]);
         
    }
}
