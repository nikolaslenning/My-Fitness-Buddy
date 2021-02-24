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
<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Food Information:</h3>
        <p class="mt-1 text-sm text-gray-600">
          Add a food to {{ $meal->name }}.
        </p>
      </div>
    </div>
    <br>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="/meals/{{ $meal->id }}/foods" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="meal_id" value="{{ $meal->id }}" />
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="name" class=" text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <br>

              <!-- <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div> -->

              <div class="col-span-6 sm:col-span-3 ">
                <label for="carbohydrates" class="block text-sm font-medium text-gray-700">Carbohydrates</label>
                <input type="text" name="carbohydrates" id="carbohydrates" autocomplete="carbohydrates" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              
              <br>
              <div class="col-span-6 sm:col-span-3 ">
                <label for="protein" class="block text-sm font-medium text-gray-700">Protein</label>
                <input type="text" name="protein" id="protein" autocomplete="protein" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              
              <br>
              <div class="col-span-6 sm:col-span-3 ">
                <label for="fat" class="block text-sm font-medium text-gray-700">Fats</label>
                <input type="text" name="fat" id="fat" autocomplete="fat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
            <button type="submit" class=" inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<hr>
<!-- <h4>Add Foods in {{ $meal->name }}</h4>
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

    <button type="submit" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
</form> -->
<!-- <br> -->
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

            <button type="submit" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" formmethod="post">
                Delete
            </button>
        </form>
    </li>
    @endforeach
</ul>
@endif

@stop