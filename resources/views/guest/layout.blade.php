
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AnimeZEN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="/css/custom.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand"><img src="/img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('animeList') }}">Animes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://blog.bootswatch.com">Films</a>
            </li>
          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <input type="text" placeholder="Rechercher un anime" class="form-control form-control-sm is-valid">
            </li>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">
      @yield('content')
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/custom.js"></script>
    <script id="cid0020000219317140732" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 200px;height: 300px;">{"handle":"animezenco","arch":"js","styles":{"a":"5bc0de","b":100,"c":"000000","d":"000000","k":"5bc0de","l":"5bc0de","m":"5bc0de","p":"10","q":"5bc0de","r":100,"pos":"br","cv":1,"cvfntw":"bold","cvbg":"5bc0de","cvw":75,"cvh":30}}</script>
  </body>
</html>
