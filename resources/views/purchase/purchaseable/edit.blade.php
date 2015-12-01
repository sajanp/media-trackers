@extends('purchase.layouts.master')

@section('body')
	@parent
	<h2>Edit Purchase Item</h2>

	{!!Form::model($purchaseable,['method' => 'put', 'route' => ['purchase.purchaseable.update', $purchase->id, $purchaseable->id]])!!}
		<div class="form-group">
			{!!Form::label('edition', 'Edition')!!}
			{!!Form::text('edition', null, ['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('format_id', 'Format')!!}
			{!!Form::select('format_id', $formats->lists('name', 'id')->all(), null, ['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label for="isUltraviolet">
					{!!Form::checkbox('isUltraviolet', 1, ($purchaseable->ultraviolet ? true : false))!!}
					Ultraviolet
				</label>
			</div>
		</div>

		<div class="form-group">
			{!!Form::submit('Update Item', ['class' => 'btn btn-primary'])!!}
		</div>
	{!!Form::close()!!}

	{!!Form::open(['method' => 'delete', 'route' => ['purchase.purchaseable.destroy', $purchase->id, $purchaseable->id]])!!}

	{!!Form::submit('Delete Item', ['class' => 'btn btn-xs btn-danger'])!!}

	{!!Form::close()!!}
@stop
