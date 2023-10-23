<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  $table->id();
            $table->unsignedInteger('survey_id')->nullable();
            $table->integer('order')->nullable();
            $table->text('question_text')->nullable();
            $table->boolean('isMandatory')->default(false);
     */
    public function run(): void
    {
        $demoQuestions = [
            [
                "id"=> 1,
                "survey_id" => 1,
                "order" => 1,
                "question_text"=> "Which country are you from ?",
                "isMandatory"=> true,
            ],
            [
                "id"=> 2,
                "survey_id" => 1,
                "order" => 2,
                "question_text"=> "Which language videos do you want to see on my channel?",
                "isMandatory"=> true,
            ],
            [
                "id"=> 3,
                "survey_id" => 3,
                "order" => 1,
                "question_text"=> "Which Laravel Framework do you love most?",
                "isMandatory"=> true,
            ],
            [
                "id"=> 4,
                "survey_id" => 3,
                "order" => 2,
                "question_text"=> "Can you specify what the version of framework that you used?",
                "isMandatory"=> false,
            ],
        ];

        DB::table("questions")->insert($demoQuestions);
    }
}
