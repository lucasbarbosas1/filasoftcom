@extends("layout.master",["title"=>$title])
@extends("layout.assets")
@section("content")
    @if (session('Status'))
        <script>
            window.onload = function()
            {
                swal(
                    "Alerta",
                    "{{ session('Status') }}",
                    "success"
                )
            };
        </script>
    @endif
    <div class="main">
    <p style="font-size: xx-large;">Atualizador</p>
    <br/>
    <hr style="margin-top: -50px;">
    <div class="">
    </div>
        {{ Form::open(array('url' => 'atualizador','class'=>"form-horizontal","enctype"=>"multipart/form-data")) }}
        <div class="form-group">
            <label for="exampleFormControlFile1"></label>
            <input type="file" class="form-control-file" name="photo" id="exampleFormControlFile1">
            <input type="submit">
        </div>
        </form>
    </div>
</div>
@endsection