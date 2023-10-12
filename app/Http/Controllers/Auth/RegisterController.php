<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\hotels;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /* dd($data) ; */
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        /* check if nohp and img is null */
        if (empty($data['nohp'])) {
            $data['nohp'] = null;
        }

        if (empty($data['image'])) {
            $data['image'] = null;
        }

        $user = new User;
        $user->name = $data['name'];
        $user->nohp = $data['nohp'];
        $user->image = $data['image'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        $user->save();

        /* create hotel after create user with name 'Hotel Saya'*/
        /* dd($user); */

        $hotel = new hotels;
        $hotel->user_id = $user->id;
        $hotel->name = 'Hotel Saya';
        $hotel->address = 'Belum Diisi';
        $hotel->image = 'room-7.jpeg';
        $hotel->desc = 'Belum Diisi';

        /* dd($hotel); */
        $hotel->save();

        return $user;
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth/register', [
            'title' => "register",
        ]);
    }
}
