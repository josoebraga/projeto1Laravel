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
    @section('title', 'Lista de produtos')
    @section('content')

        <body>
            <h1>Produtos</h1>
            <ul>
                @foreach($produtos as $produto)
                    <li><a href="{{URL::to('produtos')}}/{{$produto->id}}">{{$produto->titulo}}</a></li>
                @endforeach
            </ul>
        </body>

    @endsection
