@extends('layouts.app')

@section('content')
@livewire('search', ['user' => $user], key($user->id))

        @livewire('my-works', ['user' => request()->user()], key(request()->user()->id))

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

@endsection