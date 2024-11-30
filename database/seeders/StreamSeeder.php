<?php

namespace Database\Seeders;

use App\Models\Stream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $streams = [
            ['title' => 'Arts & Humanities', 'description' => null],
            ['title' => 'Business & Management', 'description' => null],
            ['title' => 'Engineering & Technology', 'description' => null],
            ['title' => 'Life Sciences & Medicine', 'description' => null],
            ['title' => 'Natural Sciences', 'description' => null],
            ['title' => 'Social Sciences & Management', 'description' => null],
            ['title' => 'Computer Science & IT', 'description' => null],
            ['title' => 'Law', 'description' => null],
            ['title' => 'Education & Training', 'description' => null],
            ['title' => 'Creative Arts & Design', 'description' => null],
            ['title' => 'Applied Sciences & Professions', 'description' => null],
            ['title' => 'Agriculture & Forestry', 'description' => null],
            ['title' => 'Environmental Studies & Earth Sciences', 'description' => null],
            ['title' => 'Hospitality, Leisure & Sports', 'description' => null],
            ['title' => 'Journalism & Media', 'description' => null],
            ['title' => 'General Studies & Classics', 'description' => null],
            ['title' => 'Health & Medicine', 'description' => null],
            ['title' => 'Performing Arts', 'description' => null],
            ['title' => 'Physical Sciences & Mathematics', 'description' => null],
            ['title' => 'Psychology & Counseling', 'description' => null],
            ['title' => 'Fashion & Beauty', 'description' => null],
            ['title' => 'Veterinary Medicine', 'description' => null],
            ['title' => 'Religious Studies & Theology', 'description' => null],
            ['title' => 'Philosophy & Ethics', 'description' => null],
            ['title' => 'Languages & Literature', 'description' => null],
            ['title' => 'Culinary Arts', 'description' => null],
            ['title' => 'Anthropology', 'description' => null],
            ['title' => 'Archaeology', 'description' => null],
            ['title' => 'History', 'description' => null],
            ['title' => 'Political Science & International Relations', 'description' => null],
            ['title' => 'Sociology', 'description' => null],
            ['title' => 'Economics', 'description' => null],
            ['title' => 'Urban Planning & Architecture', 'description' => null],
            ['title' => 'Music', 'description' => null],
            ['title' => 'Film, Television & Theater', 'description' => null],
            ['title' => 'Graphic Design & Visual Arts', 'description' => null],

            // Add more streams as needed
            // ['title' => 'Science', 'description' => null],
            // ['title' => 'Commerce', 'description' => null],
            // ['title' => 'Arts', 'description' => null],
        ];


        foreach ($streams as $stream) {
            Stream::updateOrCreate(
                ['title' => $stream['title']],
                ['description' => $stream['description']]
            );
        }
    }
}
