<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students1 extends Model
{
    use HasFactory;

    public $table = "students";
    public $incrementing = false;
    protected $keyType = 'string';
    public $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'class','picture'];

}
