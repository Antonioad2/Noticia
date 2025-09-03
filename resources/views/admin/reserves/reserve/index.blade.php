@extends('admin.reserves.reserve.layout.principal')
@section('title', 'Duralux || Reservas')
@section('content-reserve')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Reservas</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Reservas</li>
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
                    <a href="{{ route('reserves.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Nova Reserva</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="reserveList">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Carro</th>
                                        <th>Data Início</th>
                                        <th>Data Fim</th>
                                        <th>Valor Total</th>
                                        <th>Recurso</th>
                                        <th>Status</th>
                                        <th class="text-end">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reserves as $reserve)
                                        <tr>
                                            <td>{{ $reserve->id }}</td>
                                            <td>{{ $reserve->client->name ?? 'N/A' }}</td>
                                            <td>{{ $reserve->car->brand ?? 'N/A' }} - {{ $reserve->car->model ?? '' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reserve->start_date)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reserve->end_date)->format('d/m/Y') }}</td>
                                            <td>{{ number_format($reserve->total_amount, 2, ',', '.') }} KZ</td>
                                            <td>
                                                @if($reserve->resource == 'baby_seat')
                                                    Assento de Bebê
                                                @elseif($reserve->resource == 'protected_theft')
                                                    Proteção Roubo
                                                @elseif($reserve->resource == 'protected_accidents')
                                                    Proteção Acidentes
                                                @else
                                                    Nenhum
                                                @endif
                                            </td>
                                            <td>
                                                @if($reserve->status == 'in_progress')
                                                    <span class="badge bg-warning">Em Andamento</span>
                                                @elseif($reserve->status == 'completed')
                                                    <span class="badge bg-success">Concluída</span>
                                                @else
                                                    <span class="badge bg-danger">Cancelada</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('reserves.show', $reserve->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather feather-eye"></i>
                                                    </a>
                                                    <a href="{{ route('reserves.edit', $reserve->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('reserves.destroy', $reserve->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="avatar-text avatar-md border-0 bg-transparent">
                                                            <i class="feather feather-trash-2 text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($reserves->isEmpty())
                            <div class="p-3 text-center">Nenhuma reserva cadastrada.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection
