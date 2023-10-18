@extends('layouts.dashboard')

@section('admin')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Survey') }}
    </h2>

    @include('layouts.partials.alert-prompt.alert')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.survey.update', $data_survey->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="my-2">
                                        <label for="category_id" class="col-form-label">Kategori: <span
                                                style="color: red;">*</span></label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option disabled selected>Pilih kategori survey</option>
                                            @foreach ($categori as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $data_survey->category_id) selected
                                                        @else @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="my-2">
                                        <label for="name" class="col-form-label">Nama Survey: <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" name="name" type="text" id="name"
                                            value="{{ $data_survey->name }}" placeholder="Masukkan Nama survey" required>
                                    </div>

                                    <div class="my-2">
                                        <label for="link_survey" class="col-form-label">Link Survey: <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" name="link_survey" type="text" id="link_survey"
                                            value="{{ $data_survey->link_survey }}" placeholder="Masukkan link survey"
                                            required>
                                    </div>

                                    <div class="my-2">
                                        <label for="poin" class="col-form-label">Poin Survey: <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" name="poin" type="number" id="poin"
                                            value="{{ $data_survey->poin }}" placeholder="Masukkan link survey" required>
                                    </div>

                                    <div class="my-2">
                                        <label for="location" class="col-form-label">Lokasi Survey:</label>
                                        <textarea class="form-control" name="location" id="location" placeholder="Masukkan Lokasi survey">{{ $data_survey->location }}</textarea>
                                    </div>

                                    <div class="my-2">
                                        <label for="description" class="col-form-label">Deskripsi Survey:</label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Masukkan deskripsi survey">{{ $data_survey->description }}</textarea>
                                    </div>
                                    <div>
                                        <label>The layer To Be Stored:</label>
                                        <input id="polygon" type="text" class="form-control" name="polygon"
                                            value="{{ $data_survey['polygon'] }}" readonly>
                                    </div>
                                    <div id="map" style="height: 300px;" class="mt-2"></div>

                                    <div class="text-right mt-3">
                                        <a class="btn btn-secondary"
                                            href="{{ route('dashboard.survey.index') }}">Kembali</a>
                                        <button type="submit" class="btn btn-primary bg-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                    allowIntersection: false,
                    drawError: {
                        color: 'red',
                        message: '<strong>Oh snap!<strong> you can\'t draw that!'
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

        var existingPolygon = <?php echo $data_survey->polygon; ?>;
        if (existingPolygon) {
            L.geoJSON(existingPolygon, {
                style: {
                    color: 'red',
                }
            }).addTo(drawnItems);
            $('#polygon').val(JSON.stringify(existingPolygon));
        }

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            if (type === 'polygon') {
                var name = prompt('Masukkan nama area:');

                // Tambahkan properti ke GeoJSON
                layer.feature = layer.feature || {};
                layer.feature.type = layer.feature.type || "Feature";
                layer.feature.properties = layer.feature.properties || {};
                layer.feature.properties.name = name;

                drawnItems.addLayer(layer);

                // Perbarui nilai input
                $('#polygon').val(JSON.stringify(layer.toGeoJSON()));
            }
        });
    </script>
@endsection


// map.on('draw:created', function(e) {
// var type = e.layerType,
// layer = e.layer;
// drawnItems.addLayer(layer);
// $('#polygon').val(JSON.stringify(layer.toGeoJSON()));
// });
