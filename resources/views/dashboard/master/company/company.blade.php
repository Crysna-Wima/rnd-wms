@extends('layout.base')
@section('tables')
@if (session()->has('tambah'))
<div class="alert alert-success">
    <div class="container">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class='bx bx-x' style="color: rgb(1, 52, 4); font-size: large"></i></span>
        </button>
        <b><i class='bx bx-check' style="color: rgb(1, 52, 4); font-size: large"></i> Success Alert:</b> {{ session('tambah') }}
    </div>
</div>
@endif
@if (session()->has('edit'))
<div class="alert alert-success">
    <div class="container">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class='bx bx-x' style="color: rgb(1, 52, 4); font-size: large"></i></span>
        </button>
        <b><i class='bx bx-check' style="color: rgb(1, 52, 4); font-size: large"></i> Success Alert:</b> {{ session('edit') }}
    </div>
</div>
@endif
@if (session()->has('hapus'))
<div class="alert alert-success">
    <div class="container">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class='bx bx-x' style="color: rgb(1, 52, 4); font-size: large"></i></span>
        </button>
        <b><i class='bx bx-check' style="color: rgb(1, 52, 4); font-size: large"></i> Success Alert:</b> {{ session('hapus') }}
    </div>
</div>
@endif
@if (session()->has('back'))
<div class="alert alert-success">
    <div class="container">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class='bx bx-x' style="color: rgb(1, 52, 4); font-size: large"></i></span>
        </button>
        <b><i class='bx bx-check' style="color: rgb(1, 52, 4); font-size: large"></i> Success Alert:</b> {{ session('back') }}
    </div>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3>Data Company</h3>
        <div>
            <a type="button" class="btn btn-primary" href="/transtype/restore">Restore</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahTranstype">Add</button>    
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>CODE</th>
                        <th>NAME</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($company as $item)
                    @if($item->deleted_at == null)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/transtype/edit/{{ $item->code }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/transtype/delete/{{ $item->code }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
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
<div class="modal fade" id="tambahTranstype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Transtype</h5>
        </div>
        <div class="modal-body">
            <form action="/transtype/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Code</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="code" placeholder="Code" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Name" required onkeyup="this.value = this.value.toUCWords();">
                </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection