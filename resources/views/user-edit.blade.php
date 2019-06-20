@extends('master')
@section('content-header')
    <h1>
        User
        <small>Edit</small>
    </h1>
@stop
@section('content')
    <form method="POST" action="{!! route('user.update', $data['id'] ) !!}" name="editForm" accept-charset="UTF-8" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required class="form-control" id="name" name="txtName" value="{{ old('txtName', isset($data['name']) ? $data['name'] : null ) }}" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" required class="form-control" id="description" name="txtDescription" value="{{ old('txtDescription', isset($data['description']) ? $data['description'] : null ) }}">
        </div>
        <div class="form-group">
            <img width="30%" src="resources/images/userAvatar/{{ $data['avatar'] }}" alt="">
            <label class="d-block" for="avatar">choose another pic</label>
            <input type="file" required id="avatar" name="avatar">
        </div>
        <button type="submit" class="btn btn-default">Update</button>
    </form>
@endsection