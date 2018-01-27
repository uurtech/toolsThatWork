<!DOCTYPE html>
<html lang="en">
    <head>
    <title>{{$info['title']}} - Tools That Work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$info['description']}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/shop-item.css') }}" rel="stylesheet">
</head>
<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101420301-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-101420301-2');
</script>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">@lang("home.main")</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/">@lang("home.home")
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::TO('About')}}">@lang("home.about")</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::TO('Service')}}">@lang("home.services")</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::TO('Request')}}">@lang("home.request")</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

    <!-- Page Content -->
    <div class="container">

            <div class="row">
      
              <div class="col-lg-3">
                <h1 class="my-4">{{$info['action']}}</h1>
                <div class="list-group">
                  <a href="{{ URL::to('tool/raffle') }}" class="list-group-item">@lang("home.raffle")</a>
                  <a href="{{ URL::to('tool/passwordGenerator') }}" class="list-group-item">@lang("home.passwordGenerator")</a>
                  <a href="{{ URL::to('tool/encode') }}" class="list-group-item">@lang("home.encode")</a>
                  <a href="{{ URL::to('tool/decode') }}" class="list-group-item">@lang("home.decode")</a>
                  <a href="{{ URL::to('tool/mxEntryCheck') }}" class="list-group-item">@lang("home.mxEntryCheck")</a>
                  <a href="{{ URL::to('tool/stringOneLiner') }}" class="list-group-item">@lang("home.stringOneLiner")</a>


                </div>
              </div>

               <!-- /.col-lg-3 -->
               <div class="col-lg-9">

          
                    <div class="card card-outline-secondary my-4">
                      <div class="card-header">
                        {{$info['page']}}
                      </div>
                      <div class="card-body">
                        @yield("page")
                      </div>
                    </div>
                    <!-- /.card -->
          
                  </div>
                  <!-- /.col-lg-9 -->
          
                </div>
          
              </div>
              <!-- /.container -->
      
          
              <!-- Bootstrap core JavaScript -->
            </body>
              
              <!-- Footer -->
              <footer class="py-5 bg-dark">
                  <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; <a href="/">Tools That Work</a> By <a href="https://phpanaliz.com/" target="_blank">UK</a></p>
                  </div>
                  <!-- /.container -->
                </footer>
          </html>
          