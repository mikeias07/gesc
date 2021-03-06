@extends('layout.principal')
@extends('usuarios.validacaoUsuarios')
@section('conteudo')
<h1 class="text">Usuários </h1>

@if(empty($usuario))
    <div class="alert alert-danger">
    Você não tem nenhum usuário cadastrado.
    </div>
@else
<table class="table table-striped border">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Perfil</th>
            <th scope="col">Opções</th>

        </tr>
    </thead>
    @foreach ($usuario as $c)
    <tr>
        <td>{{ $c->nome }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->tipousuario }}</td>
        <td>
            @if ($c->tipousuario == 'SuperUser')
                
            @else
                
            
          <!--    <button type="button" class="btn btn-info" data-myid="{{ $c->id }}" data-mynome="{{ $c->nome }}" 
                data-myemail="{{ $c->email }}" data-mysenha="{{ $c->password }}" data-mytipousuario="{{ $c->tipousuario }}" 
                data-mynomeusuario="{{ $c->nomeusuario }}" 
                data-toggle="modal" data-target="#editarusuario">Editar
            </button>-->

            <a href="" class="text text-info" data-myid="{{ $c->id }}" data-mynome="{{ $c->nome }}" 
                    data-myemail="{{ $c->email }}" data-mysenha="{{ $c->password }}" data-mytipousuario="{{ $c->tipousuario }}" 
                    data-mynomeusuario="{{ $c->nomeusuario }}" 
                    data-toggle="modal" data-target="#editarusuario" >
                    <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Editar">
                            edit
                    </i>
            </a>

            @if($c->statususuario=='1')       
               <!--   <button type="button" class="btn btn-danger" data-myid="{{ $c->id }}" data-mystatususuario="{{ $c->statususuario }}" 
                    data-toggle="modal" data-target="#inativar">Inativar
                </button>
                -->
                <a href="" class="text text-danger" data-myid="{{ $c->id }}" data-mystatususuario="{{ $c->statususuario }}" data-mynome="{{ $c->nome }}"
                        data-toggle="modal" data-target="#inativar">
                    
                <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Inativar usuário">
                        highlight_off
                </i>
            </a>
            @else
              <!--   <button type="button" class="btn btn-success" data-myid="{{ $c->id }}" data-mystatususuario="{{ $c->statususuario }}" 
                    data-toggle="modal" data-target="#ativar">Ativar
                </button>
                --> 

                <a href="" class="text text-success" data-myid="{{ $c->id }}" data-mystatususuario="{{ $c->statususuario }}" 
                    data-toggle="modal" data-target="#ativar" data-mynome="{{ $c->nome }}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="right" title="Ativar usuário">
                            done
                    </i>
                </a>

            @endif
            @endif
        </td>
    </tr>
    @endforeach
</table>

@endif
<div class="float-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#incluirusuario">
  Novo
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="incluirusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Incluir Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form class="form" action="usuarios_adiciona" method="post" name="incluirUsuario" 
                onsubmit="return validar(incluirUsuario.nome, incluirUsuario.password, incluirUsuario.email, incluirUsuario.nomeusuario, incluirUsuario.listaNomeUsuarios, incluirUsuario.passwordConfirm);">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="statususuario" value="1">
                    <input name="listaNomeUsuarios" class="form-control" type="hidden" value="{{$string}}" maxlength="255" autocomplete="off">
                    <label>Nome*</label>
                    <input autofocus name="nome" class="form-control" type="text" value="" maxlength="255" autocomplete="off">
                    <label id="msgnome"></label>
                    <br>
                    <label>E-mail*</label>
                    <input name="email" class="form-control" type="text" value="" maxlength="255" autocomplete="off">
                    <label id="msgemail"></label>
                    <br>
                    <label>Senha*</label>
                    <input name="password" class="form-control" type="password" value="" maxlength="20" autocomplete="off">
                    <label id="msgsenha"></label>
                    <br>
                    <label>Confirmar senha*</label>
                    <input name="passwordConfirm" class="form-control" type="password" value="" maxlength="20" autocomplete="off">
                    <label id="msgpasswordConfirm"></label>
                    <br>
                    <label>Nome de Usuário*</label>
                    <input name="nomeusuario" class="form-control" type="text" value="" maxlength="20" autocomplete="off">
                    <label id="msgnomeusuario"></label>
                    <br>
                    <label>Perfil:</label>
                    <label><input type="radio"  name="tipousuario" id="adm" value="Administrador" checked> Administrador</label>
                    <label><input type="radio" name="tipousuario" id="edu" value="Educador"> Educador</label>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="salvar" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal para edição -->
