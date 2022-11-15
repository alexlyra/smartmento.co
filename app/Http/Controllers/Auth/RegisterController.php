<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\MentorRequest;
use App\Models\Challenge;
use App\Models\System\Interests;
use App\Models\System\Segments;
use App\Models\User;
use App\Models\Users\CustomParameter;
use App\Models\Users\Interest;
use App\Models\Users\Role;
use App\Models\Users\Segment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller {
    public function mentor () {
        $segments = Segments::where('active', 1)->pluck('name', 'slug');
        return view('auth.mentor', compact('segments'));
    }

    public function mentorRegister (MentorRequest $request) {
        $input = $request->validated();

        if (User::where('email', $input['email'])->count() > 0) {
            return response()->json(['errors' => ['email' => 'E-mail informado já está em uso!']], 422);
        }

        $user = new User();
        $user->first_name = $input['firstName'];
        $user->last_name = $input['lastName'];
        $user->email = $input['email'];
        $user->mobile = $input['whatsapp'];
        $user->birthday = isset($input['birthday']) && $input['birthday'] ? $input['birthday'] : null;
        $user->photo = isset($input['photo']) && $input['photo'] ? $input['photo'] : null;
        $user->password = Hash::make($input['password']);
        $user->status = 'pending';
        $user->save();

        $role = new Role();
        $role->user_id = $user->id;
        $role->role_id = 2;
        $role->save();

        \UserManager::setPrice($user->id, $input);
        \UserManager::setSegmentsAndInterests($user, $input['segments']);

        if (filledWithContent($input, 'address')) {
            $address = new CustomParameter();
            $address->user_id = $user->id;
            $address->key = "mentor:address";
            $address->content = $input['address'];
            $address->save();
        }

        $challenge = new Challenge();
        $challenge->user_id = $user->id;
        $challenge->description = $input['challenge'];
        $challenge->solution = $input['solution'];
        $challenge->save();

        event(new Registered($user));
        Auth::login($user);
        if (!Auth::check()) {
            Auth::loginUsingId($user->id);
        }

        return response()->json(['message' => 'Usuário cadastrado com sucesso!']);
    }

    public function mentee () {

        $segments = Segments::where('active', 1)->pluck('name', 'slug');
        return view('auth.mentee', compact('segments'));

    }

    /*public function menteeRegister (Request $request) {


    }*/
}
