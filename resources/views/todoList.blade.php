@extends('layouts.app')

@section('content')
    <ul class="mt-10">
        @foreach($list as $lists)
        
            <li>
                <form action="/complete/{{$lists->num}}" method="post">
                @csrf
                @method('PUT')
                    <div class="flex w-10/12 mx-auto mb-3 border-solid border-2 border-light-blue-300 rounded h-72">
                        <div class="flex-none w-48 relative">
                            <img src="storage/app/uploads/2021/06/boxing.jpg" alt="" class="absolute inset-0 w-full h-full object-cover"/>
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
                            @if($lists->progress_Chk == "N")
                            <div class="flex items-baseline mt-4 mb-6">
                                <div class="space-x-2 flex">
                                    <span><input class="w-5 h-5 flex items-center justify-center" name="progress" type="radio" value="1"><label class="mr-3">Excellent!</label></span>
                                    <span><input class="w-5 h-5 flex items-center justify-center" name="progress" type="radio" value="2"><label class="mr-3">Good!</label></span>
                                    <span><input class="w-5 h-5 flex items-center justify-center" name="progress" type="radio" value="3"><label class="mr-3">SoSo</label></span>
                                    <span><input class="w-5 h-5 flex items-center justify-center" name="progress" type="radio" value="4"><label class="mr-3">Not Bad</label></span>
                                    <span><input class="w-5 h-5 flex items-center justify-center" name="progress" type="radio" value="5"><label class="mr-3">Bad</label></span>
                                </div>
                            </div>
                            <div class="flex space-x-3 mb-4 text-sm font-medium">
                                <div class="flex-auto flex space-x-3">
                                    <button class="w-24 flex py-2 items-center justify-center rounded-md bg-green-400 text-white" type="submit">Complete</button>
                                    <a href="/edit/{{$lists->num}}" class="w-24 flex py-2 items-center justify-center rounded-md border border-green-500 text-green-500" >Edit</a>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500">
                                <span class="float-left">
                                    완료되면 체크해주세요
                                </span>
                                <span class="float-right">
                                    Create At : {{$lists->reg_Date}}<br/>
                                    @if($lists->mod_Date != '')Update At {{$lists->mod_Date}} @endif
                                    @if($lists->complete_Date != '')Complete At {{$lists->complete_Date}} @endif
                                </span>
                            </p>
                            @elseif($lists->progress_Chk == "F")
                            <p class="text-sm text-gray-500">
                                <span class="float-right">
                                    Create At : {{$lists->reg_Date}}<br/>
                                    @if($lists->mod_Date != '')Update At {{$lists->mod_Date}} <br /> @endif
                                    @if($lists->complete_Date != '')Complete At {{$lists->complete_Date}} @endif
                                </span>
                            </p>
                            @endif
                        </div>
                    </div>
                </form>
            </li>
        @endforeach
    </ul>
@endsection