<div class="modal fade" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Usuários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form" action="usuarios_edita" method="POST" name="editarUsuario"
            onsubmit="return validarEditar(editarUsuario.nome, editarUsuario.password, editarUsuario.email, editarUsuario.nomeusuario, 
            editarUsuario.listaNomeUsuarios, editarUsuario.nomeUsuarioAtual, editarUsuario.passwordConfirm);">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">
                    <input name="listaNomeUsuarios" class="form-control" type="hidden" value="{{$string}}" maxlength="255" autocomplete="off">
                    <input name="nomeUsuarioAtual" id="nomeUsuarioAtual" class="form-control" type="hidden" value="{{$string}}" maxlength="255" autocomplete="off">
                    
                    <label>Nome*</label>
                    <input name="nome" id="nome" class="form-control" type="text" value="" maxlength="255" autocomplete="off">
                    <label id="msgnome_edit"></label>
                    <br>
                    <label>E-mail*</label>
                    <input name="email" id="email" class="form-control" type="email" value="" maxlength="255" autocomplete="off">
                    <label id="msgemail_edit"></label>
                    <br>
                    <label>Senha</label>
                    <input name="password" class="form-control" type="password" value="" maxlength="20" autocomplete="off">
                    <label id="msgsenha_edit"></label>
                    <br>
                    <label>Confirmar senha</label>
                    <input name="passwordConfirm" class="form-control" type="password" value="" maxlength="20" autocomplete="off">
                    <label id="msgpasswordConfirm_edit"></label>
                    <br>
                    <label>Nome de Usuário*</label>
                    <input placeholder="Senha" name="nomeusuario" id="nomeusuario" class="form-control" type="text" value="" maxlength="20" autocomplete="off">
                    <label id="msgnomeusuario_edit"></label>
                    <br>
                    <label>Perfil:</label>
                    <label><input type="radio" name="tipousuario" id="Admin" value="Administrador"> Administrador</label>
                    <label><input type="radio" name="tipousuario" id="Edu" value="Educador"> Educador</label>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal inativar -->
<div class="modal fade" id="inativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="usuarios_inativa" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">

                    <h5>Você tem certeza que deseja realmente inativar o(a) usuário(a) <label id="nomeusuario" value=""></label>?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Inativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal ativar -->
<div class="modal fade" id="ativar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalCenterTitle">Atenção!!!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <form action="usuarios_ativa" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="id" id="id" type="text" value="">

                    <h5>Você tem certeza que deseja realmente ativar o(a) usuário(a) <label id="nomeusuario" value=""></label>?</h5>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Ativar</button>
            
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

<!-- Modal de help -->
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="help" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="font-weight-bold">Ajuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="col-md-12">
                </br>
                <p class="text-justify">Esta tela tem como objetivo permitir o cadastro de novos usuários, assim como também a atualização dos seus dados. Também é possível executar a ativação e inativação de um usuário, onde usuário inativos não conseguirão acessar o sistema.</p>
                <p class="text-justify">Ao cadastrar ou editar um usuário será obrigatório informar uma senha com no mínimo 6 caracteres e o e-mail deve possuir um formato válido, por exemplo: exemplo@email.com.</p>
                            
            </div>
        </div>
    </div>
</div>

<script src="/js/listagemUsuarios.js"></script>

@stop
