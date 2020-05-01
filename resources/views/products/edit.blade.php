@extends('layouts.main')
@section('contenido')
	<div class="container"><br>
		<div class="row">
			<div class="col-md-12">
				<div class="card-header">
					Editar producto
				</div>
				<div class="card-body">
					<form action="{{ route('products.update', $product->id) }}" method="POST">
						@method('put')
						@csrf
						<div class="form-group">
							<label for="">Codigo</label>
							<input type="text" name="code" value="{{ $product->code }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" name="name" value="{{ $product->name }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Costo</label>
							<input type="number" name="cost" value="{{ $product->cost }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Cantidad en almacen</label>
							<input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Categoria</label>
							<select class="form-control" type="text" name="category" value="{{ $product->category }}">
							    <option value = '1'>Sillas</option>
							    <option value = '2'>Mesas</option>
							    <option value = '3'>Salas</option>
							    <option value = '4'>Comedores</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Guardar</button>
						<a href=" {{ route('products.index') }}" class="btn btn-danger">Cnacelar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection