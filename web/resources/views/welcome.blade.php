@extends("layout.assets")
@extends("layout.menu")
@section("content")
    <div style="width: 500px; margin-left: 35%; margin-top: 10%;">
        <?php
        if(isset($_SESSION["msg"]))
            echo "<script>alert('".$_SESSION["msg"]."')</script>";
        ?>
        <form action="" method="post">
            <p class="h5 text-center mb-2">Login</p>
            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="defaultForm-email" name="user" class="form-control">
                <label for="defaultForm-email">Usuario</label>
            </div>
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="defaultForm-pass" name="pass" class="form-control">
                <label for="defaultForm-pass">Senha</label>
            </div>
            <div class="text-center">
                <button class="btn orange lighten-2">Login</button>
            </div>
        </form>
        <!-- Form login -->
    </div>

@endsection
