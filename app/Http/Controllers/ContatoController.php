<?php

namespace App\Http\Controllers;

use App\Mail\ContatoMail;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContatoController extends Controller
{
    public function contatoView()
    {
        return view('index');
    }

    public function sendContato(Request $r){     
        $dados = $r;
       
        // try {
            // Email para o solicitante
            $view = View::make('emails.contato-email', ['dados' => $dados])->render();
            $contato_mail = new ContatoMail($view);
            $contato_mail->subject('Nova mensagem recebida');
            $contato_mail->from('email@gmail.com','Laravel');
            Mail::to($dados->email, $dados->nome)->send($contato_mail); 

        // } catch (\Throwable $th) {
            return redirect()->route('contato-view')->with('error', 'Ocorreu um erro!');
        // }
        return redirect()->route('contato-view')->with('success', 'Mensagem enviada!');
    }
}
