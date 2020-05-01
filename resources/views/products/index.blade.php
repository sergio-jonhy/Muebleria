@extends('layouts.main')
@section('contenido')
	<div class="container"><br>
		<div class="row">
			<div class="col-md-12">
				<div class="card-header">
					Lista de roductos
					<a href=" {{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
				</div>
				<div class="card-body">
					@if(session('info'))
						<div class="alert alert-success">
							{{ session('info') }}
						</div>
					@endif
					<table class="table table-hover table-sm">
						<thead>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Costo</th>
							<th>Stock</th>
							<th>Categoia</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<td>
									{{ $product -> code }}
								</td>
								<td>
									{{ $product -> name }}
								</td>
								<td>
									{{ $product -> cost }}
								</td>
								<td>
									{{ $product -> stock }}
								</td>
								<td>
									{{ $product -> category_id }}
								</td>
								<td>
									<a href="javascript: document.getElementById('delete-{{  $product->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
									<form id="delete-{{  $product->id }}" action="{{ route('products.delete', $product->id) }}" method="POST">
										@method('delete')
										@csrf
									</form>
									<a href="{{ route('products.edit', $product->id)  }}" class="btn btn-info btn-sm">Editar</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection