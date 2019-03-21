<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
#include '../../../resources/views/email/';
class ContatoController extends Controller
{
    public function index() {
        $data['titulo'] = "Contato";
        return view('contato', $data);
    }
    
    
    public function enviar(Request $request) {
        
        $dadosEmail = array(
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'assunto' => $request->input('assunto'),
            'msg' => $request->input('msg')
        );
  #      Mail::send('C:/wamp64/www/projeto1/resources/views/email/contato.blade.php', $dadosEmail, function($message){
        Mail::send('../../../resources/views/email/contato.blade.php', $dadosEmail, function($message){
            $message->from('formulario@josoesoftware.com.br', 'Formulário de contato');
            $message->subject('Mensagem enviada pelo formulário de contato');
            $message->to('josoe.braga@gmail.com')->cc('josoe.schmidt@ulbra.inf.br'); #Ester devem ser autorizados primeiro em: Authorized Recipients, no site do mailgun.
        });
        
        return redirect('contato')->with('success', 'Mensagem enviada, em breve entraremos em contato!!!');
        
    }
    
    
}
