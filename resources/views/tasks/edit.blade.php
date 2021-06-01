@extends('layouts.app')
@section('content')
    @foreach($data as $datas)
    <div class="w-9/12 m-auto pt-10">
        <div class="w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-4xl text-gray-700 mb-3">Edit Todo List</h2>
            <form action="/update/{{$datas->num}}" method="post" >
                @csrf
                @method('put')
                <div class="mb-4">
                    <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                        Title
                    </p>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" value="{{ old('title') ? old('title') : $datas->title }}">
                    @error('title')<span class="text-red-700">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                        Content
                    </p> 
                    <textarea rows="20" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="content">{{ old('content') ? old('content') : $datas->content }}</textarea>
                    @error('content')<span class="text-red-700">{{ $message }}</span>@enderror
                </div>
                <input type="submit" class="w-24 py-2 items-center justify-center rounded-md bg-green-400 text-white" value="Update">
                <a href="/todoList" class="w-24 py-2 text-center justify-center rounded-md inline-block border border-green-500 text-green-500">Back</a>
                <a href="/delete/{{$datas->num}}" class="w-24 py-2 text-center justify-center rounded-md bg-red-400 text-white" type="button">Delete</a>
            </form>
        </div>
    </div>
    @endforeach
@endsection