@extends('layouts.app')

@section('content')
    <h1>Criar Produto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome do Produto</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="price">Preço</label>
            <input type="number" step="0.01" name="price" id="price" required>
        </div>
        <div>
            <label for="quantity">Quantidade</label>
            <input type="number" name="quantity" id="quantity" required>
        </div>
        <button type="submit">Criar Produto</button>
    </form>
    
@endsection
