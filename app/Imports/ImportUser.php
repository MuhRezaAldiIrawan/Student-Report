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
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:3',
        ])->validate();


        $detailDosen = Validator::make($row, [
            'nidn' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'prodi' => 'required',
            'jurusan' => 'required',
        ])->validate();


        try {
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => Hash::make($data['password']),
            ]);

            $user->dosen()->create([
                'nidn' => $detailDosen['nidn'],
                'alamat' => $detailDosen['alamat'],
                'jenis_kelamin' => $detailDosen['jenis_kelamin'],
                'prodi' => $detailDosen['prodi'],
                'jurusan' => $detailDosen['jurusan'],
            ]);

            return $user;

        } catch (QueryException $e) {
            $this->error = $e->getMessage();
            return null;
        }

    }


}
