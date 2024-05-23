<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel, WithHeadingRow
{
    private $currentDay;

    public function __construct($startDay)
    {
        $this->currentDay = $startDay;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $day = $this->currentDay++; // Get the current day and increment it for the next row

        return new Question([
            'day'       => $day,
            'author'    => $row['author'],
            'quotation' => $row['quotation'],
            'question'  => $row['question']
        ]);
    }
}
