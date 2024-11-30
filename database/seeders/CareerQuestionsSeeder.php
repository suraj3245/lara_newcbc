<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questions = [
            ['id' => 1, 'questionText' => 'Spray trees to prevent the spread of harmful insects', 'type' => 'R'],
            ['id' => 2, 'questionText' => 'Study the population growth of a city', 'type' => 'I'],
            ['id' => 3, 'questionText' => 'Play a musical instrument', 'type' => 'A'],
            ['id' => 4, 'questionText' => 'Teach a high school class', 'type' => 'S'],
            ['id' => 5, 'questionText' => 'Give a presentation of a product you are selling', 'type' => 'E'],
            ['id' => 6, 'questionText' => 'Organize and schedule office meetings', 'type' => 'C'],
            ['id' => 7, 'questionText' => 'Test the quality of parts before shipment', 'type' => 'R'],
            ['id' => 8, 'questionText' => 'Do laboratory tests to identify diseases', 'type' => 'I'],
            ['id' => 9, 'questionText' => 'Draw a picture', 'type' => 'A'],
            ['id' => 10, 'questionText' => 'Teach children how to play sports', 'type' => 'S'],
            ['id' => 11, 'questionText' => 'Sell equipment in a store', 'type' => 'E'],
            ['id' => 12, 'questionText' => 'Load computer software into a large computer network', 'type' => 'C'],
            ['id' => 13, 'questionText' => 'Set up and operate machines to make products', 'type' => 'R'],
            ['id' => 14, 'questionText' => 'Develop a way to predict the weather better', 'type' => 'I'],
            ['id' => 15, 'questionText' => 'Create special effects for movies', 'type' => 'A'],
            ['id' => 16, 'questionText' => 'Teach an individual an exercise routine', 'type' => 'S'],
            ['id' => 17, 'questionText' => 'Start your own business', 'type' => 'E'],
            ['id' => 18, 'questionText' => 'Calculate the wages of employees', 'type' => 'C'],
            ['id' => 19, 'questionText' => 'Drive a truck to deliver packages to offices and homes', 'type' => 'R'],
            ['id' => 20, 'questionText' => 'Conduct chemical experiments', 'type' => 'I'],
            ['id' => 21, 'questionText' => 'Write a song', 'type' => 'A'],
            ['id' => 22, 'questionText' => 'Perform nursing duties in a hospital', 'type' => 'S'],
            ['id' => 23, 'questionText' => 'Manage the operations of a hotel', 'type' => 'E'],
            ['id' => 24, 'questionText' => 'Take notes during a meeting', 'type' => 'C'],
            ['id' => 25, 'questionText' => 'Repair household appliances', 'type' => 'R'],
            ['id' => 26, 'questionText' => 'Study space travel', 'type' => 'I'],
            ['id' => 27, 'questionText' => 'Write scripts for movies or television shows', 'type' => 'A'],
            ['id' => 28, 'questionText' => 'Take care of children at a day-care center', 'type' => 'S'],
            ['id' => 29, 'questionText' => 'Manage a department within a large company', 'type' => 'E'],
            ['id' => 30, 'questionText' => 'Enter information into a database', 'type' => 'C'],
            ['id' => 31, 'questionText' => 'Indulge fishing as an activity', 'type' => 'R'],
            ['id' => 32, 'questionText' => 'Study the movement of planets', 'type' => 'I'],
            ['id' => 33, 'questionText' => 'Write books or plays', 'type' => 'A'],
            ['id' => 34, 'questionText' => 'Help people with personal and emotional problems', 'type' => 'S'],
            ['id' => 35, 'questionText' => 'Buy and sell land', 'type' => 'E'],
            ['id' => 36, 'questionText' => 'Handle customers bank transactions', 'type' => 'C'],
            ['id' => 37, 'questionText' => 'Drive a taxi cab', 'type' => 'R'],
            ['id' => 38, 'questionText' => 'Compute and record statistical and other numerical data', 'type' => 'I'],
            ['id' => 39, 'questionText' => 'Audition singers and musicians for a music show', 'type' => 'A'],
            ['id' => 40, 'questionText' => 'Help elderly people with daily activities', 'type' => 'S'],
            ['id' => 41, 'questionText' => 'Market a new line of clothing', 'type' => 'E'],
            ['id' => 42, 'questionText' => 'Keep records for financial transactions for an organization', 'type' => 'C'],
            ['id' => 43, 'questionText' => 'Assemble products in a factory', 'type' => 'R'],
            ['id' => 44, 'questionText' => 'Investigate crimes', 'type' => 'I'],
            ['id' => 45, 'questionText' => 'Perform comedy routines in front of an audience', 'type' => 'A'],
            ['id' => 46, 'questionText' => 'Give career guidance to people', 'type' => 'S'],
            ['id' => 47, 'questionText' => 'Negotiate business contracts', 'type' => 'E'],
            ['id' => 48, 'questionText' => 'Keep shipping and receiving records', 'type' => 'C'],
            ['id' => 49, 'questionText' => 'Assemble electronics parts', 'type' => 'R'],
            ['id' => 50, 'questionText' => 'Study ways to reduce water pollution', 'type' => 'I'],
            ['id' => 51, 'questionText' => 'Edit movies', 'type' => 'A'],
            ['id' => 52, 'questionText' => 'Teach sign language to people with hearing disabilities', 'type' => 'S'],
            ['id' => 53, 'questionText' => 'Sell automobiles', 'type' => 'E'],
            ['id' => 54, 'questionText' => 'Maintain network hardware and software', 'type' => 'C'],
            ['id' => 55, 'questionText' => 'Investigate the cause of a fire', 'type' => 'R'],
            ['id' => 56, 'questionText' => 'Develop a new medicine', 'type' => 'I'],
            ['id' => 57, 'questionText' => 'Act in a play', 'type' => 'A'],
            ['id' => 58, 'questionText' => 'Provide physical therapy to people recovering from an injury', 'type' => 'S'],
            ['id' => 59, 'questionText' => 'Manage a supermarket', 'type' => 'E'],
            ['id' => 60, 'questionText' => 'Maintain employee records', 'type' => 'C']
        ];


        $now = Carbon::now();

        foreach ($questions as $question) {
            $existingQuestion = DB::table('career_questions')
                ->where('id', $question['id'])
                ->first();

            if ($existingQuestion) {
                // The question exists, check if it's different and update if necessary
                if ($existingQuestion->question !== $question['questionText']) {
                    DB::table('career_questions')
                        ->where('id', $question['id'])
                        ->update([
                            'question' => $question['questionText'],
                            'type' => $question['type'], // Use the type directly from the array
                            'updated_at' => $now,
                        ]);
                }
            } else {
                // The question does not exist, insert a new record
                DB::table('career_questions')->insert([
                    'question' => $question['questionText'],
                    'type' => $question['type'], // Use the type directly from the array
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
