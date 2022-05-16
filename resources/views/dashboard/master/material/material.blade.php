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
                <h3>Data Material</h3>
                <div>
                    <a type="button" class="btn btn-primary" href="/material/restore">Restore</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahmaterial">Add</button>    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>COMPANY</th>
                                <th>INT MATNUMBER</th>
                                <th>EXT MATNUMBER</th>
                                <th>NAME</th>
                                <th>LONG NAME</th>
                                <th>UOM</th>
                                <th>MATERIAL GROUP</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($material as $item)
                            @if($item->deleted_at == null)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->name_company }}</td>
                                <td>{{ $item->int_matnumber }}</td>
                                <td>{{ $item->ext_matnumber }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->long_name }}</td>
                                <td>{{ $item->name_uom }}</td>
                                <td>{{ $item->name_material_group }}</td>
                                <td>
                                    <a href="/material/edit/{{ $item->id }}" class="btn btn-warning">
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
        <div class="modal fade" id="tambahmaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Material</h5>
                </div>
                <div class="modal-body">
                    <form action="/material/store" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Company</label>
                            <select class="form-control" name="company_id" id="company" required>
                                <option value="">Company</option>
                                @foreach($company as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Int Matnumber</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="int_matnumber" placeholder="Int Matnumber" required onkeyup="this.value = this.value.toUpperCase();" maxlength="10">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Ext Matnumber</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="ext_matnumber" placeholder="Ext Matnumber" required onkeyup="this.value = this.value.toUpperCase();" maxlength="10">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Long Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="long_name" placeholder="Long Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">UOM</label>
                            <select class="form-control" name="uom_id" id="uom" required>
                                <option value="">UOM</option>
                                @foreach($uom as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Material Group</label>
                            <select class="form-control" name="material_group_id" id="material_group" required>
                                <option value="">Material Group</option>
                                @foreach($material_group as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                window.location = "/material/delete/"+id;
            }
        });
    });
</script>
@endsection