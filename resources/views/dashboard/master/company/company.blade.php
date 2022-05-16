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
                <h3>Data Company</h3>
                <div>
                    <a type="button" class="btn btn-primary" href="/company/restore">Restore</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahcompany">Add</button>    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CODE</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ADRESS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($company as $item)
                            @if($item->deleted_at == null)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <a href="/company/edit/{{ $item->id }}" class="btn btn-warning">
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
        <div class="modal fade" id="tambahcompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Company</h5>
                </div>
                <div class="modal-body">
                    <form action="/company/store" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Code</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="code" placeholder="Code" required onkeyup="this.value = this.value.toUpperCase();" maxlength="10">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Name" required onkeyup="this.value = this.value.toUCWords();" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Description</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="description" placeholder="Description">      
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Address</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="address" placeholder="Address">
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
                window.location = "/company/delete/"+id;
            }
        });
    });
</script>
@endsection