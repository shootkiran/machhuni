@extends('layouts.app')
@section('content')
    <table>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->Works as $work)
                   
                        <span class=" badge rounded-pill bg-danger">
                            {{ $work->title }}
                        </span>
                    @endforeach
                </td>
                <td>{{round($user->distance,1)}} km</td>
                <td><a href="{{ route('admin.user.edit', $user) }}">Edit icon</a></td>
            </tr>
        @endforeach
    </table>
@endsection
