@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-display.col>
            <form action="{{route('search')}}" method="get">
                <label for="keyword">Search People/Organisation For</label>
                <input value="{{request()->keyword}}" name="keyword" class="mt-3 mb-3 pt-5 pb-5 text-lg form-control" placeholder="painting/plaster/tution/electrician">
            </form>
        </x-display.col>
    </div>
    <div class="row justify-content-center">
        <x-display.col title="Search Results for {{request()->keyword}}">
            @forelse($works as $work)
            <ul>
                <li> People/Organisation For {{$work->title}}</li>
                @forelse($work->nearbyUsers() as $user)
                <ol>
                    <li> {{$user->name}} <span class="badge badge-success">{{$user->email}}</li>
                </ol>
                @empty

            </ul>



            @endforelse
            @empty
            No People Or Organisation Found
            @endforelse
        </x-display.col>
    </div>
</div>
@endsection