<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'page_name' => 'Home',
                'slug' => 'home',
            ],
            [
                'page_name' => 'About Us',
                'slug' => 'about-us',
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                [
                    'page_name' => $pageData['page_name'],
                    'status' => 'active',
                ]
            );
        }

        $this->command->info('✅ Default pages seeded successfully!');
    }
}
