<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::orderBy('created_at', 'desc')->get();
        return view("categorias", compact("categorias"));
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            "nome" => "required|string|max:255|unique:categorias,nome"
        ]);

        Categoria::create($validate);

        return redirect("/categorias")->with("success", "Categoria cadastrada com sucesso!");
    }

    public function destroyAll(): RedirectResponse
    {
        Categoria::truncate();

        return redirect(route('categorias.index'))->with('success', 'Todas as categorias foram excluídas!');
    }
}
