<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyPutRequest;
use App\Http\Requests\CompanyPostRequest;
use Gsantoscomp\SharedVetDb\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function store(CompanyPostRequest $request)
    {
        $company = Company::create($request->all());

        return response()->json(['message' => 'Empresa cadastrada com sucesso', 'data' => $company], 201);
    }


    public function show($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        return response()->json($company);
    }

    public function update(CompanyPutRequest $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Registro de empresa não encontrado'], 404);
        }

        $company->update($request->all());

        return response()->json(['message' => 'Registro de empresa atualizado com sucesso', 'data' => $company]);
    }



    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Registro de empresa não encontrado'], 404);
        }

        $company->delete();

        return response()->json(['message' => 'Registro de empresa removido com sucesso'], 200);
    }
}
