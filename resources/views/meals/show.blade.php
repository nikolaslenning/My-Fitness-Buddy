@extends('layout')

@section('title')
Edit Meal
@stop

@section('content')
<div>
<h3>{{ $meal->name }} Stats</h3>
<span>Total Calories: {{ $meal->mealCalories() }}</span>
<br>
<span>Protein Total: {{ $meal->protein() }}</span>
<br>
<span>Carb Total: {{ $meal->carbs() }}</span>
<br>
<span>Fat Total: {{ $meal->fats() }}</span>
</div>

<hr>
<h4>Add Foods to {{ $meal->name }}</h4>
<form action='/meals/{{ $meal->id }}/foods' method='POST'>
    {{ csrf_field() }}
    <input type="hidden" name="meal_id" value="{{ $meal->id }}" />

    <fieldset class="field-group">
        <label for="name">Name</label>
        <textarea type='text' class="form-control" name="name" rows="1" required></textarea>
    </fieldset>

    <fieldset class="field-group">
        <label for="carbohydrates">Carbohydrates</label>
        <textarea type='number' class="form-control" name="carbohydrates" rows="1" required></textarea>
    </fieldset>

    <fieldset class="field-group">
        <label for="protein">Protein</label>
        <textarea type='number' class="form-control" name="protein" rows="1" required></textarea>
    </fieldset>

    <fieldset class="field-group">
        <label for="fat">Fat</label>
        <textarea type='number' class="form-control" name="fat" rows="1" required></textarea>
    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
@if ($meal->foods->isEmpty())
<h3>{{ $meal->name }} has NO food</h3>
@else
<ul class="form-group">
    @foreach ($meal->foods as $food)
    <li class="list-group-item">
        <span><b>Food: {{ $food->name }} <br></b></span>
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