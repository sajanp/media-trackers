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
        <a class="navbar-brand" href="#">Television</a>
      </div>

      <div class="collapse navbar-collapse" id="sub-nav">
        <ul class="nav navbar-nav">
          <li class="{{URLActive('tv')}}">{!! HTML::linkRoute('tv.index', 'View All') !!}</li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="{{navActive('title.create')}}">{!! HTML::linkRoute('title.create', 'Add New') !!}</li>
        </ul>
      </div>
    </div>
  </nav>
@stop