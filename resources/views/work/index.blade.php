@extends('layouts.app')
@section('content')
    <x-display.col col=12>
        <table>
            @foreach ($works as $work)
            <tr>
                <td>{{$work->title}}</td>
                <td>{{$work->Users()->count()}}</td>
            </tr>
            @endforeach
        </table>
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
