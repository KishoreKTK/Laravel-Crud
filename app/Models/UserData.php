<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserData extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'UserData';
    protected $fillable = [
        'email', 'uname', 'password', 'gender', 'bday','job_type', 'experiane', 
        'languages', 'img_path', 'describe','t&c'
    ];

    protected $dates = ['deleted_at'];
}
