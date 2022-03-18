<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Ad extends Model 
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'description',
        'location',
        'price',
        'picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'remember_token',
       
    ];

 
}
