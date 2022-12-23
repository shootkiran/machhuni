<div>
    {{ $lat }} / {{ $lng }}
    <x-display.col col=12>
        {{-- //distance($lat, $lng)->orderBy('distance', 'ASC') --}}
        @forelse ($work->Users()->where('id','!=',request()->user()->id)->Geofence($lat,$lng,0,30000)->get() as $user)
            <li class="list-group-item">
                {{ $user->name }}

                <span class=" badge rounded-pill bg-danger">
                    {{ round($user->distance, 1) }} Km
                </span>
            </li>
        @empty
            No People/Organisation Found for this work.
        @endforelse
    </x-display.col>
    <script>
        document.addEventListener('livewire:load', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    $cords = position.coords;

                    // console.log(`Latitude : ${$cords.latitude}`);
                    // @this.lat = $cords.latitude;
                    // @this.lng = $cords.longitude;
                    // @this.update();

                });

            } else {
                alert("Sorry! your browser is not supporting")
            }

        })
    </script>
</div>
