@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change client info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                            <label>Last name: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $customer->surname }}"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control" value="{{ $customer->email }}"> 
                        </div>
                        <div class="form-group">
                            <label>Phone number: </label>
                            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}"> 
                        </div>
                        <div class="form-group">
                            <label>Travels  to: </label>
                            <select name="country_id" id="" class="form-control">
                                 <option value="" selected disabled>Choose country</option>
                                 @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == $customer->country_id) selected="selected" @endif>{{ $country->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
