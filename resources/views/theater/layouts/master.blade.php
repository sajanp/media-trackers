@extends('layouts.master')

@section('body')
	<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Theaters</a>
      </div>

      <div class="collapse navbar-collapse" id="sub-nav">
        <ul class="nav navbar-nav">
        	<li class="{{URLActive('theater')}}">{!! HTML::linkRoute('theater.index', 'View All') !!}</li>
			<li class="{{navActive('theater.create')}}">{!! HTML::linkRoute('theater.create', 'Add New') !!}</li>
        </ul>
      </div>
    </div>
  </nav>
@stop