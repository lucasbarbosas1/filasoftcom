@extends("layout.master",["title"=>$title])
@extends("layout.assets")
@section("content")
    <div class="main">
        <p style="font-size: xx-large;">Colaboradores</p>
        <br/>
        <hr style="margin-top: -40px;">
        <div class="">
            <table class="table table-striped table-bordered table-hover text-center table-sm" style="width: 80%;margin-left: 5%;">
                <thead>
                <tr>
                    <td width="5%">#</td>
                    <td width="20%">Nome</td>
                    <td width="10%">Intervalo 10 Min</td>
                    <td width="10%">Intervalo 20 Min</td>
                    <td width="10%">Tipo Horario</td>
                    <td width="5%">Dobrando</td>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($lista as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ ucfirst(mb_strtolower($data->nome,"utf-8")) }}</td>
                    <td>{{ $data->countDez }}</td>
                    <td>{{ $data->countVinte }}</td>
                    <td>{{ $data->tipoHorario == 1 ? "Estagiario":"Fixo" }}</td>
                    <td>{{ $data->Dobrando == 1 ? "Sim":"Não" }}</td>
                </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    </html>


@endsection