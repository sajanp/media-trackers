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