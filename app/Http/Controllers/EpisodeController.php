<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\AnimeEpisode;
use App\AnimeSeason;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($anime_uri, $episode_uri)
    {
        $anime = Anime::where('uri_vf', '=', $anime_uri)->orWhere('uri_vostfr', '=', $anime_uri)->first();
        if ($anime) {
            $check = Anime::where('uri_vf', '=', $anime_uri)->first();
            if ($check) {
                $current_language = 'vf';
            } else {
                $current_language = 'vostfr';
            }

            $exploded = explode('-', $episode_uri);

            if (count($exploded) === 2 || count($exploded) === 4) {

                $seasons = AnimeSeason::where('anime_id', '=', $anime->id)->orderBy('number', 'desc')->get();

                if (count($exploded) === 4) {

                    if ( $exploded[0] === 'saison' && is_numeric($exploded[1]) ) {

                         $current_season = AnimeSeason::where('number', '=', $exploded[1])->where('anime_id', '=', $anime->id)->first();
                         if ($current_season) {

                            if ($exploded[2] === 'episode' && is_numeric($exploded[3])) {

                                $current_episode = AnimeEpisode::where('number', '=', $exploded[3])
                                ->where('season_id', '=', $current_season->id)
                                ->where('anime_id', '=', $anime->id)
                                ->where('language', '=', $current_language)
                                ->first();

                                if ($current_episode && $current_episode->uri === $episode_uri) {
                                    $seasons = AnimeSeason::where('anime_id', '=', $anime->id)->orderBy('number', 'desc')->get();
                                    return view('guest.pages.anime', compact('anime', 'seasons', 'current_language', 'current_episode', 'current_season'));
                                } else {
                                    return redirect()->route('anime', $anime_uri);
                                }

                            } else {
                                return redirect()->route('anime', $anime_uri);
                            }

                         } else {
                            return redirect()->route('anime', $anime_uri);
                         }

                    } else {
                        return redirect()->route('anime', $anime_uri);
                    }

                } else {

                    $current_season = AnimeSeason::where('number', '=', 1)->where('anime_id', '=', $anime->id)->first();

                    if ($exploded[0] === 'episode' && is_numeric($exploded[1])) {

                        $current_episode = AnimeEpisode::where('number', '=', $exploded[1])
                        ->where('season_id', '=', $current_season->id)
                        ->where('anime_id', '=', $anime->id)
                        ->where('language', '=', $current_language)
                        ->first();

                        if ($current_episode && $current_episode->uri === $episode_uri) {
                            $seasons = AnimeSeason::where('anime_id', '=', $anime->id)->orderBy('number', 'desc')->get();
                            return view('guest.pages.anime', compact('anime', 'seasons', 'current_language', 'current_episode', 'current_season'));
                        } else {
                            return redirect()->route('anime', $anime_uri);
                        }

                    } else {
                        return redirect()->route('anime', $anime_uri);
                    }

                }

            } else {
                return redirect()->route('anime', $anime_uri);
            }
           
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
