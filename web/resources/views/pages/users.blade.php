@extends("layout.master",["title"=>$title])
@extends("layout.assets")
@section("content")
    <div class="main">
        <p style="font-size: xx-large;">Usuários Fila Web</p>
        <br/>
        <hr style="margin-top: -40px;">
        <div class="">
            <button class="btn btn-white" style="margin-left: 5%;" data-toggle="modal" data-target="#exampleModal">Cadastrar</button>
            <br/>
            <br/>
            <table class="table table-striped table-bordered table-hover text-center table-sm" style="width: 80%;margin-left: 5%;">
                <thead>
                <tr>
                    <td width="5%">#</td>
                    <td width="20%">Nome</td>
                    <td width="10%">Tipo</td>
                    <td width="5%">Status</td>
                    <td width="10%">Opções</td>
                </tr>
                </thead>
                <tbody>
                @php
                $i = 0;
                @endphp
                @foreach($lista as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->login }}</td>
                    <td>{{ $value->tipo }}</td>
                    <td>{{ $value->ativo }}</td>
                    <td class="btn-group-sm">
                        <button class="btn btn-sm btn-danger" onclick="Desativar({{ $value->id }},'{{ $value->ativo }}')"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                        <button class="btn btn-sm btn-default btn" onclick="AlterarSenhaModal()"><i class="fa fa-id-badge fa-7x" aria-hidden="true"></i></button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </html>
    <!-- Modal Cadasdtro !-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{
                        Form::open( array(
                            "url"=>"/users",
                            "id" => "formcadastro"
                        ))
                    }}
                    <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="defaultForm-email" name="login" class="form-control">
                            <label for="defaultForm-email">Usuario</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="defaultForm-pass" name="password" class="form-control">
                            <label for="defaultForm-pass">Senha</label>
                        </div>
                        <div class="mdl-selectfield md-form">
                            <i class="fa fa-user-circle-o prefix grey-text"></i>
                            <select id="Tipo" name="tipo" class="form-control">
                                <option value="2">Usuário</option>
                                <option value="1">Administrador</option>
                            </select>
                            <label for="Tipo">Tipo</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" onclick="$('#formcadastro').submit();" value="Cadastrar"/>
                    </form>
                    <button type="button" data-dismiss="modal" class="btn btn-red">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection