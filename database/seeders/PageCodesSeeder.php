<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageCode;

class PageCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['page_number' => 2, 'code' => "Lesson"],
            ['page_number' => 3, 'code' => "Poetry"],
            ['page_number' => 4, 'code' => "Winter"],
            ['page_number' => 5, 'code' => "Christmas"],
            ['page_number' => 6, 'code' => "March"],
            ['page_number' => 7, 'code' => "Hope"],
            ['page_number' => 8, 'code' => "Policy"],
        ];
        PageCode::insert($data);
    }
}
