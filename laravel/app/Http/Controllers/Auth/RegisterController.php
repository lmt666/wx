<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\_Return;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = '/home';

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
        if(!isset($data['name']) || !isset($data['password'])){
            return 1;
        }

        if($data['name'] == '' || $data['password'] == ''){
            return 2;
        }

        $query = DB::table('users')->where('name', $data['name'])->get()->toArray();
        if($query){
            return 3;
        }

        if(strlen($data['password']) < 6){
            return 4;
        }
        //return Validator::make($data, [
            //'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6',
        //]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'avatar' => 'http://homestead.test/storage/avatars/default-avatar.jpg',
            'organization' => $data['organization'],
            'admin' => 1,
        ]);
    }

    protected function registered(Request $request, $user){
        $return = new _Return();
        $data = $user->toArray();
        return $return->success($data);
    }
}
