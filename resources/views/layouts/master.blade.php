<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Library</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Media Tracker</a>
      </div>

      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav">
          <li class="{{URLActive('retailer*')}}">{!!HTML::linkRoute('retailer.index', 'Retailers')!!}</li>
          <li class="{{URLActive('theater*')}}">{!!HTML::linkRoute('theater.index', 'Theaters')!!}</li>
          <li class="{{URLActive('subscription*')}}">{!!HTML::linkRoute('subscription.index', 'Subscriptions')!!}</li>
          <li class="{{URLActive('movie*')}}">{!!HTML::linkRoute('movie.index', 'Movies')!!}</li>
          <li class="{{URLActive('tv*')}}">{!!HTML::linkRoute('tv.index', 'TV')!!}</li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    @yield('body')
  </div>
</body>
</html>