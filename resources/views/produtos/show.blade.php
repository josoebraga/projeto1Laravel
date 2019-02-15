<?php
/**
 * Created by PhpStorm.
 * User: Josoé
 * Date: 09/02/2019
 * Time: 10:52
 */
        #{{}} equivale ao echo no php
        #http://localhost/projeto1/server.php/produtos/
?>

    @extends('layout.app')
    @section('title', $produto->titulo)
    @section('content')

        <body>
            <h1>Produtos - {{$produto->titulo}}</h1>
            <ul>

                    <li><strong>SKU: </strong> {{$produto->sku}} </li>
                    <li><strong>Preço: </strong> {{$produto->preco}} </li>
                    <li><strong>Adicionado em: </strong> {{$produto->created_at}} </li>
            </ul>
                    <p>{{$produto->descricao}}</p>
                    <a href="javascript:history.go(-1)">Voltar</a>
        </body>

    @endsection
