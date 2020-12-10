@extends('layouts.app')
@section('content')
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif
<div class="card-body">
    <table class="table">
        <tr>
            <th>Town</th>
            <th>Population</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
        @foreach ($towns as $town)
        <tr>
            <td>{{ $town->title }}</td>
            <td>{{ $town->population }}</td>
            <td>{{ $town->country->title }}</td>
            <td>
                <form action={{ route('towns.destroy', $town->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('towns.edit', $town->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('towns.create') }}" class="btn btn-success">Add new</a>
    </div>
</div>
@endsection
