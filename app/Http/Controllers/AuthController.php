<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Helpers\CustomResponse;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param Request $request
     * @return string message
     */
    public function signup(Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $attributes['password'] =  Hash::make($attributes['password']);
        $user = User::create(
            $attributes
        );



        $success = $user->getUserData();
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        return CustomResponse::createSuccess($success);

    }

    /**
     * Login user and create token
     *
     *
     * @return CustomResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @return CustomResponse with Error
     */
    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);


        $user = User::where('email', $attributes['email'])->first();
        abort_unless($user, CustomResponse::createError('10001') );
        abort_unless(Hash::check($attributes['password'], $user->password), CustomResponse::createError('10002') );


        $success = $user->getUserData();
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['token_type'] = 'Bearer';

        return CustomResponse::createSuccess($success);





    }

    /**
     * Logout user (Revoke the token)
     *
     * @return string message
     */
    public function logout()
    {
        request()->user()->token()->revoke();
        return CustomResponse::createSuccess('Successfully logged out');


    }

    /**
     * Get the authenticated User
     *
     * @return json user object
     */
    public function user()
    {
        return CustomResponse::createSuccess(request()->user()->getUserData());
    }
}
