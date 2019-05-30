<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\AnimeEpisode;
use App\AnimeSeason;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($anime_uri)
    {
        $anime = Anime::where('uri_vf', '=', $anime_uri)->orWhere('uri_vostfr', '=', $anime_uri)->first();
        if ($anime) {
            $check = Anime::where('uri_vf', '=', $anime_uri)->first();
            if ($check) {
                $current_language = 'vf';
                if (!$anime->has_vf) {
                    return redirect()->route('home');
                }
            } else {
                $current_language = 'vostfr';
                 if (!$anime->has_vostfr) {
                    return redirect()->route('home');
                }
            }
            $seasons = AnimeSeason::where('anime_id', '=', $anime->id)->orderBy('number', 'desc')->get();
           // $episodes = AnimeEpisode::where('anime_id', '=', $anime->id)->where('language', '=', $current_language)->get();
            return view('guest.pages.anime', compact('anime', 'seasons', 'current_language'));
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
