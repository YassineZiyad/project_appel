<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Affectation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'affectations';

    protected $fillable = [
        'tache_id',
        'user_id',
        'description',
        'etat'
    ];
    protected $dates = [
        'affected_at',
        'end_at',
        'deleted_at'
    ];
}
