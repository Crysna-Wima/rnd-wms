@extends('layout.base')
@section('tables')
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
		<div class="card shadow">
			<div class="card-header py-3 d-flex justify-content-between">
				<h4>Edit Warehouse</h4>
			</div>
			<div class="card-body">
				@foreach($warehouse as $warehouse)
				<form action="/warehouse/update" method="post">
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
                        <input type="text" class="form-control" name="code" id="code" placeholder="Code" required value="{{ $warehouse->code }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{ $warehouse->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ $warehouse->description }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ $warehouse->address }}">
                    </div>
                    <div class="form-group">
                        <label for="coordinate">Coordinate</label>
                        <input type="text" class="form-control" name="coordinate" id="coordinate" placeholder="Coordinate" value="{{ $warehouse->coordinate }}">
                    </div>
                    <div class="modal-footer">
                        <a href="/warehousegroup" class="btn btn-secondary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Simpan Data">
                    </div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection