@extends('layouts.app')
@section('content')
    <x-display.col col=12>
        {{-- @livewire('edit-user-location', ['user' => $user], key($user->id)) --}}

    </x-display.col>
@endsection

@push('scripts')
   
@endpush
@push('styles')
    <style type="text/css">
        #map {

            height: 400px;

        }
    </style>
@endpush
