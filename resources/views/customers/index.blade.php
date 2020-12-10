@extends('layouts.app')
@section('content')
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif
<div class="card-body">
    <form class="form-inline" action="{{ route('customers.index') }}" method="GET">
        <select name="country_id" id="" class="form-control">
            <option value="" selected disabled>Choose country to filter:</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}" 
                @if($country->id == app('request')->input('country_id')) 
                    selected="selected" 
                @endif>{{ $country->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->country->title }}</td>
            <td>
                <form class="form-inline" action={{ route('customers.destroy', $customer->id) }} method="POST">
                    <a class="btn btn-success m-1" href={{ route('customers.edit', $customer->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger m-1" value="Delete" />
                    <a href="{{ route('customers.travel', $customer->id) }}" class="btn btn-primary m-1">Travel info</a>
                </form>

            </td>
            
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Add new</a>
    </div>
</div>
@endsection
