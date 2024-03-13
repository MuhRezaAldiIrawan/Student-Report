<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;


class PasswordResetController extends Controller
{
    public function forgotpassword()
    {
        $title = "Forgot Password Page";
        return view('pages.auth.reset-password', compact('title'));
    }

    public function forgotpassword_action(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            toast('We have e-mailed your password reset link!', 'success')->background('#00a65a');
            return back()->with('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);

    }

    public function create()
    {

    }
}
