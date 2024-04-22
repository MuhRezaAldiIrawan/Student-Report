<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $data = User::with('dosen', 'mahasiswa')->find(auth()->user()->id);

        return view('pages.user.profile', compact('data'));
    }

    public function userSetting()
    {
        $data = User::with('dosen', 'mahasiswa')->find(auth()->user()->id);

        return view('pages.user.setting', compact('data'));
    }

    public function userUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'jenis_kelamin' => 'nullable|required',
            'avatar' => 'nullable|image|file',
        ]);

        $user = User::find(auth()->id());

        if ($request->hasFile('avatar')) {
            $validatedData['avatar'] = $request->file('avatar')->store('users-avatar');
        }


        $user->update([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
        ]);

        if(auth()->user()->role == 'Dosen'){
            $user->dosen()->update([
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'avatar' => $validatedData['avatar'] ?? $user->dosen->avatar
            ]);
        } elseif(auth()->user()->role == 'Mahasiswa'){
            $user->mahasiswa()->update([
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'avatar' => $validatedData['avatar'] ?? $user->mahasiswa->avatar
            ]);
        } else {

            return redirect('/dashboard')->with('message', 'Hello Admin');
        }

        return redirect('/user-profile')->with('success', 'Profil berhasil diperbarui');
    }

}
