<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Josefo727\GeneralSettings\Models\GeneralSetting;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed URL_STORE
        GeneralSetting::create([
            'name' => 'URL_STORE',
            'value' => 'https://jose-gutierrez.com/',
            'description' => 'URL de la tienda',
            'type' => 'url'
        ]);

        // Seed CONSUMER_KEY
        GeneralSetting::create([
            'name' => 'CONSUMER_KEY',
            'value' => 'GuPHDjAB8C',
            'description' => 'Clave del consumidor',
            'type' => 'password'
        ]);

        // Seed CONSUMER_SECRET
        GeneralSetting::create([
            'name' => 'CONSUMER_SECRET',
            'value' => 'UxIgSh4KCib9LYAtdjrI',
            'description' => 'Secreto del consumidor',
            'type' => 'password'
        ]);
    }
}
