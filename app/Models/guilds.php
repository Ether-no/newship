<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guilds extends Model
{
    use HasFactory;
    protected $table = 'guilds';
	protected $primaryKey = 'id_guild';
    protected $fillable=['id_guild','nameguild'];
    protected $dates = ['created_at', 'updated_at'];
}
