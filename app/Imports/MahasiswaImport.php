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


class MahasiswaImport implements ToModel
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


        $detailMahasiswa = Validator::make($row, [
            'nim' => 'required',
            'kelas' => 'required',
            'prodi' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ])->validate();


        try {
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => Hash::make($data['password']),
            ]);

            $user->mahasiswa()->create([
                'nim' => $detailMahasiswa['nim'],
                'kelas' => $detailMahasiswa['kelas'],
                'prodi' => $detailMahasiswa['prodi'],
                'jurusan' => $detailMahasiswa['jurusan'],
                'angkatan' => $detailMahasiswa['angkatan'],
                'alamat' => $detailMahasiswa['alamat'],
                'jenis_kelamin' => $detailMahasiswa['jenis_kelamin'],
            ]);

            return $user;

        } catch (QueryException $e) {
            $this->error = $e->getMessage();
            return null;
        }

    }


}
