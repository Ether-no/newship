<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedient extends Model
{
    use HasFactory;
    protected $table = 'expedient';
	protected $primaryKey = 'id_expedient';
    protected $fillable=['id_expedient','id_usuario','id_ship','description'];
    protected $dates = ['created_at', 'updated_at'];
}
