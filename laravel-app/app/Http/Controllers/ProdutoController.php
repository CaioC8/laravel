<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(): View
    {
        $produtos = Produto::orderBy('created_at', 'desc')->get();
        return view("produtos", compact("produtos"));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "nome" => "required|string|max:255",
            "descricao" => "nullable|string",
            "preco" => "required|numeric|min:0",
        ]);

        Produto::create($validated);

        return redirect("/produtos")->with("success", "Produto cadastrado com sucesso!");
    }

    public function destroyAll(): RedirectResponse
    {
        Produto::truncate();

        return redirect(route('produtos.index'))->with('success', 'Todos os produtos foram excluídos!');
    }
}
