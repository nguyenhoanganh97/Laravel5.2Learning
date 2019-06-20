@extends('master')
@section('content-header')
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {!! $error !!}
        </div>
    @endforeach
@endif
<h1>
    User
    <small>Create</small>
</h1>
@stop

@section('content')
<form method="POST" action="{!! route('user.store') !!}" name="addForm" accept-charset="UTF-8"
    enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" required class="form-control" id="name" name="txtName">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="txtDescription">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" required id="avatar" name="avatar">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection