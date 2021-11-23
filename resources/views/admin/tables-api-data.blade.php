@extends('layout.backend.app',[
'title' => 'Tables',
'pageTitle' => 'Tables',
])

@push('css')
<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Type</th>
                        <th>Language</th>
                        <th>Status</th>
                        <th>Runtime</th>
                        <th>Network</th>
                        <th>Official Site</th>
                        <th>Weight</th>
                        <th>Source</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Type</th>
                        <th>Language</th>
                        <th>Status</th>
                        <th>Runtime</th>
                        <th>Network</th>
                        <th>Official Site</th>
                        <th>Weight</th>
                        <th>Source</th>
                    </tr>
                </tfoot>
                <tbody id="mytable">

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
<!-- Table Api Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var myArray = []
    var used_url = 'https://api.tvmaze.com/search/shows?q=girls'
    $.ajax({
        method: 'GET',
        url: used_url,
        success: function(response) {
            myArray = response
            buildTable(myArray)
            console.log(myArray[1].show)

        }
    })

    function buildTable(myArray) {
        var table = document.getElementById('mytable')

        for (var i = 0; i < myArray.length; i++) {
            var row = `<tr>
                                <td><img src="${myArray[i].show.image.medium}" alt="gambar tidak ditemukan"></td>
                                <td>${myArray[i].show.name}</td>
                                <td>${myArray[i].score}</td>
                                <td>${myArray[i].show.type}</td>
                                <td>${myArray[i].show.language}</td>
                                <td>${myArray[i].show.status}</td>
                                <td>${myArray[i].show.runtime}</td>
                                <td>${myArray[i].show.rating.average}</td>
                                <td>${myArray[i].show.weight}</td>
                                <td>${myArray[i].show.network.name}</td>
                                <td><a href="${myArray[i].show.url}">Lihat Sumber</a></td>
                        </tr>`
            table.innerHTML += row
        }
    }
</script>
@endpush