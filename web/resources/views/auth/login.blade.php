@extends("layout.master",["title"=>"Login"])
@extends("layout.assets")
@section("content")
    <div style="width: 500px; margin-left: 35%; margin-top: 10%;">
        @if (Session::has('flash_error'))
            <div class="alert alert-danger">{{ Session::get('flash_error') }}</div>
        @endif
        {{
            Form::open( array(
                "url"=>"login/entrar",
            ))
        }}
            <p class="h5 text-center mb-2">Login</p>
            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="defaultForm-email" name="login" class="form-control">
                <label for="defaultForm-email">Usuario</label>
            </div>
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="defaultForm-pass" name="senha" class="form-control">
                <label for="defaultForm-pass">Senha</label>
            </div>
            <div class="text-center">
                <button class="btn orange lighten-2">Login</button>
            </div>
        {{ Form::close() }}
        <!-- Form login -->
    </div>
@endsection