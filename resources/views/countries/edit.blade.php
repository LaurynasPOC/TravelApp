@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change country info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('countries.update', $country->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $country->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Distance to country</label>
                            <input type="text" name="distance" class="form-control" value="{{ $country->distance }}">
                        </div>
                        <div class="form-group">
                            <label for="">Country description</label>
                            <textarea id="mce" type="text" name="description" rows=10 cols=100 class="form-control">{{ $country->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
