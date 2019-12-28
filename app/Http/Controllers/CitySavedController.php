<?php

namespace App\Http\Controllers;

use App\CitySaved;
use Illuminate\Http\Request;

class CitySavedController extends Controller
{
    public function index()
    {
        return CitySaved::all();
    }

    public function show(CitySaved $saved)
    {
        return $saved;
    }

    public function store(Request $request)
    {
        return CitySaved::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = CitySaved::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = CitySaved::findOrFail($id);
        $article->delete();

        return 204;
    }
}
