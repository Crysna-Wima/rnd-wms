@extends('layout.base')
@section('tables')

<!-- DataTales Example -->
<div id="content" class="mt-3">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>
                    <i class='bx bx-error'></i>
                    Error
                </h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3>Data Warehouse</h3>
                <div>
                    <a type="button" class="btn btn-primary" href="/warehouse/restore">Restore</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahwarehouse">Add</button>    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME COMPANY</th>
                                <th>CODE</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ADDRESS</th>
                                <th>COORDINAT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warehouse as $item)
                            @if($item->deleted_at == null)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->name_company }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->coordinate }}</td>
                                <td>
                                    <a href="/warehouse/edit/{{ $item->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}" data-nama="{{ $item->name }}">
                                        <i class="fas fa-trash-alt"></i>
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
<!-- /.container-fluid -->

<!--Tambah Balita modal-->
        <div class="modal fade" id="tambahwarehouse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Warehouse</h5>
                </div>
                <div class="modal-body">
                    <form action="/warehouse/store" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="company_id">Name Company</label>
                            <select class="form-control" name="company_id" id="company_id" required>
                                <option value="">-- Pilih Name Company --</option>
                                @foreach($company as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="Code" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="coordinate">Coordinate</label>
                            <input type="text" class="form-control" name="coordinate" id="coordinate" placeholder="Coordinate">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Simpan Data">
                        </div>
                    </form>
                </div>
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
            text: "Kamu akan menghapus data dengan nama "+nama+"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/warehouse/delete/"+id;
            }
        });
    });
</script>
@endsection