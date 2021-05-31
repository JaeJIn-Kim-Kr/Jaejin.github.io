@extends('layouts.app')
@section('content')
    @foreach($data as $datas)
    <div class="w-9/12 m-auto pt-10">
        <div class="w-full">
            <h2 class="text-4xl text-gray-700 mb-3">View Todo List</h2>
            <div class="mb-4">
                <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                    Title
                </p>
                <span>{{ $datas -> title }}</span>
            </div>
            <div class="mb-4">
                <p class="block text-gray-500 text-sm font-bold mb-2 text-xl">
                    Content
                </p> 
                <span>{{ $datas -> content }}</span>
            </div>
            <div class="mt-20">
                <a href="/edit/{{ $datas->num }}" class="w-24 inline-block text-center py-2 items-center justify-center rounded-md border border-green-500 text-green-500" >Edit</a>
                <a href="/todoList" class="w-24 inline-block text-center py-2 items-center justify-center rounded-md bg-red-400 text-white">Back</a>
            </div>
        </div>
    </div>
    @endforeach
@endsection