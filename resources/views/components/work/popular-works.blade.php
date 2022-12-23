@forelse(\App\Models\Work::Latest()->limit($count)->get() as $work)

<li>{{$work->title}}</li>
@empty

No Specialties Added . Add Your Specialties Here.
@endforelse