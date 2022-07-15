<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function mentor () {
        return view('auth.mentor');
    }

    public function mentorRegister (Request $request) {

    }

    public function mentee () {

    }

    public function menteeRegister (Request $request) {

    }
}
