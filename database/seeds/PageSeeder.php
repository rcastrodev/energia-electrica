<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['name' => 'inicio']);
        Page::create(['name' => 'empresa']);
        Page::create(['name' => 'servicios']);
        Page::create(['name' => 'clientes']);
        Page::create(['name' => 'blog']);
    }
}
