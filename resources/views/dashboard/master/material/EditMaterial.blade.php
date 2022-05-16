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
				<h4>Edit Material</h4>
			</div>
			<div class="card-body">
				@foreach($material as $item)
				<form action="/material/update" method="post">
					{{ csrf_field() }}
					<div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Company</label>
                        <select class="form-control" name="company_id" id="company" required>
                            <option value="{{ $item->company_id }}">{{ $item->name_company }}</option>
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
                        <input type="text" class="form-control" id="formGroupExampleInput" name="ext_matnumber" placeholder="Ext Matnumber" required onkeyup="this.value = this.value.toUpperCase();" maxlength="10" >
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
                        <a href="/materialgroup" class="btn btn-secondary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Simpan Data">
                    </div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection