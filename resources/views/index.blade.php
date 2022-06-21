@extends('template.layout')

@section('conteudo')

    <section class="contato">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="background-color: #d3d3d3; float:none; margin:auto;">

                    <div class="card" style="padding: 30px 40px; margin-top: 60px; margin-bottom: 60px; border: none !important; box-shadow: 0 6px 12px 0 rgb(0 0 0 / 8%); border-radius: 0.3rem;">
                    
                        <h2 class="titulo-materiais pad-15-0">Contato</h2>

                        <div class="erro_end_sucess">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <span>{!! \Session::get('success') !!}</span>
                            </div>
                            @elseif (\Session::has('error'))
                            <div class="alert alert-danger">
                                <span>{!! \Session::get('error') !!}</span>
                            </div>
                            @endif
                        </div>

                        <form method="POST" action="{{route('contato.send')}}" id="contact-form" style="display: flex; justify-content: center;">
                            {!! csrf_field() !!}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label px-3">Nome<span class="text-danger"> *</span></label>
                                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label px-3">E-mail<span class="text-danger"> *</span></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label px-3">Assunto<span class="text-danger"> *</span></label>
                                    <input type="text" name="assunto" id="assunto" class="form-control" placeholder="Digite seu nome" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label px-3">Mensagem<span class="text-danger"> *</span></label>
                                    <textarea type="text" name="mensagem" id="mensagem" class="form-control" required=""></textarea>
                                </div>    

                                <div class="form-row">
                                    <div class="form-group col-md-12 center">
                                        <button type="submit" class="btn btn-primary center" id="submit-button">Agendar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection