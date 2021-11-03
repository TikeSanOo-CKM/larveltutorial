<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   // protected $guarded = []; or you can use
	
	protected $fillable = [
        'name',
        'slug',
        'email'
       ];
   
       public function getRouteKeyName()
       {
           return 'slug';
       }
}
