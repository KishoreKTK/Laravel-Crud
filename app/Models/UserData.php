<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    public $table = 'UserData';
    protected $fillable = [
        'email', 'uname', 'password', 'gender', 'bday','job_type', 'experiane', 
        'languages', 'img_path', 'describe','t&c'
    ];
}
