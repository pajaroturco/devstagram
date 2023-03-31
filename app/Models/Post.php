<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'imagen'];

    protected $table = 'posts';

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'username', 'name');
    }
}
