<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'registration_number'     => $row['registration_number'],
            'first_name'    => $row['first_name'], 
            'last_name'    => $row['last_name'], 
            'parent_name'    => $row['parent_name'], 
            'email'    => $row['email'],
            'classlevel'    => $row['classlevel'],  
            'gender' => $row['gender'],
            'phone_number' => $row['phone_number'],
            //
        ]);
    }


    public function rules():array
    {
        return [
            'registration_number' => [Rule::unique(Student::class, 'registration_number')]
        ];
    }
}
