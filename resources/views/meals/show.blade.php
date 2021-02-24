@extends('layout')

@section('title')
Edit Meal
@stop

@section('content')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Meal
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Carb Total
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Protein Total
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fat total
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Calories
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $meal->name }}
                                        </div>
                                        
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $meal->carbs() }}</div>
                                <!-- <div class="text-sm text-gray-500">Optimization</div> -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">
                                    {{ $meal->protein() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="text-sm text-gray-900">
                                    {{ $meal->fats() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="text-sm text-gray-900">
                                    {{ $meal->mealCalories() }}
                                </span>
                            </td>
                        </tr>

                        <!-- More items... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div>

    
    <br>
    @if ($meal->foods->isEmpty())
    <h3 class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $meal->name }} has NO food</h3>
    @else


    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Foods in {{ $meal->name }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Carbs
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Protein
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fats
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Calories
                                </th>
                                <th scope="col" class="text-left relative px-6 py-3">
                                    <span class="sr-only">Delete Button</span>
                                </th>

                            </tr>
                        </thead>
                        @foreach ($meal->foods as $food)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $food->name }}
                                            </div>
                                            <!-- <div class="text-sm text-gray-500">
                      jane.cooper@example.com
                    </div> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $food->carbohydrates }}</div>
                                    <!-- <div class="text-sm text-gray-500">Optimization</div> -->
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900">
                                        {{ $food->protein }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span class="text-sm text-gray-900">
                                        {{ $food->fat }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span class="text-sm text-gray-900">
                                        {{ $food->calories( $food->protein,  $food->fat,  $food->carbohydrates) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <form action="/meals/{{ $meal->id}}/foods/{{ $food->id }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="ml-5 bg-white inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" formmethod="post">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- More items... -->
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('deleteFood'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session()->get('deleteFood') }}
    </div>
    @endif
    @if(session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session()->get('message') }}
    </div>
    @endif
    <br>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="ml-5 mt-5 sm:mt-5">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Add Food Information:</h3>
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
                        <div class="px-4 py-3 bg-white text-left sm:px-6">
                            <button type="submit" class=" inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    @stop
    