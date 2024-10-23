@extends('layout.dashboard')
@section('title_page_web', 'Cliente')
@section('title_view', 'Cliente Create')

@section('content')

    <div class="mb-4">
        <a href="{{ route('cliente.index') }}" class="btn" style="background: #96CEB4;"><i class="fas fa-arrow-left"></i>
            Regresar</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card pt-2 pb-5 px-4">
                <form action="{{ route('cliente.store') }}" method="POST">
                    @csrf
                    <div class="container mt-4">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="dni">DNI:</label>
                                <input type="text" id="dni" name="dni" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-12">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4 col-12">
                                <label for="ap_paterno">Ap. Paterno:</label>
                                <input type="text" id="ap_paterno" name="ap_paterno" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4 col-12">
                                <label for="ap_materno">Ap. Materno:</label>
                                <input type="text" id="ap_materno" name="ap_materno" class="form-control" required>
                            </div>

                            <div class="form-group col-md-3 col-12">
                                <label for="telefono">Telefono:</label>
                                <input type="text" id="telefono" name="telefono" class="form-control" required>
                            </div>

                            <div class="form-group col-md-9 col-12">
                                <label for="dirrecion">Direccion:</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" required>
                            </div>
    
                        </div>
                        <button type="submit" class="btn" style="background: #96CEB4;"><i class="fas fa-save"></i>
                            Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
