@extends('layout')

@section('title')
Create Meal
@stop

@section('content')
<h3>User:</h3>
<hr>
<div>
    Name: {{ $user->name }}
</div>
<div>
    Email: {{ $user->email }}

</div>
<div>
    ID: {{ $user->id }}
</div>
<hr>
<h1>Create Meal:</h1>
<hr>
<form method="post" action='/users/{{ $user->id }}/meals'>
{{ csrf_field() }}
<input type="hidden" name="user_id" value="{{ $user->id }}" />
    <fieldset class="form-group">
        <label for="name">Meal Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Meal Name" required>
    </fieldset>
    <div class="col-sm-1">
        <button type="submit" value="submit" class="btn btn-primary">
            Submit
        </button>
    </div>
</form>
@stop
