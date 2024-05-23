<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotations = [
            [
                'day' => 1,
                'author' => 'John Doe',
                'quotation' => 'Success is not final, failure is not fatal: It is the courage to continue that counts.',
                'question' => 'What motivates you to keep going even after facing failures?'
            ],
            [
                'day' => 2,
                'author' => 'Jane Smith',
                'quotation' => 'The only way to do great work is to love what you do.',
                'question' => 'How do you find passion in your work?'
            ],
            [
                'day' => 3,
                'author' => 'Albert Einstein',
                'quotation' => 'Imagination is more important than knowledge.',
                'question' => 'How do you encourage creative thinking in your team?'
            ],
            [
                'day' => 4,
                'author' => 'Maya Angelou',
                'quotation' => 'I`ve learned that people will forget what you said, people will forget what you did, but people will never forget how you made them feel.',
                'question' => 'What is the most important lesson you have learned about human interaction?'
            ],
            [
                'day' => 5,
                'author' => 'Steve Jobs',
                'quotation' => 'Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work.',
                'question' => 'What advice would you give to someone starting their career?'
            ],
            [
                'day' => 6,
                'author' => 'Elon Musk',
                'quotation' => 'When something is important enough, you do it even if the odds are not in your favor.',
                'question' => 'How do you tackle difficult challenges in your projects?'
            ],
            [
                'day' => 7,
                'author' => 'Oprah Winfrey',
                'quotation' => 'The biggest adventure you can take is to live the life of your dreams.',
                'question' => 'What inspires you to pursue your dreams?'
            ],
            [
                'day' => 8,
                'author' => 'Nelson Mandela',
                'quotation' => 'Education is the most powerful weapon which you can use to change the world.',
                'question' => 'What role do you think education plays in society?'
            ],
            [
                'day' => 9,
                'author' => 'Mark Twain',
                'quotation' => 'The secret of getting ahead is getting started.',
                'question' => 'How do you overcome procrastination and start working on your goals?'
            ]
        ];

        $questions = Question::orderBy('day', 'asc')->get();
        $lastQuestion = $questions->last();

        $startDay = 0;

        if ($lastQuestion==null) {
            $startDay = 1;
        } else {
            $startDay = $lastQuestion->day + 1;
        }

        foreach ($quotations as $data) {
            Question::create([
                'author' => $data['author'],
                'quotation' => $data['quotation'],
                'question' => $data['question'],
                'day' => $startDay
            ]);
            $startDay++;
        }
    }
}
