<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());

        // Verifica se a requisição é AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Produto criado com sucesso!']);
        }

        // Se não for AJAX, redireciona normalmente
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Carregar o produto pelo ID
        $product = Product::findOrFail($id); // Isso irá lançar um erro 404 se o produto não for encontrado

        // Retornar a view com o produto
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        // Verifica se a requisição é AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Produto atualizado com sucesso!']);
        }

        // Se não for AJAX, redireciona normalmente
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();

        // Verifica se a requisição é AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Produto excluído com sucesso!']);
        }

        // Se não for AJAX, redireciona normalmente
        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
