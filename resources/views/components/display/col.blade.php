<div class="{{isset($col)?'col-md-'.$col:'col'}}">
    @isset($title) <div class="card-header">{{$title}}</div>@endisset

    <div class="card-body">
        {{$slot}}
    </div>
</div>