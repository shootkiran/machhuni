@forelse($user->ReviewsOfMe()->Latest()->limit($count)->get() as $review)

<li>{{$review}}</li>
@empty

No Reviews Yet.
@endforelse