<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_info extends Model
{
    use HasFactory;

    protected $table = 'account_info';
    public $timestamps = false;
    protected $fillable =
        ['id', 'account', 'name', 'gender', 'birthday', 'email', 'remark'];
}
