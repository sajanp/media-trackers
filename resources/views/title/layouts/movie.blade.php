@extends('layouts.master')

@section('body')
	<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Movies</a>
      </div>

      <div class="collapse navbar-collapse" id="sub-nav">
        <ul class="nav navbar-nav">
          <li class="{{URLActive('movie')}}">{!! HTML::linkRoute('movie.index', 'View All') !!}</li>
          <li><a href="#">On BluRay</a></li>
          <li><a href="#">On DVD</a></li>
          <li><a href="#">On Digital</a></li>
          <li><a href="#">On Ultraviolet</a></li>
          <li><a href="#">In Theaters</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="{{navActive('title.create')}}">{!! HTML::linkRoute('title.create', 'Add New') !!}</li>
          <li class="{{navActive('title.multi-create')}}">{!! HTML::linkRoute('title.multi-create', 'Multi Add') !!}</li>
        </ul>
      </div>
    </div>
  </nav>
@stop