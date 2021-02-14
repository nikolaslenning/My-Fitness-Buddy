@extends('layout')

@section('title')
Meal Index
@stop

@section('content')
<h4>All Meals</h4>
<hr>

<ul class="list-group">
    @foreach ($meals as $meal)
    <li class="list-group-item">
        <a href="/meals/{{ $meal->id }}">{{ $meal->name }}</a>
        <span class="pull-right">
            {{ $meal->created_at->format('g:ia \o\n l, F jS') }}
        </span>
    </li>
    @endforeach
</ul>
@stop