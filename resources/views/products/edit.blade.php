@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        
        <label>Descrição:</label>
        <textarea name="description" required>{{ $product->description }}</textarea>
        
        <label>Preço:</label>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        
        <label>Quantidade:</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" required>
        
        <button type="submit">Salvar</button>
    </form>
@endsection
