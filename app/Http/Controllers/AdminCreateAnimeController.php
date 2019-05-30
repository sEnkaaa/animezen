<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminCreateAnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.animeCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $anime = new Anime;
        $anime->name = $input['name'];
        $anime->japanese_name = $input['japanese_name'];
        $anime->synopsis = $input['synopsis'];
        $anime->status = $input['status'];
        $anime->release_date = $input['release_date'];

        $base_uri = preg_replace('/[[:space:]]+/', '-', trim( strtolower($input['name']) ));
        $uri_vf = $base_uri . '-vf';
        $uri_vostfr = $base_uri . '-vostfr';

        $anime->uri_vf = $uri_vf;
        $anime->uri_vostfr = $uri_vostfr;

        $anime->has_vostfr = 1;
        if (isset($input['has_vf'])) {
            $anime->has_vf = 1;
        }

        if (!isset($input['display_season'])) {
            $anime->display_season = 0;
        }

        $thumbnail = $base_uri . '-' . Str::random(32) . '.' . $input['thumbnail']->extension();
        $anime->thumbnail = $thumbnail;
        Storage::disk('local')->put('img/thumbnails/' . $thumbnail, file_get_contents($input['thumbnail']->getRealPath()));
        $cover = $base_uri . '-' . Str::random(32) . '.' . $input['cover']->extension();
        $anime->cover = $cover;
        Storage::disk('local')->put('img/covers/' . $cover, file_get_contents($input['cover']->getRealPath()));
        $anime->save();

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
