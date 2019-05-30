<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeSeason extends Model
{
	public function episodes() {
        return $this->hasMany('App\AnimeEpisode', 'season_id');
    }

    protected $table = 'animes_seasons';
}
