<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\MentorRequest;
use App\Models\System\Segments;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function mentor () {
        $segments = Segments::where('active', 1)->pluck('name', 'slug');
        return view('auth.mentor', compact('segments'));
    }

    public function mentorRegister (MentorRequest $request) {
        $input = $request->validated();
    }

    public function mentee () {

    }

    public function menteeRegister (Request $request) {

    }
}
