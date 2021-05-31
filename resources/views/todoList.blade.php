@extends('layouts.app')



@section('content')
    <ul class="mt-10">
        @foreach($list as $lists)
            <li>
                <div class="flex w-10/12 mx-auto mb-3 border-solid border-2 border-light-blue-300 rounded">
                    <div class="flex-none w-48 relative">
                        <img src="https://placeimg.com/192/303/any/grayscale" alt="" class="absolute inset-0 w-full h-full object-cover"/>
                    </div>
                    <div class="flex-auto p-6">
                        <div class="flex flex-wrap">
                            <h3 class="flex-auto text-xl font-semibold">
                                <a href="/tasks/view/{{$lists->num}}">{{$lists->title}}</a>
                            </h3>
                            <div class="text-xl font-semibold text-gray-500">
                                {{$lists->user_id}}
                            </div>
                            <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
                                {{$lists->content}}
                            </div>
                        </div>
                        <div class="flex items-baseline mt-4 mb-6">
                            <div class="space-x-2 flex">
                                <span><input class="w-5 h-5 flex items-center justify-center bg-gray-100 rounded-lg" name="size" type="radio" value="xs"><label class="mr-3">Excellent!</label></span>
                                <span><input class="w-5 h-5 flex items-center justify-center" name="size" type="radio" value="s"><label class="mr-3">Good!</label></span>
                                <span><input class="w-5 h-5 flex items-center justify-center" name="size" type="radio" value="m"><label class="mr-3">SoSo</label></span>
                                <span><input class="w-5 h-5 flex items-center justify-center" name="size" type="radio" value="l"><label class="mr-3">Not Bad</label></span>
                                <span><input class="w-5 h-5 flex items-center justify-center" name="size" type="radio" value="xl"><label class="mr-3">Bad</label></span>
                            </div>
                        </div>
                        <div class="flex space-x-3 mb-4 text-sm font-medium">
                            <div class="flex-auto flex space-x-3">
                                
                                <button class="w-24 flex py-2 items-center justify-center rounded-md bg-green-400 text-white" type="submit">Complete</button>
                                <form action="/delete/{{$lists->num}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-24 flex py-2 items-center justify-center rounded-md bg-red-400 text-white" type="button">Delete</button>
                                </form>
                                <a href="/edit/{{$lists->num}}" class="w-24 flex py-2 items-center justify-center rounded-md border border-green-500 text-green-500" >Edit</a>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">
                            <span class="float-left">
                                완료되면 체크해주세요
                            </span>
                            <span class="float-right">
                                Create At {{$lists->created_at}}<br/>
                                Update At {{$lists->updated_at}}
                            </span>
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection