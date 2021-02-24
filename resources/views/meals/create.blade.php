@extends('layout')

@section('title')
Create Meal
@stop

@section('content')
<!-- <h3>User:</h3>
<hr>
<div>
    Name: {{ $user->name }}
</div>
<div>
    Email: {{ $user->email }}

</div> -->
<!-- <div>
    ID: {{ $user->id }}
</div> -->

<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Create a Meal:</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Enter a name for your meal then add foods to it!
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="/users/{{ $user->id }}/meals" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Meal Name</label>
                                <input type="text"  name="name" placeholder="Enter Meal Name Here" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="px-4 py-6 text-right">
                                <button type="submit" value="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create
                                </button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
<!-- <form method="post" action='/users/{{ $user->id }}/meals'>
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ $user->id }}" />
    <fieldset class="form-group">
        <label for="name">Meal Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Meal Name" required>
    </fieldset>
    <div class="col-sm-1">
        <button type="submit" value="submit" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </div>
</form> -->
@stop