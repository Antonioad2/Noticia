<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Lista todos os motoristas
     */
    public function index()
    {
        $drivers = Driver::latest()->paginate(10); 
        return view('admin.drivers.driver.index', compact('drivers'));
    }

    /**
     * Mostra o formulário para criar motorista
     */
    public function create()
    {
        return view('admin.drivers.driverCreate.index');
    }

    /**
     * Salva um novo motorista
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'document_identification' => 'required|unique:drivers',
            'id_image' => 'required|image|mimes:jpg,jpeg,png,pdf|max:5120',
            'license_image' => 'required|image|mimes:jpg,jpeg,png,pdf|max:5120',
            'license_expiry_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'gender' => 'nullable|in:male,female',
            'email' => 'required|email|unique:drivers',
            'experience_years' => 'nullable|integer|min:0',
            'address' => 'required|string|max:255',
        ]);

        // Upload das imagens
        $idImagePath = $request->file('id_image')->store('drivers/id_images', 'public');
        $licenseImagePath = $request->file('license_image')->store('drivers/license_images', 'public');

        // Criar motorista
        Driver::create([
            'full_name' => $request->full_name,
            'document_identification' => $request->document_identification,
            'id_image' => $idImagePath,
            'license_image' => $licenseImagePath,
            'license_expiry_date' => $request->license_expiry_date,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'email' => $request->email,
            'experience_years' => $request->experience_years,
            'address' => $request->address,
        ]);

        return redirect()->route('drivers.index')->with('success', 'Motorista cadastrado com sucesso!');
    }

    /**
     * Mostra um motorista específico
     */
    public function show(Driver $driver)
    {
        return view('admin.drivers.driverView.index', compact('driver'));
    }

    /**
     * Mostra formulário para editar motorista
     */
    public function edit(Driver $driver)
    {
        return view('admin.drivers.driverEdit.index', compact('driver'));
    }

    /**
     * Atualiza motorista
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'document_identification' => 'required|unique:drivers,document_identification,' . $driver->id,
            'license_expiry_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'gender' => 'nullable|in:male,female',
            'email' => 'required|email|unique:drivers,email,' . $driver->id,
            'experience_years' => 'nullable|integer|min:0',
            'address' => 'required|string|max:255',
        ]);

        // Atualizar imagens (se enviadas)
        if ($request->hasFile('id_image')) {
            $driver->id_image = $request->file('id_image')->store('drivers/id_images', 'public');
        }

        if ($request->hasFile('license_image')) {
            $driver->license_image = $request->file('license_image')->store('drivers/license_images', 'public');
        }

        $driver->update($request->except(['id_image', 'license_image']));

        return redirect()->route('drivers.index')->with('success', 'Motorista atualizado com sucesso!');
    }

    /**
     * Elimina motorista (Soft Delete)
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Motorista removido com sucesso!');
    }
}
