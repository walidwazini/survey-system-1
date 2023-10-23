<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $demoSurveys = [
            [
                "title" => "The Laracode YouTube Channel",
                "description" => "My name is Ishak. I am a full-stack web developer with 7 years expereience. I started this Youtube channel to teach about programming.",
                "slug" => "laracode-youtube",
                // "expiry_date" => "2024-01-23",
            ],
            [
                "title" => "React",
                "slug" => "react",
                "description" => "React makes it painless to create interactive UIs. Design simple views for each state in your application, and React will efficiently update and render just the right components when your data changes.",
                // "expire_date" => "2024-02-01",
            ],
            [
                "title" => "Laravel 9",
                "slug" => "laravel-9",
                "description" => "Laravel is a web application framework with expressive, elegant syntax. We\u2019ve already laid the foundation \u2014 freeing you to create without sweating the small things.",
                // "expire_date" => "2022-01-20",
            ]
        ];

        DB::table("surveys")->insert($demoSurveys);
    }
}
