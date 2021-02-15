@extends('layout')

@section('title')
Edit Meal
@stop

@section('content')
<h4>Add Foods to {{ $meal->name }}</h4>
<hr>
<form action='/meals/{{ $meal->id }}/foods' method='POST'>
{{ csrf_field() }}
    <input type="hidden" name="meal_id" value="{{ $meal->id }}" />

    <fieldset class="field-group">
        <label for="name">Name</label>
        <textarea class="form-control" name="name" rows="1"></textarea>
    </fieldset>

    <fieldset class="field-group">
        <label for="carbohydrates">Carbohydrates</label>
        <textarea class="form-control" name="carbohydrates" rows="1"></textarea>
    </fieldset>

    <fieldset class="field-group">
        <label for="protein">Protein</label>
        <textarea class="form-control" name="protein" rows="1"></textarea>
    </fieldset>

    <fieldset class="field-group">
        <label for="fat">Fat</label>
        <textarea class="form-control" name="fat" rows="1"></textarea>
    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>

@stop