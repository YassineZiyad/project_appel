<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Appliction extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'applications';

    protected $fillable = [
        'reference',
        'titre',
        'etat',
        'update_at',
        'description',
        'end_at',
        'user_id'
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
