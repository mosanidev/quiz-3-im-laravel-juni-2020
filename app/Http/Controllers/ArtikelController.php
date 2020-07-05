<?php

namespace App\Http\Controllers;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index() {
        $artikel = ArtikelModel::get_all();
        return view('artikel.index', compact('artikel'));
    }

    public function create() {
        return view('artikel.form');
    }

    public function store(Request $request) {
        unset($request['_token']);
        $request->request->add(['created_at' => date("Y-m-d H:i:s")]);

        $slug = str_replace(' ','-',strtolower($request['judul']));

        $request->request->add(['slug' => $slug]);

        $new_artikel = ArtikelModel::save($request->all());

        return redirect('/artikel');   
    }

    public function show($id) {
        $artikel = ArtikelModel::find_by_id($id);

        return view('artikel.show', compact('artikel'));
    }

    public function edit($id) {
        $artikel = ArtikelModel::find_by_id($id);

        return view('artikel.edit', compact('artikel'));
    }

    public function update($id, Request $request) {
        $artikel = ArtikelModel::update($id, $request->all());
        return redirect('/artikel');
    }

    public function destroy($id) {
        $artikel = ArtikelModel::destroy($id);
        return redirect('/artikel');
    }
    
}
