<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    /**
     *  $guarded is the opposite of $fillable. The vars in the $guarded will not be filled.
     *  You can use either one.
     */
    // protected $guarded = [
    //     "id",
    //     "created_at"
    // ];

    protected $fillable = [
        "user_id",
        "content",
    ];

    protected $with = ['user:id,name,image','comments.user:id,name,image'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class,'idea_like')->withTimestamps();
    }
}
