<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ships extends Model
{
    use HasFactory;
    protected $table = 'ships';
	protected $primaryKey = 'id_ship';
    protected $fillable=['id_ship','id_guild','nameship','idship','status'];
    protected $dates = ['created_at', 'updated_at'];
}
