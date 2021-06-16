<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'motif',
        'confirmation',
        'user_id',
        'medecin_id'
    ];

   

   	 public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
