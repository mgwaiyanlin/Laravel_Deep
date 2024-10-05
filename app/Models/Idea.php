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
        "content",
        "like",
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
