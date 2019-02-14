<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;

class ProdutosController extends Controller
{
    public function index() {
        #http://localhost/projeto1/server.php/produtos
        $produtos = Produtos::all();
            return view('produtos.index', array('produtos'=>$produtos));
    }

    public function edit($id) {
        #http://localhost/projeto1/server.php/produtos/1
        $produto = Produtos::find($id);
        return view('produtos.edit', compact('produto', 'id'));
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'sku' => 'required|unique:produtos|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric'
        ]);

        $produto = new Produtos();
        $produto->sku = $request->input('sku');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if($produto->save()) {
            return redirect('produtos/create')->with('success', 'Produto cadastrado com sucesso!');
        }

    }

    public function update(Request $request, $id) {

        $produto = Produtos::find($id);

        $this->validate($request, [
            'sku' => 'required|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric'
        ]);
        
        if($request->hasFile('imgproduto')) {
            $imagem = $request->file('imgproduto');
            $nomearquivo = md5($id).".".$imagem->getClientOriginalExtension();
            $request->file('imgproduto')->move(public_path('./img/produtos/'), $nomearquivo);
        }


        $produto->sku = $request->get('sku');
        $produto->titulo = $request->get('titulo');
        $produto->descricao = $request->get('descricao');
        $produto->preco = $request->get('preco');

        if($produto->save()) {
            return redirect('produtos/'.$id.'/edit')->with('success', 'Produto atualizado com sucesso!');
        }

    }

}
