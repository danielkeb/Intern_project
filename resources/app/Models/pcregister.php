<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pcregister extends Model
{
    use HasFactory;
    protected $table = 'pcregisters';
    protected $fillable=[
        "user_id",
        "username",
        "photo",
        "description",
        "pc_name",
        "serial_number"
    ];

    

     // Define the relationship with the User model
     public function user()
     {
        return $this->belongsTo(User::class,'user_id','username');

    
     }
    
} 
