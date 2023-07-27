<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicinePostRequest;
use App\Http\Requests\MedicinePutRequest;
use Gsantoscomp\SharedVetDb\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();

        return response()->json($medicines);
    }

    public function medicinesByCompany()
    {
        $userAuthenticated = auth()->user();

        $medicines = Medicine::where('company_id', $userAuthenticated->company_id)->get();

        return response()->json($medicines);
    }

    public function store(MedicinePostRequest $request)
    {
        $medicine = Medicine::create($request->all());

        return response()->json(['message' => 'Medicamento cadastrado com sucesso', 'data' => $medicine], 201);
    }

    public function show($id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Medicamento não encontrado'], 404);
        }

        return response()->json($medicine);
    }

    public function update(MedicinePutRequest $request, $id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Registro de medicamento não encontrado'], 404);
        }

        $medicine->update($request->all());

        return response()->json(['message' => 'Registro de medicamento atualizado com sucesso', 'data' => $medicine]);
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Registro de medicamento não encontrado'], 404);
        }

        $medicine->delete();

        return response()->json(['message' => 'Registro de medicamento removido com sucesso'], 200);
    }
}
