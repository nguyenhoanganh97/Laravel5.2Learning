@extends('master')
@section('content-header')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<h1>
    User
    <small>Show All</small>
</h1>
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-primary text-capitalize text-center">id</th>
                <th scope="col" class="text-primary text-capitalize text-center">name</th>
                <th scope="col" class="text-primary text-capitalize text-center">status</th>
                <th scope="col" class="text-primary text-capitalize text-center">description</th>
                <th scope="col" class="text-primary text-capitalize text-center">avatar</th>
                <th scope="col" class="text-primary text-capitalize text-center">edit</th>
                <th scope="col" class="text-primary text-capitalize text-center">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $row)
            <tr>
                <td scope="row" class="text-center">{{ $row->id }}</th>
                <td class="text-center">{{ $row->name }}</td>
                <td class="text-center">{{ $row->status }}</td>
                <td class="text-center">{{ $row->description }}</td>
                <td class="text-center">
                    <img width="30%" src="resources/images/userAvatar/{{ $row->avatar }}" alt="">
                </td>
                <td class="text-center">
                    <form method="GET" action="{{ route('user.edit', $row->id) }}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-edit"></i>
                        </button>
                    </form>
                </td>
                <td class="text-center">
                    <form method="POST" action="{{ route('user.destroy', $row->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection