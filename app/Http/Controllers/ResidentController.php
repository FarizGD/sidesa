<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return view('pages.resident.index', compact('residents'));
    }

    public function create()
    {
        return view('pages.resident.create');
    }

    private function validationRules()
    {
        return [
            'nik' => ['required', 'digits:16'],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:700'],
            'religion' => [
                'nullable',
                'string',
                Rule::in(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            ],
            'marital_status' => [
                'required',
                Rule::in(['single', 'married', 'divorced', 'widowed']),
            ],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:15'],
            'status' => [
                'required',
                Rule::in(['active', 'moved', 'deceased']),
            ],
        ];
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules());

        Resident::create($validatedData);

        return redirect('/resident')
            ->with('success', 'Data penduduk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        return view('pages.resident.edit', compact('resident'));
    }

    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);

        $validatedData = $request->validate($this->validationRules());

        $resident->update($validatedData);

        return redirect('/resident')
            ->with('success', 'Data penduduk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);

        $resident->delete();

        return redirect('/resident')
            ->with('success', 'Data penduduk berhasil dihapus!');
    }
}
