<?php


namespace App\Http\Controllers\Users;


use App\Helpers\Response;
use App\Http\Requests\Users\UserLoginRequest;
use App\Http\Requests\Users\UserSignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        /** @var User $user */
        $user = User::query()->where('email','=',$data['email']);
        if(Hash::check($data['password'], $user->password)){
            $user->setAttribute('auth_token',$user->createToken('auth_token'));
            return response()->json($user);
        }
        return response()->json(Response::error("invalid credentials.",null,422),422);
    }
    public function signup(UserSignupRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        /** @var User $user */
        $user = User::query()->create($data);
        $auth_token = $user->createToken('auth_token');
        $user->setAttribute('auth_token', $auth_token);
        return response()->json($user);
    }
}
