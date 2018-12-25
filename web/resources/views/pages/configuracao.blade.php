@extends("layout.master",["title"=>$title])
@extends("layout.assets")
@section("content")

    <!--
        TODO: Arruma o layout da pagina de configuração para tempo de espera para o desktop e painel.
    !-->

    <div class="main">
    <p style="font-size: xx-large;">Configuração</p>
    <br/>
    <hr style="margin-top: -50px;">
    <div class="config-div">
        <p style="font-size: x-large; margin-left: 50px;">Database</p>
        {{ Form::open(array('url' => 'configuracao','class'=>"form-horizontal","style"=>"0px; right: 20px;","id"=>"formdb")) }}
            <div class="md-form">
                <input type="text" id="defaultForm-email" name="host" class="form-control" value="{{ $config->dbHost }}">
                <label for="defaultForm-email">DbHost</label>
            </div>
            <div class="md-form">
                <input type="text" id="defaultForm-email" name="port" class="form-control" value="{{ $config->dbPort }}">
                <label for="defaultForm-email">DbPort</label>
            </div>
            <div class="md-form">
                <input type="text" id="defaultForm-pass" name="username" class="form-control" value="{{ $config->dbUser }}">
                <label for="defaultForm-pass">DbUser</label>
            </div>
            <div class="md-form">
                <input type="text" id="defaultForm-pass" name="password" class="form-control" value="{{$config->dbPass}}">
                <label for="defaultForm-pass">DbPass</label>
            </div>
            <div class="md-form">
                <input type="text" id="defaultForm-pass" name="database" class="form-control" value="{{$config->dbDatabase}}">
                <label for="defaultForm-pass">DbDatabase</label>
            </div>
            <div class="text-center">
                <button class="btn btn-success">Salvar</button>
            </div>
        </form>
        <button class="btn btn-primary" onclick="TesteDb()">Testar Conexão</button>
    </div>
        <div class="config-div" style="margin-left:250px;">
        <p style="font-size: x-large; margin-left: 70px;">Fila</p>
        {{ Form::open(array('url' => 'configuracao','class'=>"form-horizontal","id"=>"formdb")) }}
            <div class="md-form">
                <input type="number" id="defaultForm-pass" max="120" name="painel" class="form-control" value="">
                <label for="defaultForm-pass">Tempo Painel (Segundos) </label>
            </div>
            <div class="md-form">
                <input type="number" id="defaultForm-pass" name="desktop" class="form-control" value="">
                <label for="defaultForm-pass">Tempo Desktop (Minutos) </label>
            </div>
            <div class="text-center">
                <button class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection