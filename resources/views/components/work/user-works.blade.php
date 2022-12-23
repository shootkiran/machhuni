@forelse($user->Works()->Latest()->limit($count)->get() as $speciality)

<li>{{$speciality->title}}</li>
@empty

No Specialties Added . Add Your Specialties Here.
@endforelse