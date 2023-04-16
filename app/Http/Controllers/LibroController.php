<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{

    public function index(){
        $libros = Libro::all();
        return response()->json(['libros' => $libros]);
    }

    public function store(Request $request){
        $libro = new Libro();
        $libro->title = $request->input('title');
        $libro->author = $request->input('author');
        $libro->description = $request->input('description');
        $libro->price = $request->input('price');
        $libro->published_at = $request->input('published_at');
        $libro = Libro::create($request->all());
        $libro->save();
        return response()->json($libro, 201);
    }

    public function show(Libro $libro){
        $libro = Libro::find($id);
        return response()->json(['libro' => $libro]);
    }

    public function update(Request $request, $id){
        $libro = Libro::find($id);
        $libro->title = $request->input('title');
        $libro->author = $request->input('author');
        $libro->description = $request->input('description');
        $libro->price = $request->input('price');
        $libro->published_at = $request->input('published_at');
        $libro->save();
        $libro->update($request->all());
        return response()->json($libro);
    }

    public function destroy($id){
        $libro = Libro::find($id);
        $libro->delete();
        return response()->json('Libro eliminado correctamente', 204);
    }

}
