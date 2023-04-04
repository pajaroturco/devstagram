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

    public function comentarios(){
        return $this->hasMany(Comentario::class)->orderBy('created_at', 'DESC');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
