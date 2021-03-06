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
                       <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit Button</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Delete Button</span>
                        </th>
                    </tr>
                </thead>
                @foreach ($meals as $meal)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-left">

                                <div class="ml-0">
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
                      
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <a type='button' class="ml-5 bg-white inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/meals/{{ $meal->id }}">Edit</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <form action="/meals/{{ $meal->id}}" method="post">
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
@if(session()->has('deleteFood'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session()->get('deleteFood') }}
    </div>
    @endif
@stop