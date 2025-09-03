<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Reserve;
use App\Model\Client;
use App\Model\Car;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Listar todas as reservas
     */
    public function index()
    {
        $reserves = Reserve::with(['client', 'car'])->latest()->get();
        return view('admin.reserves.reserve.index', compact('reserves'));
    }

    /**
     * Mostrar formulário para criar reserva
     */
    public function create()
    {
        $clients = Client::all();
        $cars = Car::all();
        return view('admin.reserves.reserveCreate.index', compact('clients', 'cars'));
    }

    /**
     * Salvar uma nova reserva
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'car_id'      => 'required|exists:cars,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'total_amount'=> 'required|numeric|min:0',
            'resource'    => 'nullable|in:baby_seat,protected_theft,protected_accidents',
        ]);

        Reserve::create($request->all());

        return redirect()->route('reserves.index')->with('success', 'Reserva criada com sucesso!');
    }

    /**
     * Mostrar detalhes de uma reserva
     */
    public function show($id)
    {
        $reserve = Reserve::with(['client', 'car'])->findOrFail($id);
        return view('admin.reserves.reserveView.index', compact('reserve'));
    }

    /**
     * Mostrar formulário para editar reserva
     */
    public function edit($id)
    {
        $reserve = Reserve::findOrFail($id);
        $clients = Client::all();
        $cars = Car::all();
        return view('admin.reserves.reseveEdit.index', compact('reserve', 'clients', 'cars'));
    }

    /**
     * Atualizar reserva
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'car_id'      => 'required|exists:cars,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'total_amount'=> 'required|numeric|min:0',
            'resource'    => 'nullable|in:baby_seat,protected_theft,protected_accidents',
            'status'      => 'required|in:in_progress,completed,cancelled',
        ]);

        $reserve = Reserve::findOrFail($id);
        $reserve->update($request->all());

        return redirect()->route('reserves.index')->with('success', 'Reserva atualizada com sucesso!');
    }

    /**
     * Deletar reserva
     */
    public function destroy($id)
    {
        $reserve = Reserve::findOrFail($id);
        $reserve->delete();

        return redirect()->route('reserves.index')->with('success', 'Reserva removida com sucesso!');
    }
}


