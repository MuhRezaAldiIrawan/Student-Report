<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ImportUser implements ToModel,WithHeadingRow
{
    use Importable;

    public $error = null;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = Validator::make($row, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required|min:3',
        ])->validate();

        try {
            return new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'gender' => $data['gender'],
                'role' => $data['role'],
                'password' => Hash::make($data['password']),
            ]);
        } catch (QueryException $e) {
            $this->error = $e->getMessage();
            return null;
        }

    }

}
