@extends('layout')

@section('title')
Meal Index
@stop

@hasSection('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @yield('header')
    </div>
</header>
@endif

@section('content')
<h2 class="text-center">All Meals</h2>
<hr>
<br>

<!-- <ul class="list-group">
    @foreach ($meals as $meal)
    <li class="list-group-item">
        <a href="/meals/{{ $meal->id }}">Edit</a>
        <div class="inline-block">
            <div> {{ $meal->name }}</div>
            
            <div class="pull-right">
               Created: {{ $meal->created_at->format('g:i a \o\n l, F jS') }}
            </div>

        </div>
    </li>
    <br>
    
    @endforeach
</ul> -->

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
                            Calories
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created
                        </th>
                        <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
              </th> -->
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                @foreach ($meals as $meal)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $meal->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">

                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $meal->mealCalories() }}</div>
                            <div class="text-sm text-gray-500"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $meal->created_at->format('g:i a \o\n l, F jS') }}
                        </td>
                        <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Admin
              </td> -->
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a type='button' class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/meals/{{ $meal->id }}">Edit</a>
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
@stop