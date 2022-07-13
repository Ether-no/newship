<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    use HasFactory;
    protected $table = 'access';
	protected $primaryKey = 'id_access';
    protected $fillable=['id_access','id_usuario','ip'];
    protected $dates = ['created_at', 'updated_at'];
}
