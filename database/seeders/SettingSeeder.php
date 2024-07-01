<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'name' => 'Hein Htet',
            'photo' => 'about.jpg',
            'position_array' => json_encode( ["Web Developer", "Web Designer", "Software Engineer"]), // Sample position array
            'description' => "I'm full stack developer based in Yangon, and I'm very passionate and deticated to my work.",
            'experience_year' => '2022-01-01', 
            'completed_projects' => 10,
            'about_description' => 'Full Stack Developer,I create web pages with UI/UX user interface, I have experinece and my clients are happy with projects carried out.',
            'phone' => '+959790321825',
            'email' => 'heinhtetjkrz@gmail.com',
            'messenger_link' =>'https://m.me/hein.htet.10420',
            'cv_pdf' => 'resume.pdf',
            'facebook_link' => 'https://www.facebook.com',
            'instagram_link' => 'https://www.instagram.com',
            'github_link' => 'https://github.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
