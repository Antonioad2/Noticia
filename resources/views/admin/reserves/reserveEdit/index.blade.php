@extends('admin.reserves.reserveEdit.layout.principal')
@section('title', 'Duralux || Editar Reserva')
@section('content-reserveEdit')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Editar Reserva</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reserves.index') }}">Reservas</a></li>
                <li class="breadcrumb-item">Editar</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Voltar</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="{{ route('reserves.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" form="reserveForm" class="btn btn-primary">Atualizar Reserva</button>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <form id="reserveForm" action="{{ route('reserves.update', $reserve->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <!-- Client -->
                                <div class="col-md-6 mb-3">
                                    <label for="client_id" class="form-label">Cliente <span class="text-danger">*</span></label>
                                    <select name="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                                        <option value="" disabled>Selecione um cliente</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{ old('client_id', $reserve->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Car -->
                                <div class="col-md-6 mb-3">
                                    <label for="car_id" class="form-label">Carro <span class="text-danger">*</span></label>
                                    <select name="car_id" class="form-control @error('car_id') is-invalid @enderror" required>
                                        <option value="" disabled>Selecione um carro</option>
                                        @foreach ($cars as $car)
                                            <option value="{{ $car->id }}" {{ old('car_id', $reserve->car_id) == $car->id ? 'selected' : '' }}>{{ $car->name ?? 'Carro ' . $car->id }}</option>
                                        @endforeach
                                    </select>
                                    @error('car_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-6 mb-3">
                                    <label for="start_date" class="form-label">Data de Início <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                           value="{{ old('start_date', $reserve->start_date) }}" min="{{ now()->format('Y-m-d') }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="col-md-6 mb-3">
                                    <label for="end_date" class="form-label">Data de Término <span class="text-danger">*</span></label>
                                    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                           value="{{ old('end_date', $reserve->end_date) }}" min="{{ now()->format('Y-m-d') }}" required>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Total Amount -->
                                <div class="col-md-6 mb-3">
                                    <label for="total_amount" class="form-label">Valor Total <span class="text-danger">*</span></label>
                                    <input type="number" name="total_amount" class="form-control @error('total_amount') is-invalid @enderror"
                                           value="{{ old('total_amount', $reserve->total_amount) }}" step="0.01" min="0" required>
                                    @error('total_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Resource -->
                                <div class="col-md-6 mb-3">
                                    <label for="resource" class="form-label">Recurso</label>
                                    <select name="resource" class="form-control @error('resource') is-invalid @enderror">
                                        <option value="" {{ old('resource', $reserve->resource) == '' ? 'selected' : '' }}>Nenhum</option>
                                        <option value="baby_seat" {{ old('resource', $reserve->resource) == 'baby_seat' ? 'selected' : '' }}>Cadeira de Bebê</option>
                                        <option value="protected_theft" {{ old('resource', $reserve->resource) == 'protected_theft' ? 'selected' : '' }}>Proteção contra Roubo</option>
                                        <option value="protected_accidents" {{ old('resource', $reserve->resource) == 'protected_accidents' ? 'selected' : '' }}>Proteção contra Acidentes</option>
                                    </select>
                                    @error('resource')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="in_progress" {{ old('status', $reserve->status) == 'in_progress' ? 'selected' : '' }}>Em Progresso</option>
                                        <option value="completed" {{ old('status', $reserve->status) == 'completed' ? 'selected' : '' }}>Concluído</option>
                                        <option value="cancelled" {{ old('status', $reserve->status) == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <a href="{{ route('reserves.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Atualizar Reserva</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection