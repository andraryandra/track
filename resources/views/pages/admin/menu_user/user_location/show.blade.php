@extends('layouts.dashboard')


@section('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <h2>Detail Lokasi User</h2>
                    </div>
                    <hr class="bordered">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <strong>Name:</strong>
                                {{ $lokasi->user->name }}
                            </div>
                            <div class="form-group mb-2">
                                <strong>Latitude:</strong>
                                {{ $lokasi->latitude }}
                            </div>
                            <div class="form-group mb-2">
                                <strong>Longitude:</strong>
                                {{ $lokasi->longitude }}
                            </div>
                            <div class="form-group mb-2">
                                <strong>Lokasi:</strong>
                                {{ $lokasi->address }}
                            </div>
                        </div>
                        <div class="col-6">
                            <h5><strong>Lokasi Survey Terdekat</strong></h5>
                            <span class="badge rounded-pill text-bg-info mb-3" style="padding: 5px 10px; font-size: 16px;">
                                <strong id="nearestSurveyName"></strong>
                            </span>
                            <div class="form-group mb-2">
                                <strong>Total Survey:</strong>
                                {{ $total_survey }}
                            </div>
                        </div>
                        <hr class="bordered">
                        <div class="text-center">
                            <h3>Lokasi Pengguna</h3>
                            <div id="map" style="height: 300px;" class="mt-2"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.user_location.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var latitude = {{ $lokasi->latitude }};
        var longitude = {{ $lokasi->longitude }};
        var map = L.map('map').setView([latitude, longitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

        L.marker([latitude, longitude]).addTo(map);

        // Initialize the variable to store the nearest survey name
        var nearestSurveyName = null;

        // Loop through survey data and add polygon for each survey
        @foreach ($survey as $data_survey)
            var surveyData = {!! $data_survey->polygon !!};
            var surveyName = "{{ $data_survey->name }}";

            var surveyPolygon = L.geoJSON(surveyData, {
                style: {
                    fillColor: 'red',
                    weight: 2,
                    opacity: 1,
                    color: 'red',
                    fillOpacity: 0.2
                }
            }).addTo(map);

            // Check if user is inside the polygon
            var isInside = surveyPolygon.getBounds().contains([latitude, longitude]);

            if (isInside) {
                nearestSurveyName = surveyName;
            }
        @endforeach

        // Update the HTML element with the nearest survey name
        if (nearestSurveyName) {
            document.getElementById('nearestSurveyName').innerHTML = nearestSurveyName;
        }
    </script>
@endsection
