<div>
    <x-display.col col=6 title="My Works">
        @foreach ($works as $work)
            <li>{{$work->title}}</li>
        @endforeach
    </x-display.col>
    <h3>MY Works</h3>

</div>
