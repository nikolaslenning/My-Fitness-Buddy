@extends('layout')

@section('title')
Edit Meal
@stop

@section('content')
<div>
<h3>{{ $meal->name }} Stats</h3>
<span>Total Calories: {{ $meal->mealCalories() }}</span>
<br>
<span>Protein Total: {{ $meal->meals() }}</span>
</div>

<hr>
<h4>Add Foods to {{ $meal->name }}</h4>
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
<br>
@if ($meal->foods->isEmpty())
<h3>{{ $meal->name }} has NO food</h3>
@else
<ul class="form-group">
    @foreach ($meal->foods as $food)
    <li class="list-group-item">
        <span><b>Name: {{ $food->name }} <br> FOOD-ID: {{ $food->meal_id}} <br>meal_id: {{ $meal->id }}</b></span>
        <pre>Carbs: {{ $food->carbohydrates }}</pre>
        <pre>Protein: {{ $food->protein }}</pre>
        <pre>Fat: {{ $food->fat }}</pre>
        <pre>Calories: {{ $food->calories( $food->protein,  $food->fat,  $food->carbohydrates) }}</pre>
        <form action="/meals/{{ $meal->id}}/foods/{{ $food->id }}" method="post">
            {{ csrf_field() }}

            <!-- For mockup; not yet functional. 
                 If you're interested in getting this to work, 
                 look into Laravel's Events. -->
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger" formmethod="post">
                Delete
            </button>
        </form>
    </li>
    @endforeach
</ul>
@endif

@stop