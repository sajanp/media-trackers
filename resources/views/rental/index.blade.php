@extends('rental.layouts.master')

@section('body')
    <h1>Rentals</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Item</th>
            <th>Retailer</th>
            <th>Price</th>
            <th>Format</th>
            <th>Due/Expires</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rentals as $rental)
            <tr>
                <td>{!!HTML::linkRoute('rental.show', $rental->rented_on->format('l, F jS, Y'), $rental->id)!!}</td>
                <td>Item</td>
                <td>{{$rental->retailer->name}}</td>
                <td>${{$rental->price}}</td>
                <td>{{$rental->format->name}}</td>
                <td>{{$rental->expires_on->format('l, F jS, Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop