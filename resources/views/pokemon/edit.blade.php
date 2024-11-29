@extends('layouts.base')

@section('container')
    <form action="{{ url('pokemon/'.$pokemon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$pokemon->name}}" placeholder="Name" required>
        <input type="text" name="type" value="{{$pokemon->type}}" placeholder="Type" required>
        <input type="number" name="power" value="{{$pokemon->power}}" placeholder="Power" required>

        <button type="submit" class="text-stone-50">Create Pokemon</button>
    </form>


    <form class="max-w-sm mx-auto" action="{{ url('pokemon/'.$pokemon->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" value="{{$pokemon->name}}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <input type="text" value="{{$pokemon->type}}" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="power" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Power</label>
            <input type="text" value="{{$pokemon->power}}" name="power" id="power" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="coach_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <select name="coach_id" id="coach_id">
                <option value="">Select a coach</option>
                @foreach ($coaches as $coach)
                @if ($coach->id === $pokemon->coach->id)
                    <option value="{{$coach->id}}" selected>{{$coach->name}}</option>
                @else
                    <option value="{{$coach->id}}">{{$coach->name}}</option>
                @endif
                    <option value="{{$coach->id}}">Select a coach</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Update Pokemon</button>
    </form>
@endsection


