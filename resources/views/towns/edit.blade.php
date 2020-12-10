@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change town info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('towns.update', $town->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Town: </label>
                            <input type="text" name="title" class="form-control" value="{{ $town->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Population: </label>
                            <input type="number" name="population" class="form-control" value="{{ $town->population }}">
                        </div>
                        <div class="form-group">
                            <label>Country: </label>
                            <select name="country_id" id="" class="form-control">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == $town->country_id) selected="selected" @endif>{{ $country->title }}</option>
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
