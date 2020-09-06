<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoVote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'video_id', 'user_id', 'vote'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
