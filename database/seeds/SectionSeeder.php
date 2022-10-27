<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_2']);

        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_3']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_4']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_5']);

        /** Servicios */
        Section::create(['page_id' => Page::where('name', 'servicios')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'servicios')->first()->id, 'name' => 'section_2']);

        /** Clientes */ 
        Section::create(['page_id' => Page::where('name', 'clientes')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'clientes')->first()->id, 'name' => 'section_2']);

        /** blog */ 
        Section::create(['page_id' => Page::where('name', 'blog')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'blog')->first()->id, 'name' => 'section_2']);
    }
}
