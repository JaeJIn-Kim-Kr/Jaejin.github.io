@extends('layouts.app')
@section('content')

    <div class="w-9/12 m-auto pt-10">
        <div class="w-full">
            <h2 class="text-4xl text-gray-700 mb-3">Create New Todo List</h2>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/create_todoList" method="post" >
                @csrf
                <div class="mb-4">
                    <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                        Title
                    </p>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" value="{{ old('title') }}">
                    @error('title')<span class="text-red-700">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                        Content
                    </p> 
                    <textarea rows="15" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="content">{{ old('content') }}</textarea>
                    @error('content')<span class="text-red-700">{{ $message }}</span>@enderror
                </div>
                <input type="submit" class="bg-green-500 hover:bg-green-400 text-white px-3 py-1" value="Create">
                <a href="/todoList" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1">Back</a>
            </form>
        </div>
    </div>
@endsection