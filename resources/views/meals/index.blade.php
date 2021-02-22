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
<h4>All Meals</h4>
<hr>

<ul class="list-group">
    @foreach ($meals as $meal)
    <li class="list-group-item">
        <a href="/meals/{{ $meal->id }}">{{ $meal->name }}</a>
        
        <span class="pull-right">
            {{ $meal->created_at->format('g:i a \o\n l, F jS') }}
        </span>
    </li>
    @endforeach
</ul>
@stop