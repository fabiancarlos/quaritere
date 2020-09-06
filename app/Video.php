<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

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
        'video_link_kind', 'video_link_id', 'show_available_at', 'show_end_at',
        'image', 'video_category_id'
    ];

    /**
     * Get the votes for the blog pogoryst.
     */
    public function votes()
    {
        return $this->hasMany('App\VideoVote');
    }

    /**
     * Get the user that owns the phone.
     */
    public function video_category()
    {
        return $this->belongsTo('App\VideoCategory');
    }

    public function is_video_available()
    {
        $current_date = new DateTime();

        if (is_null($this->show_available_at)) {
            return null;
        }
        if (is_null($this->show_end_at)) {
            return null;
        }

        $available = new DateTime($this->show_available_at);
        $end = new DateTime($this->show_end_at);

        return $available <= $current_date && $end >= $current_date;
    }
}
