@extends('layouts.app')

@section('content')
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}">Criar Produto</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - R$ {{ $product->price }}
                <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
