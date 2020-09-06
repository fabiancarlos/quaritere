<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'sub_title', 'director', 'details', 'kind_movie',
        'release_city', 'release_year', 'length_time_show', 'video_link',
        'video_link_kind', 'video_link_id', 'show_available_at', 'image'
    ];

    /**
     * Get the votes for the blog post.
     */
    public function votes()
    {
        return $this->hasMany('App\VideoVote');
    }
}
