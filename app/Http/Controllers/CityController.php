<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return City::all();
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:cities',
        ]);
        $city = City::create([
            'name' => $fields['name'],
            'slug' => $fields['slug'],
        ]);

        $response = [
            'message' => 'Data Kota Berhasil Ditambahkan',
            'city' => $city,
        ];
        return response($response, 201);
    }

    public function show($id)
    {
        return City::find($id);
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);

        if ($city == null) {
            return response('Kota Tidak Ditemukan', 400);
        } else {
            $city->update($request->all());
            $response = [
                'message' => 'Data Kota Berhasil Diubah',
                'data' => $museum,
            ];
            return response($response, 200);
        }
    }

    public function search($name)
    {
        return City::where('name', 'like', '%' . $name . '%')->get();
    }

    public function destroy($id)
    {
        return City::destroy($id);
    }
}
