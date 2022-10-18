<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Question::factory()->create([
            'question_text' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur?',
            'question_display_text' => 'Neque porro quisquam est,...',
            'required' => true,
            'type' => 'checkbox'
        ]);

        \App\Models\Keyword::factory()->create([
            'question_id' => 1,
            'keyword' => 'software',
        ]);

        \App\Models\Keyword::factory()->create([
            'question_id' => 1,
            'keyword' => 'nashville',
        ]);

         \App\Models\Answer::factory()->create([
            'question_id' => 1,
            'answer' => 'Answer Value A',
        ]);
         \App\Models\Answer::factory()->create([
            'question_id' => 1,
            'answer' => 'Answer Value B',
        ]);
         \App\Models\Answer::factory()->create([
            'question_id' => 1,
            'answer' => 'Answer Value C',
        ]);
         \App\Models\Answer::factory()->create([
            'question_id' => 1,
            'answer' => 'Answer Value D',
        ]);
    }
}
