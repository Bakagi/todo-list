@extends('layouts.app')
@section('title')
    Create New Todo list
@endsection    
@section('content')
<form action="store-data" method="post" class="mt-4 p-4">
    @csrf
<div class="form-group m-3">
    <label for="name">Todo name</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group m-3">
    <label for="description">Todo description</label>
    <input class="form-control" name="description" rows="3">
</div>
<div class="form-group m-3">
    <input type="submit" class="btn btn-primary float-end" value="Submit">
</div>
</form>
@endsection