<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos=Article::orderBy('id', 'desc')->paginate(5);
        return view('articles.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos=$request->validate($this->rules());
        $datos['imagen']=($request->imagen) ? $request->imagen->store('images/articles/') : 'images/articles/noimage.png';
        Article::create($datos);
        return redirect()->route('articles.index')->with('mensaje', "Artículo creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //si la imagen no es 'noimage.png' la borro y luego elimino el articulo
        if(basename($article->imagen)!='noimage.png'){
            Storage::delete($article->imagen);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('mensaje', "Artículo Borrado");
    }

    private function rules(?int $id=null): array{
        return [
            'nombre'=>['required', 'string', 'min:3', 'max:50', 'unique:articles,nombre,'.$id],
            'descripcion'=>['required', 'string', 'min:10', 'max:150'],
            'disponible'=>['required', 'in:SI,NO'],
            'imagen'=>['image', 'max:2048']
        ];
    }
}
