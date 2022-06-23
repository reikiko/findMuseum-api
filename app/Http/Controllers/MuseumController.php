<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuseumController extends Controller
{
    public function index()
    {
        return Museum::all();
    }

    public function museumsInCity($id)
    {
        $museum = Museum::where('city_id', $id)->get();
        return response($museum, 200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'city_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:museums',
            'image' => 'required',
            'excerpt' => 'required',
            'desc' => 'required',
        ]);
        $museum = Museum::create([
            'city_id' => $fields['city_id'],
            'name' => $fields['name'],
            'slug' => $fields['slug'],
            'image' => $fields['image'],
            'price' => $fields['price'],
            'excerpt' => $fields['excerpt'],
            'desc' => $fields['desc']
        ]);

        $response = [
            'message' => 'Data Museum Berhasil Ditambahkan',
            'museum' => $museum,
        ];
        return response($response, 201);
    }

    public function show($id)
    {
        return Museum::find($id);
    }

    public function update(Request $request, $id)
    {
        $museum = Museum::find($id);

        if ($museum == null) {
            return response('Museum Tidak Ditemukan', 400);
        } else {
            $museum->update($request->all());
            $response = [
                'message' => 'Data Museum Berhasil Diubah',
                'data' => $museum,
            ];
            return response($response, 200);
        }
    }

    public function search($name)
    {
        return Museum::where('name', 'like', '%' . $name . '%')->get();
    }

    public function destroy($id)
    {
        return Museum::destroy($id);
    }
}
