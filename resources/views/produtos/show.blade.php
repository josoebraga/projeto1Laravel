@extends('layouts.app')
@section('title', 'Editar um produto - ' . $produto->titulo)
@section('content')

<?php

        #http://localhost/projeto1/server.php/produtos/1/edit

?>

    <h1>Adicionar um produto</h1>
    <h1 class="mb-3">Editar um produto - {{$produto->titulo}}</h1>
    @if($message = Session::get('success'))
           <div class="alert alert-success">
                {{$message}}
           </div>
    @endif

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <body>
            <h1>Produtos - {{$produto->titulo}}</h1>
                <div class="row">
                    @if(file_exists("C:/wamp64/www/projeto1/public/img/produtos/".md5($produto->id).".jpg"))
                            <div class="col-md-6">
                                <img alt="Imagem Produto" class="img-fluid img-thumbnail"
                                     src="<?php echo "http://localhost/projeto1/public/img/produtos/".md5($produto->id).".jpg"; ?>">
                                          <?php #echo "http://localhost/projeto1/public/img/produtos/".md5($produto->id).".jpg"; ?>
                            </div>
                    @endif
                    <div class="col-md-6">
            <ul>
                        <li><strong>SKU: </strong> {{$produto->sku}} </li>
                        <li><strong>Preço: </strong>R$ {{number_format($produto->preco,2,',','.')}}</li>
                        <li><strong>Adicionado em: </strong> {{date("d/m/Y H:i", strtotime($produto->created_at))}} </li>
                        <li><strong>Descrição: </strong> <p>{{$produto->descricao}}</p>
            </ul>

                    </div>
                </div>
                <div class="row">
                    @foreach($produto->mostrarComentarios as $comentario)
                    <div class="card col-md-10">
                        <div class="card-header">
                            {{$comentario->usuario}}
                        </div>
                        <div class="card-body">
                            {{$comentario->comentario}}
                        </div>
                        <div class="card-footer">
                            {{date("d/m/Y H:i", strtotime($comentario->updated_at))}}
                        </div>
                    </div>
                    @endforeach
                </div>
                    <a href="javascript:history.go(-1)">Voltar</a>                    |
                    <a href="javascript:document.location.replace('http://localhost/projeto1/server.php/produtos/' + <?php echo $produto->id ?> + '/edit')">Editar</a>
        </body>

    @endsection
    <img src="../../../public/img/produtos/45c48cce2e2d7fbdea1afc51c7c6ad26.jpg" alt=""/>
