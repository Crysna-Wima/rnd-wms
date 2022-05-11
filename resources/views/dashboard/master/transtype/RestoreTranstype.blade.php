@extends('layout.base')
@section('tables')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3>Data Transtype</h3>
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
                        <th>DELETED AT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restoretranstype as $item)
                    @if($item->deleted_at != null)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->deleted_at }}</td>
                        <td>
                            <a href="/transtype/restore/{{ $item->code }}" class="btn btn-primary">
                                <i class='bx bxs-left-top-arrow-circle'></i> Restore
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
@endsection