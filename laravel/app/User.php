<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'OpenID', 'Name', 'Avatar', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_token',
    ];

    public $timestamps = false;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function add($data){
        $token = str_random(64);

        $user = new User([
            'OpenID' => $data['openId'],
            'Name' => $data['nickName'],
            'Avatar' => $data['avatarUrl'],
            'api_token' => $token
        ]);
        $user->save();

        return $token;
    }

    public function renew($data){
        $user = new User();
        $token = str_random(64);

        $user->where('OpenID', $data)->update(['api_token' => $token]);

        return $token;
    }
   
}
