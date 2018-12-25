@extends("layout.master",["title"=>$title])
@extends("layout.assets")
@section("content")
    <div class="main" style="margin-top: 0;">
        <!-- Dashboard

            TODO: Trocar a ordem no dashboard e deixar conforme o desenho.


        <div id="filaresult" style="border: solid black 1px; border-radius: 5px; width: 40%;margin-top: 60px;">
            <p style="margin-top: -30px; font-size: x-large;">Fila</p>
            <div style="position: absolute; left:55%;margin-top:-40px;">
                <p>Status: </p>
                <div id="statusbutton" class="led-red"></div>
            </div>
            <div class="item">
                <input id="toggle-event" class="mytoggle" type="checkbox" data-toggle="toggle" data-style="my">
            </div>
        </div>
        -->
        <div id="filaresult" class="card">
            <div>
                <p id="statuslb">Status </p>
                <div class="led-red" id="statusled">
                </div>
            </div>
            <label class="switch">
                <input type="checkbox" id="toggle-event">
                <span class="slider round"></span>
            </label>
        </div>
        <br/>

        <div class="card dashboard orange accent-2">
            <div class="card-body text-center texto-dashboard">
                <span>Atualmente no intervalo: {{ ucfirst(strtolower($atual == null ? "Ninguem":$atual->nome)) }}</span>
            </div>

        </div>

    </div>
    <!-- Fim DashBaord-->
    <br/>
    <div class="functable">
        <table class="table table-bordered table-sm text-center">
            <thead>
            <th width="1%">#</th>
            <th width="10%">Nome</th>
            <th width="10%">Tempo</th>
            <th width="10%">Hr Solicitada</th>
            <th width="20%">Opções</th>
            </thead>
            <tbody>
            @foreach($fila as $dados)
                @php
                    $disabled = $dados->sequencia == 1 ? 'disabled': '';
                    $last = $dados->sequencia == count($fila) ? 'disabled': '';
                @endphp
            <tr>
                <th scope="row">{{ $dados->sequencia }}</th>
                <th>{{ ucfirst(mb_strtolower($dados->nome, 'UTF-8')) }}</th>
                <th>{{ $dados->tempo }}</th>
                <th>{{ date("H:m",strtotime($dados->solicitado)) }}</th>
                <th>
                    <button class="btn btn-sm btn-white" onclick="FilaAcao('avancar',{{ $dados->id }})" {{ $disabled }}><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>
                    <button class="btn btn-sm btn-white" onclick="FilaAcao('voltar',{{ $dados->id }})" {{ $last }}><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="FilaAcao('remover',{{ $dados->id }})"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                    <button class="btn btn-sm btn-success" onclick="FilaAcao('adiantar',{{ $dados->id }})" {{ $disabled }}><i class="fa fa-fast-forward" aria-hidden="true"></i></button>
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection