<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Produtos;

class ProdutosController extends Controller {

    public function index() {
        #http://localhost/projeto1/server.php/produtos
        $produtos = Produtos::paginate(10);
        $maiscaro = Produtos::all()->max('preco');
        $maisbarato = Produtos::all()->min('preco');
        $media = Produtos::all()->avg('preco');
        $soma = Produtos::all()->sum('preco');
        $contagem = Produtos::all()->count();
        $maiorDez = Produtos::where('preco','>',10)->count();
        return view(
                'produtos.index', 
                array('produtos' => $produtos, 
                'buscar' => null, 
                'ordem' => null,
                'maiscaro' => $maiscaro,
                'maisbarato' => $maisbarato,
                'mediavalor' => $media,
                'somavalor' => $soma,
                'contagem' => $contagem,
                'maiorDezP' => $maiorDez
                ));
    }

    public function edit($id) {
        #http://localhost/projeto1/server.php/produtos/1
        if(Auth::check()){
        $produto = Produtos::find($id);
        return view('produtos.edit', compact('produto', 'id'));
        } else {
            return redirect('login');
        }
    }

    public function create() {
        if(Auth::check()){
            return view('produtos.create');
        } else {
            return redirect('login');
        }
    }

    public function show($id) {
        $produto = Produtos::with('mostrarComentarios')->find($id);
        return view('produtos.show', compact('produto', 'id'));
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

        if ($produto->save()) {
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

        if ($request->hasFile('imgproduto')) {
            $imagem = $request->file('imgproduto');
            $nomearquivo = md5($id) . "." . $imagem->getClientOriginalExtension();
            $request->file('imgproduto')->move(public_path('./img/produtos/'), $nomearquivo);
        }


        $produto->sku = $request->get('sku');
        $produto->titulo = $request->get('titulo');
        $produto->descricao = $request->get('descricao');
        $produto->preco = $request->get('preco');



        if ($produto->save()) {
            return redirect('produtos/' . $id . '/edit')->with('success', 'Produto atualizado com sucesso!');
        }
    }

    public function destroy($id) {

        $produto = Produtos::find($id);
        if(file_exists('C:/wamp64/www/projeto1/public/img/produtos/'.md5($id).".jpg")) {
            unlink('C:/wamp64/www/projeto1/public/img/produtos/'.md5($id).".jpg");
        }
        $produto->delete();
        return redirect()->back()->with('success', 'Produto deletado com sucesso!');
        
    }

    
    public function busca(Request $request) {
        $buscaInput = $request->input('busca');
        $produtos = Produtos::where('titulo', 'LIKE', '%'.$buscaInput.'%')
                           ->orwhere('descricao', 'LIKE', '%'.$buscaInput.'%')
                           #->get();
                           ->paginate(10);
        return view('produtos.index', array('produtos' => $produtos, 'buscar' => $buscaInput,
            'ordem' => null));
    }
    
    
    public function ordem(Request $request){
        $ordemInput = $request->input('ordem');
               if($ordemInput == 1) {
                   $campo = 'titulo';
                   $tipo = 'asc';
        } else if($ordemInput == 2) {
                   $campo = 'titulo';
                   $tipo = 'desc';
        } else if($ordemInput == 3) {
                   $campo = 'preco';
                   $tipo = 'asc';
        } else if($ordemInput == 4) {
                   $campo = 'preco';
                   $tipo = 'desc';
        }
        $produtos = Produtos::orderBy($campo, $tipo)->paginate(10);
        return view('produtos.index', array('produtos' => $produtos, 'buscar' => null,
            'ordem' => $ordemInput));
    }
    
    
}
