<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieList: Filmes</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" type="imagem/png" href="https://www.celsonunes.com.br/wp-content/uploads/2018/06/logo-popcorn.png" />
    <style>
        i {
            margin-left: 17px;
        }

        input {
            border-radius: 5px;
            height: 30px;
            width: 200px;
            margin: 5px;
            border-color: rgba(70, 70, 70, 0.2);
            border-width: 1px;
            outline: none;
        }

        .sectionAll {
            display: flex;
            margin-top: 2%;
            padding-left: 60px;
            padding-right: 60px;
            flex-direction: column;
        }

        .section {
            display: flex;
            flex-direction: row;
            padding-left: 10px;
        }

        .divPrincipal {
            display: flex;
            margin-top: 1%;
            margin-right: 30px;
            flex-direction: row;
        }

        .divSecundaria {
            display: block;
            margin-top: 1%;
            flex-direction: row;
        }

        .sectionTable {
            margin-top: 2%;
            padding-left: 10px;
            padding-right: 10px;
        }

        #btn:hover {
            width: 100px;
            height: 30px;
            border: none;
            color: white;
            background-color: #77dd77;
            box-shadow: 3px 3px 5px rgba(70, 70, 70, 0.2);
            transition: 0.5s;
            outline: none;
        }

        #btn {
            width: 100px;
            height: 30px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            color: white;
            background-color: #03bb85;
            transition: 0.5s;
            outline: none;
        }

        #btn2 {
            width: 100px;
            height: 30px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            color: white;
            background-color: #00acee;
            transition: 0.5s;
            outline: none;
        }

        #btn2:hover {
            width: 100px;
            height: 30px;
            border: none;
            color: white;
            background-color: #00acee;
            box-shadow: 3px 3px 5px rgba(70, 70, 70, 0.2);
            transition: 0.5s;
            outline: none;
        }

        h4 {
            font-family: Arial, Helvetica, sans-serif;
            color: rgba(70, 70, 70, 0.8);
        }

        .tdTitulo {
            font-family: Arial, Helvetica, sans-serif;
            color: rgba(70, 70, 70, 0.7);
            font-weight: bold;
        }

        td {
            font-family: Arial, Helvetica, sans-serif;
            color: rgba(70, 70, 70, 0.9);
        }

        table {
            width: 350px;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #00acee;">
        <a class="navbar-brand" href="/" style="color: #fff; font-size:25px; font-family: Lobster">MovieList</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="/filmes" style="color: #fff;">Filmes</a>
                <a class="nav-item nav-link" href="/categorias" style="color: #fff;">Categorias</a>
            </div>
        </div>
    </nav>
</head>

<body>
    <section class="sectionAll">
        <h4>Filmes</h4>
            <section class="section">
                <div class="divPrincipal">
                    <form action="{{url('/consulta-por-filme')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" placeholder="Pesquise pela filme" name="txtFilme">
                        <button type="submit" id="btn">Buscar</button>
                    </form>
                </div>

                <div class="divSecundaria">
                    <form action="{{url('/inserir-filme')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" placeholder="Nome" name="txtFilme">
                        <input type="number" placeholder="ID da categoria" name="txtCategoria">
                        <input type="text" placeholder="Ano de lançamento" name="txtAno">
                        <button type="submit" id="btn2">Adicionar</button>
                    </form>
                </div>
            </section>

            <section class="sectionTable">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ano de lançamento</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filmes as $filme)
                        <tr>
                            <td>{{ $filme -> idFilme }}</td>
                            <td>{{ $filme -> filme }}</td>
                            <td>{{ $filme -> anoLancamento }}</td>
                            <td>{{ $filme -> categoria }}</td>
                            <td><a href="/editar-filme-tl/{{$filme->idFilme}}"><i class="fas fa-pen"></i></a></td>
                            <td><a href="/excluir-filme/{{$filme->idFilme}}"><i class="fas fa-trash-alt"></i></a></td>
                        <tr>
                            @endforeach
                    </tbody>
                </table>
            </section>
    </section>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>