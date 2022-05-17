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
				<h4>Edit Movement</h4>
			</div>
			<div class="card-body">
				@foreach($movement as $item)
				<form action="/movement/update" method="post">
					{{ csrf_field() }}
					<div class="mb-3">
						<label for="formGroupExampleInput" class="form-label">Code</label>
						<input type="text" class="form-control" name="code" required="required" placeholder="code" value="{{ $item->code }}">
					</div>
					<div class="mb-3">
						<label for="formGroupExampleInput" class="form-label">Name</label>
						<input type="text" class="form-control" name="name" required="required" placeholder="code" value="{{ $item->name }}">
					</div>
                    <div class="mb-3">
						<label for="formGroupExampleInput" class="form-label">Description</label>
						<input type="text" class="form-control" name="description" placeholder="description" value="{{ $item->description }}">
					</div>
						<div class="modal-footer">
							<a href="/movement" class="btn btn-secondary">Kembali</a>
							<input type="submit" class="btn btn-success" value="Simpan Data">
						</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection