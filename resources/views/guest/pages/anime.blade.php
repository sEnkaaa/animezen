@extends('guest.layout')

@section('content')

<div class="row">
	<div class="col-md-12">
        
        <div class="card mb-3">
        <div class="card-body">
          @if ($current_language === 'vostfr')
          <a href="{{ route('anime', $anime->uri_vostfr) }}"><img class="img-responsive" width="100%" src="/img/covers/{{ $anime->cover }}"></a>
          @elseif ($current_language === 'vf')
          <a href="{{ route('anime', $anime->uri_vf) }}"><img class="img-responsive" width="100%" src="/img/covers/{{ $anime->cover }}"></a>
          @endif
        </div>
    	</div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		@if ($current_language === 'vostfr' && $anime->has_vf)
		<a href="{{ route('anime', $anime->uri_vf) }}" class="btn btn-block btn-outline-secondary mb-3"><i class="fas fa-eye"></i> Accéder à la VF</a>
		@elseif ($current_language === 'vf' && $anime->has_vostfr)
		<a href="{{ route('anime', $anime->uri_vostfr) }}" class="btn btn-block btn-outline-secondary mb-3"><i class="fas fa-eye"></i> Accéder à la VOSTFR</a>
		@endif
	</div>
</div>

<div class="row">

    <div class="col-md-9">
        <div class="card mb-3">
        	<div class="card-body">
          		<center><h1 class="mb-3 text-info" style="font-size: 1.1rem">{{ $anime->name }} - {{ isset($current_episode) ? ($anime->display_season ? 'Saison ' . $current_season->number . ' -' : '') : '' }} {{ isset($current_episode) ? 'Épisode ' . $current_episode->number : '' }} {{ strtoupper($current_language) }}</h1></center>
          		<div class="jumbotron" style="overflow-x: auto">
                  @if (isset($current_episode))
                  <center>
                  @if ($current_episode->embed()->count() == 0)
                  <p class="text-muted">Il n'y a pas de vidéo disponible pour cet épisode. @if($current_language == 'vf') {{ 'Essayez la VOSTFR.' }} @endif</p>
                  <img src="/img/cry.jpg" class="img-responsive" width="100%">
                  @endif
                  @foreach($current_episode->embed() as $embed)
                  <iframe src="{{ $embed->link }}" width="800" height="500" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                  @endforeach
                  </center>
                  @else
                	<p class="lead">Synopsis</p>
                	<p>{{ $anime->synopsis }}</p>
                  <p class="lead">Saisons : {{ $seasons->count() }}</p>
                  <p class="lead">Date de sortie : {{ $anime->release_date }}</p>
                  <p class="lead">Statut : {{ $anime->status }}</p>
                  @endif
            	</div>
              @if (isset($current_episode))
              @if ($current_language === 'vostfr')
                @if ($current_episode->previous($current_episode) && $current_episode->next($current_episode))
                <div class="row">
                  <div class="col-md-6">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vostfr, 'episode_uri' => $current_episode->previous($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3">{{ $anime->display_season ? 'Saison ' . $current_episode->previous($current_episode)->season()->number : '' }} Épisode {{ $current_episode->previous($current_episode)->number }} {{ strtoupper($current_language) }} <i class="fas fa-arrow-left"></i></a>
                  </div>
                  <div class="col-md-6">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vostfr, 'episode_uri' => $current_episode->next($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3"><i class="fas fa-arrow-right"></i>{{ $anime->display_season ? 'Saison ' . $current_episode->next($current_episode)->season()->number : '' }} Épisode {{ $current_episode->next($current_episode)->number }} {{ strtoupper($current_language) }}</a>
                  </div>
                </div>
                @elseif ($current_episode->previous($current_episode))
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vostfr, 'episode_uri' => $current_episode->previous($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3">{{ $anime->display_season ? 'Saison ' . $current_episode->previous($current_episode)->season()->number : '' }} Épisode {{ $current_episode->previous($current_episode)->number }} {{ strtoupper($current_language) }} <i class="fas fa-arrow-left"></i></a>
                  </div> 
                </div>
                @elseif ($current_episode->next($current_episode))
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vostfr, 'episode_uri' => $current_episode->next($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3"><i class="fas fa-arrow-right"></i>{{ $anime->display_season ? 'Saison ' . $current_episode->next($current_episode)->season()->number : '' }} Épisode {{ $current_episode->next($current_episode)->number }} {{ strtoupper($current_language) }}</a>
                  </div> 
                </div>
                @endif
              @else
                @if ($current_episode->previous($current_episode) && $current_episode->next($current_episode))
                <div class="row">
                  <div class="col-md-6">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vf, 'episode_uri' => $current_episode->previous($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3">{{ $anime->display_season ? 'Saison ' . $current_episode->previous($current_episode)->season()->number : '' }} Épisode {{ $current_episode->previous($current_episode)->number }} {{ strtoupper($current_language) }} <i class="fas fa-arrow-left"></i></a>
                  </div>
                  <div class="col-md-6">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vf, 'episode_uri' => $current_episode->next($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3"><i class="fas fa-arrow-right"></i>{{ $anime->display_season ? 'Saison ' . $current_episode->next($current_episode)->season()->number : '' }} Épisode {{ $current_episode->next($current_episode)->number }} {{ strtoupper($current_language) }}</a>
                  </div>
                </div>
                @elseif ($current_episode->previous($current_episode))
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vf, 'episode_uri' => $current_episode->previous($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3">{{ $anime->display_season ? 'Saison ' . $current_episode->previous($current_episode)->season()->number : '' }} Épisode {{ $current_episode->previous($current_episode)->number }} {{ strtoupper($current_language) }} <i class="fas fa-arrow-left"></i></a>
                  </div> 
                </div>
                @elseif ($current_episode->next($current_episode))
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vf, 'episode_uri' => $current_episode->next($current_episode)->uri]) }}" class="btn btn-block btn-outline-info mt-3"><i class="fas fa-arrow-right"></i>{{ $anime->display_season ? 'Saison ' . $current_episode->next($current_episode)->season()->number : '' }} Épisode {{ $current_episode->next($current_episode)->number }} {{ strtoupper($current_language) }}</a>
                  </div> 
                </div>
                @endif
              @endif
              @endif
        	</div>
      	</div>
    </div>

     <div class="col-md-3">
        <div class="card mb-3" style="max-width: 20rem;">
        <div class="card-body">
          @foreach ($seasons as $season)
            @if ($anime->display_season)
            <center><strong><p class="text-info mb-3">Saison {{ $season->number }}</p></strong></center>
            @endif            
            <div class="bs-component">
                <div class="list-group">
                  @foreach ($season->episodes()->where('language', '=', $current_language)->get() as $episode)
                  @if ($current_language === 'vostfr')
                  <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vostfr, 'episode_uri' => $episode->uri]) }}" class="list-group-item list-group-item-action {{ (isset($current_episode) && $current_episode->number == $episode->number && isset($current_season) && $current_season->number == $season->number) ? 'active' : '' }}">Episode {{ $episode->number }} <span class="float-right badge badge-light" style="font-size: 100%">{{ strtoupper($current_language) }}</span></a>
                  @else
                  <a href="{{ route('animeEpisode', ['anime_uri' => $anime->uri_vf, 'episode_uri' => $episode->uri]) }}" class="list-group-item list-group-item-action {{ (isset($current_episode) && $current_episode->number == $episode->number && isset($current_season) && $current_season->number == $season->number) ? 'active' : '' }}">Episode {{ $episode->number }} <span class="float-right badge badge-light" style="font-size: 100%">{{ strtoupper($current_language) }}</span></a>
                  @endif
                  @endforeach
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>

</div>

@endsection