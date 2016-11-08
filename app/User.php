<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    public function admin(){
        //Relation (Foreign Object, Foreign ID, Local ID)
        return $this->hasOne('App\Admin', 'user_id', 'id');
    }

    /*
    *   Returns admin role level or returns zero.
    */
    public function access(){
        if( $this->admin ){
            return $this->admin->role;
        }else{
            return 0;
        }
    }
}
