@extends('layouts.app')
@section('content')

    <div class="w-9/12 m-auto pt-10">
        <div class="w-full">
            <h2 class="text-4xl text-gray-700 mb-3">Create New Todo List</h2>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/create_todoList" method="post" enctype="multipart/form-data" >
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
                <div class="mb-4">
                    <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                        File Upload
                    </p>
                    <input type="File" name="task_File">
                </div>
                <input type="submit" class="w-24 py-2 items-center justify-center rounded-md bg-green-400 text-white" value="Create">
                <a href="/todoList" class="w-24 py-2 inline-block text-center justify-center rounded-md bg-red-400 text-white">Back</a>
            </form>
            @if ($errors)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
@endsection