<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'documents';

    protected $fillable = [
        'reference',
        'titre',
        'etat',
        'fichier',
        'type',
        'update_at',
        'description',
        'tache_id',
        'appel_id'
    ];
    protected $dates = ['deleted_at'];
}
