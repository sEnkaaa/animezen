@extends('guest.layout')

@section('content')

<div class="row">
  <div class="col-lg-12" style="overflow-x: auto">
    <div class="page-header">
      <center>
        <h1 class="mb-3">List des Animes VF / VOSTFR</h1>
        <ul class="pagination pagination-sm" style="display: inline-flex;">
          <li class="page-item {{ isset($filter) ? '' : 'active' }}">
            <a class="page-link" href="{{ route('animeList') }}">Tout</a>
          </li>

          @php
          $letter = 'a'
          @endphp
          @for ($i = 0; $i < 26; $i++)
          <li class="page-item {{ isset($filter) && $filter === $letter ? 'active' : '' }}">
            <a class="page-link" href="{{ route('animeListFilter', $letter) }}">{{ strtoupper($letter) }}</a>
          </li>
          @php
          $letter++
          @endphp
          @endfor
          
          <li class="page-item {{ isset($filter) && $filter === 'autres' ? 'active' : '' }}">
            <a class="page-link" href="{{ route('animeListFilter', 'autres') }}">Autres</a>
          </li>
        </ul>
      </center>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="jumbotron">

            @if (isset($filter) && $filter >= 'a' && $filter <= 'z')
            <h2 class="mb-3">Liste des Animes commençant par {{ strtoupper($filter) }}</h2>
            @else
            <h2 class="mb-3">Liste des Animes</h2>
            @endif

            @if ($animes->count() > 0)
            @foreach($animes as $anime)
            <div class="card border-info">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <a href="{{ route('anime', $anime->uri_vostfr) }}"><img src="/img/thumbnails/{{ $anime->thumbnail }}" class="img-responsive" width="100%"></a>
                  </div>
                  <div class="col-md-9">
                    <div class="row">
                      <div class="col-md-9">
                        <a href="{{ route('anime', $anime->uri_vostfr) }}"><h3 class="card-title">{{ $anime->name }}</h3></a>
                      </div>
                      <div class="col-md-3">
                        @if ($anime->has_vostfr && $anime->has_vf)
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                          <a href="{{ route('anime', $anime->uri_vf) }}" class="btn btn-sm btn-outline-info">VF</a>
                          <a href="{{ route('anime', $anime->uri_vostfr) }}" class="btn btn-sm btn-outline-info">VOSTFR</a>
                        </div>
                        @elseif ($anime->has_vf)
                        <a href="{{ route('anime', $anime->uri_vf) }}" class="btn btn-sm btn-outline-info float-right">VF</a>
                        @else
                        <a href="{{ route('anime', $anime->uri_vostfr) }}" class="btn btn-sm btn-outline-info float-right">VOSTFR</a>
                        @endif
                      </div>
                    </div>
                    <p class="card-text">{{ $anime->synopsis }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p>Il n'y a pas d'animes commençant par cette lettre.</p>
            @endif
            
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection