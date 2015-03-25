@extends('title.layouts.movie')

@section('body')
	@parent
	<h1>{!! $movie->title !!}</h1>
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="{{navActive('movie.show')}}"><a href="#">Movie Info</a></li>
				<li><a href="#">Viewings</a></li>
			</ul>
			<hr>
			<p>{!! HTML::linkRoute('title.edit', 'Edit ' . $movie->name, $movie->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">
			@if($purchase)
				<div>
					<h4>Add To Open Purchase</h4>
					{!!Form::open(['route' => ['purchase.purchaseable.store', $purchase->id]])!!}
						{!!Form::hidden('purchaseable_type', 'title')!!}
						{!!Form::hidden('purchaseable_id', $movie->id)!!}
						<div class="form-group">
							{!!Form::label('format_id', 'Format')!!}
							{!!Form::select('format_id', $formats, null, ['class' => 'form-control'])!!}
						</div>
						<div class="form-group">
							{!!Form::label('edition', 'Edition')!!}
							{!!Form::text('edition', null, ['class' => 'form-control', 'placeholder' => 'Edition'])!!}
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label for="isUltraviolet">
									{!!Form::checkbox('isUltraviolet', 1, null)!!}
									Ultraviolet
								</label>
							</div>
						</div>
						<div class="form-group">
							{!!Form::submit('Add To Purchase', ['class' => 'btn btn-success btn-sm'])!!}
						</div>
					{!!Form::close()!!}
				</div>
			@endif
		</div>
	</div>
@stop