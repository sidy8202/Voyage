<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
protected $fillable =  ['piece' ,'nom_passager' ,'prenom_passager' ,'telephone' ,'classe','vols_id' ];

}