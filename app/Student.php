<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
		 public $fillable=['id','nom','prenom','sexe','telephone','email'];
		// protected $guarded=[];
}
