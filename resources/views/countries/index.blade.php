@extends('layouts.app')
@section('content')
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif
@if($errors->any())
<h4 style="color: red">{{$errors->first()}}</h4>
@endif

<div class="card-body">
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Distance</th>
            <th>Actions</th>
        </tr>
        @foreach ($countries as $country)
        <tr>
            <td>{{ $country->title }}</td>
            <td>{{ $country->distance }}</td>
            <td>{!! $country->description !!}</td>
            <td>
                <form action={{ route('countries.destroy', $country->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('countries.edit', $country->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('countries.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
