<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'sub_title'
    ];

    /**
     * Get the votes for the blog post.
     */
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
