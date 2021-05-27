@extends('layouts.app')

@section('content')
    <ul>
        @foreach($list as $lists)
            <li>
                <div class="flex w-10/12 mx-auto mb-3 border-solid border-2 border-light-blue-300 ">
                    <div class="flex-none w-48 relative">
                        <img src="/classic-utility-jacket.jpg" alt="" class="absolute inset-0 w-full h-full object-cover"/>
                    </div>
                    <form class="flex-auto p-6">
                        <div class="flex flex-wrap">
                            <h1 class="flex-auto text-xl font-semibold">
                                {{$lists->title}}
                            </h1>
                            <div class="text-xl font-semibold text-gray-500">
                                {{$lists->user_id}}
                            </div>
                            <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
                                {{$lists->content}}
                            </div>
                        </div>
                        <div class="flex items-baseline mt-4 mb-6">
                            <div class="space-x-2 flex">
                                <label>
                                    <input class="w-9 h-9 flex items-center justify-center bg-gray-100 rounded-lg" name="size" type="radio" value="xs" checked="checked">
                                        Excellent!
                                </label>
                                <label>
                                    <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="s">
                                    Good!
                                </label>
                                <label>
                                    <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="m">
                                    SoSo
                                </label>
                                <label>
                                    <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="l">
                                    Not Bad
                                </label>
                                <label>
                                    <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="xl">
                                    Bad
                                </label>
                            </div>
                        </div>
                        <div class="flex space-x-3 mb-4 text-sm font-medium">
                            <div class="flex-auto flex space-x-3">
                                <button class="w-1/12 flex py-2 items-center justify-center rounded-md bg-green-400 text-white" type="submit">Save</button>
                                <button class="w-1/12 flex py-2 items-center justify-center rounded-md bg-red-400 text-white" type="button">Delete</button>
                                <button class="w-1/12 flex py-2 items-center justify-center rounded-md border border-green-500 text-green-500" type="button">Edit</button>
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
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection