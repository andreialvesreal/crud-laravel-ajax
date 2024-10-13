<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Minha Loja de Suplementos')</title>
    <!-- Adicione seus estilos aqui -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Minha Loja de Suplementos</h1>
        <!-- Menu, navegação ou cabeçalho geral -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 - Loja de Suplementos</p>
    </footer>

    <script>
       document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(error => {
                        throw new Error(error.message || 'Erro desconhecido');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    // Redireciona ou atualiza a página se necessário
                    window.location.href = "{{ route('products.index') }}";
                } else {
                    alert('Ocorreu um erro: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error.message);
                alert('Erro no processamento: ' + error.message);
            });
        });
    });
});
        </script>

</body>
</html>
