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
    protected $appends = ['rating_total'];
    protected $visible = ['rating_total'];
    protected $hidden = ['video_category_id'];
    public $additional_attributes = ['rating_total'];

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

    public function getRatingTotalAttribute()
    {
        $all_votes = $this->votes;
        $total_5 = 1;
        $total_4 = 1;
        $total_3 = 1;
        $total_2 = 1;
        $total_1 = 1;

        foreach ($all_votes as $data) {
            if($data->vote == 5) {
                $total_5 += $data->vote;
            }
            if($data->vote == 4) {
                $total_4 += $data->vote;
            }
            if($data->vote == 3) {
                $total_3 += $data->vote;
            }
            if($data->vote == 2) {
                $total_2 += $data->vote;
            }
            if($data->vote == 1) {
                $total_1 += $data->vote;
            }
        }

        $rating = (5 * $total_5 + 4 * $total_4 + 3 * $total_3 + 2 * $total_2 + 1 * $total_1) / ($total_5 + $total_4 + $total_3 + $total_2 + $total_1);

        return number_format((float) $rating, 2, '.', '');
    }
}
