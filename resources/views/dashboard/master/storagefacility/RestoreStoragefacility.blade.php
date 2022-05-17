@extends('layout.base')
@section('tables')
<!-- DataTales Example -->
<div id="content" class="mt-3">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3>Restore Data Storage Facility</h3>
                <div>
                    <a href="/storagefacility" class="btn btn-secondary" type="button">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME WAREHOUSE</th>
                                <th>CODE</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>DELETED_AT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restorestoragefacility as $item)
                            @if($item->deleted_at != null)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->name_warehouse }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->deleted_at }}</td>
                                <td>
                                    <a href="/storagefacility/restore/{{ $item->id }}" class="btn btn-primary">
                                        <i class='bx bxs-left-top-arrow-circle'></i> Restore
                                    </a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}" data-nama="{{ $item->name }}">
                                        <i class="fas fa-trash-alt"></i> Delete Permanen
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach                                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $('.delete').click(function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        swal({
            title: "Apakah Kamu Yakin?",
            text: "Kamu akan menghapus permanen data dengan nama "+nama+"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/storagefacility/deletepermanen/"+id;
            }
        });
    });
</script>
<!-- /.container-fluid -->
@endsection