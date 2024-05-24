<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'last_name' => $row['last_name'],
            'email'    => $row['email'],
            'phone'    => $row['phone'],
            'password' => bcrypt('user123'),
            'type'     => 'user',
            'page_number' => '0',
        ]);
    }
}
