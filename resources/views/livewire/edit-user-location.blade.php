<div>
    <form wire:submit.prevent="updateUserLocation">
        <input wire:model="latitude" class="form-control" />
        <input wire:model="longitude" class="form-control" />
        <input type="submit" value="Update User Location" />
    </form>
    <button onclick="myLocation()">Get My Location</button>
    <div id="map" wire:ignore="self">
    </div>
    <script>
        let map; //: google.maps.Map;
        let markers = [];

        function initMap() {

            const myLatLng = {
                lat: {{$latitude}},
                lng: {{$longitude}}
            };

            map = new google.maps.Map(document.getElementById("map"), {

                zoom: 15,
                // mapTypeId: "terrain",
                center: myLatLng,

            });
            map.addListener('click', function(e) {
                placeMarker(e.latLng);
            });
            // new google.maps.Marker({

            //     position: myLatLng,

            //     map,

            //     title: "Hello Rajkot!",

            // });

        }


        function placeMarker(location) {
            setMapOnAll(null);
            markers = [];
            // this.location = location;

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            // console.log(location.lat());
            @this.latitude = location.lat();
            @this.longitude = location.lng();
            markers.push(marker);

        }

        function setMapOnAll(map) {
            for (let i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        function myLocation() {
            navigator.geolocation.getCurrentPosition(function(position) {
                const crd = position.coords;
                console.log(`Latitude : ${crd.latitude}`);
                console.log(`Longitude: ${crd.longitude}`);
                console.log(`More or less ${crd.accuracy} meters.`);
                const pos = {
                    lat: crd.latitude,
                    lng: crd.longitude
                };

                map.panTo(pos);
                map.setZoom(15);
                placeMarker(pos)
                // console.log(position)
            }, function() {
                alert("LOcation Cannot be determined");
            });
        }
    </script>
    <script src="http://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
</div>
