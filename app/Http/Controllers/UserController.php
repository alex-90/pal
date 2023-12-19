<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserCreateRequest;

use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    
    public function create(UserCreateRequest $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $remember = !!$request->input('remember');

        $user = User::where('login', $login)->first();

        if ($user) {
            return redirect()->route('sign-in')->withErrors('Username already exist!');
        }

        if(!$user){
            $user = new User;

            $user->login = $login;
            $user->password = Hash::make($password);
            
            $user->save();

            Auth::login($user, $remember);
            
            return redirect()->route('home');
        }        
    }



    public function login(UserAuthRequest $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $remember = !!$request->input('remember');

        $user = User::where('login', $login)->first();

        if(!$user){
            return back()->withErrors('Username incorrect!');
        }

        if (!Hash::check($password, $user->password)) {
            return back()->withErrors('Password incorrect!');
        }

        Auth::login($user, $remember);

        return redirect()->route('home');
    }

}
