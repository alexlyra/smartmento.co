<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller {
    public function mustVerify () {
        return view('auth.verify-email');
    }

    public function verify (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('my-account.index');
    }

    public function send (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('sendMessage', 'Link de verificação de e-mail enviado!');
    }
}
