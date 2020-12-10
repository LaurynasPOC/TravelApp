@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Client and travel info</div>
    <div class="card-body">
        <h5>Client: {{ $customer->name }} {{$customer->surname}}</h5>
        <h5>Phone number: {{ $customer->phone }}</h5>
        <h5>Email: {{ $customer->email }}</h5>
        <hr>
        <h5>Visited country:  {{ $customer->country->title }}</h5>
        <h5>Visited towns: </h5>
        <table class="table">
            <tr>
                <th>Name of the town</th>
                <th>Population</th>
            </tr>
            @foreach ($customer->country->towns as $town)
            <tr>
                <th>{{ $town->title }}</th>
                <th>{{ $town->population }}</th>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
