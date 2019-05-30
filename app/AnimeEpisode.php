<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeEpisode extends Model
{

	public function previous($current_episode) {
        return $this
        ->where('anime_id', '=', $current_episode->anime_id)
        ->where('language', '=', $current_episode->language)
        ->where('season_id', '=', $current_episode->season_id)
        ->where('number', '=', $current_episode->number - 1)
        ->first();
    }

    public function next($current_episode) {
        return $this
        ->where('anime_id', '=', $current_episode->anime_id)
        ->where('language', '=', $current_episode->language)
        ->where('season_id', '=', $current_episode->season_id)
        ->where('number', '=', $current_episode->number + 1)
        ->first();
    }

    public function season() {
        return $this->belongsTo('App\AnimeSeason')->first();
    }

    public function embed() {
    	return $this->hasMany('App\AnimeEpisodeEmbed', 'episode_id')->get();
    }

    protected $table = 'animes_episodes';
}
