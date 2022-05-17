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
				<h4>Edit Storage Bin</h4>
			</div>
			<div class="card-body">
				@foreach($storagebin as $storagebin)
				<form action="/storagebin/update" method="post">
					{{ csrf_field() }}
					<div class="form-group">
                        <label for="storage_facility_id">Name Storage Facility</label>
                        <select class="form-control" name="storage_facility_id" id="storage_facility_id">
                            <option value="">-- Pilih Storage Facility --</option>
                            @foreach($storagefacility as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Code" value="{{ $storagebin->code }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $storagebin->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>
						<div class="modal-footer">
							<a href="/storagebin" class="btn btn-secondary">Kembali</a>
							<input type="submit" class="btn btn-success" value="Simpan Data">
						</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection