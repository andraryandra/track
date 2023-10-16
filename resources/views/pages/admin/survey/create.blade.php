@extends('layouts.dashboard')

@section('admin')
    @can('survey-create')
        <div class="row my-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create Survey</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('dashboard.survey.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @include('layouts.partials.alert-prompt.alert')


        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.survey.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="my-2">
                            <label for="category_id" class="col-form-label">Kategori: <span style="color: red;">*</span></label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option disabled selected>Pilih kategori survey</option>
                                @foreach ($categori as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="my-2">
                            <label for="name" class="col-form-label">Nama Survey: <span style="color: red;">*</span></label>
                            <input class="form-control" name="name" type="text" id="name" value="{{ old('name') }}"
                                placeholder="Masukkan Nama survey" required>
                        </div>

                        <div class="my-2">
                            <label for="link_survey" class="col-form-label">Link Survey: <span
                                    style="color: red;">*</span></label>
                            <input class="form-control" name="link_survey" type="text" id="link_survey"
                                value="{{ old('link_survey') }}" placeholder="Masukkan link survey" required>
                        </div>

                        <div class="my-2">
                            <label for="description" class="col-form-label">Deskripsi Survey:</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Masukkan deskripsi survey">{{ old('description') }}</textarea>
                        </div>
                        <div class="my-2">
                            <label for="polygon" class="">The layer To Be Stored:</label>
                            <input id="polygon" type="text" class="form-control" name="polygon"
                                value="{{ request('polygon') }}" readonly>
                        </div>

                        <div id="map" style="height: 300px;" class="mt-2"></div>
                    </div>
                    <div class="text-right mt-3">
                        <a class="btn btn-secondary" href="{{ route('dashboard.survey.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary bg-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />

        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <script>
            var center = [-6.2088, 106.8456];

            var map = L.map('map').setView(center, 10);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: 18
            }).addTo(map);

            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            var drawControl = new L.Control.Draw({
                position: 'topright',
                draw: {
                    polyline: false,
                    polygon: {
                        allowIntersection: false, // Restricts shapes to simple polygons
                        drawError: {
                            color: 'red',
                            message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                        },
                        shapeOptions: {
                            color: 'red'
                        }
                    },
                    circle: {
                        shapeOptions: {
                            color: 'red'
                        }
                    },
                    rectangle: false,

                    circlemarker: false,
                },
                edit: {
                    featureGroup: drawnItems
                }
            });

            map.addControl(drawControl);
            map.on('draw:created', function(e) {
                var type = e.layerType,
                    layer = e.layer;

                // Menampilkan popup dan meminta pengguna untuk memasukkan nama
                var name = prompt("Masukkan nama daerah:");

                // Menambahkan properti 'name' ke dalam GeoJSON
                var geoJSON = layer.toGeoJSON();
                geoJSON.properties.name = name;

                drawnItems.addLayer(layer);
                $('#polygon').val(JSON.stringify(geoJSON));
            });
        </script>
    @endcan

@endsection
