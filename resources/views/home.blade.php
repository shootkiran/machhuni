@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-display.col>
            <form action="{{route('search')}}" method="get">
                <label for="keyword">Search People/Organisation For</label>
                <input name="keyword" class="mt-3 mb-3 pt-5 pb-5 text-lg form-control" placeholder="painting/plaster/tution/electrician">
            </form>
        </x-display.col>
    </div>
    <div class="row">
        <x-display.col title="My Reviews" col="4">
            <x-review.list count=5 :user="request()->user()" />
        </x-display.col>
        <x-display.col title="My Specialties" col="4">
            <x-work.user-works count=5 :user="request()->user()" />
        </x-display.col>
        <x-display.col title="Popular Works" col="4">
            <x-work.popular-works count=5 />
        </x-display.col>
    </div>
</div>
@endsection