<?php

namespace App\Http\Controllers;

// use App\Mail\ContatoMail;
// use Mail;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contatoView()
    {
        return view('index');
    }

    public function sendContato(Request $r){     
        $dados = $r;

        try {
            // Email para o solicitante
            $view = View::make('emails.contato-email', ['dados' => $dados])->render();  
            $esg_mail_cliente = new EsgMail($view);
            $esg_mail_cliente->subject('Nova mensagem recebida');
            $esg_mail_cliente->from('email@gmail.com','Laravel');
            Mail::to($dados->email, $dados->nome)->send($esg_mail_cliente); 

        } catch (\Throwable $th) {
            return redirect()->route('contato-view')->with('error', 'Ocorreu um erro!');
        }
        return redirect()->route('contato-view')->with('success', 'Mensagem enviada!');
    }
}
