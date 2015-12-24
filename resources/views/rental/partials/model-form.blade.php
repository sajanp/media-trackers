{!!Form::model($rental, ['route' => $formDestination, 'method' => $formMethod])!!}

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('retailer_id', 'Retailer')!!}
            {!! Form::select('retailer_id', $retailers, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price')!!}
            {!! Form::text('price', null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('format_id', 'Format')!!}
            {!! Form::select('format_id', $formats, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('rented_on', 'Rented On') !!}
            {!!Form::text('rented_on', null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('expires_on', 'Expires On') !!}
            {!!Form::text('expires_on', null, ['class' => 'form-control'])!!}
        </div>
    </div>
</div>

<hr>
<div class="form-group">
    {!!Form::submit($formSubmit, ['class' => 'btn btn-success'])!!}
</div>

{!!Form::close()!!}

<script>
    $(function() {
        $("#rented_on").datepicker({ dateFormat: "yy-mm-dd" });
        $("#expires_on").datepicker({ dateFormat: "yy-mm-dd" });
    });
</script>