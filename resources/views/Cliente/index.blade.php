<body>
    <input type="text" id="filtro" placeholder="Filtrar clientes..." onkeyup="filtrarTabela()">

    <table id="tabelaClientes">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <form action="deletarCliente/{{ $cliente->id }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <a href="editarCliente/{{ $cliente->id }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function filtrarTabela() {
            var filtro = document.getElementById('filtro').value.toUpperCase();

            var tabela = document.getElementById('tabelaClientes');
            var linhas = tabela.getElementsByTagName('tr');

            for (var i = 1; i < linhas.length; i++) {
                var cells = linhas[i].getElementsByTagName('td');
                var encontrado = false;

                for (var j = 0; j < cells.length - 1; j++) {
                    var textoCell = cells[j].textContent || cells[j].innerText;
                    if (textoCell.toUpperCase().indexOf(filtro) > -1) {
                        encontrado = true;
                        break;
                    }
                }

                if (encontrado) {
                    linhas[i].style.display = '';
                } else {
                    linhas[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
