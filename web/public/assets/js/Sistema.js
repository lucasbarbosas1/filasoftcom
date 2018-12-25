function TesteDb() {
    $.ajax({
        type: 'GET',
        url: baseurl+"/testdb",
        data: $("#formdb").serialize(),
        dataType: 'JSON',
        success: function(jsonData) {
            alert(jsonData.retorno);
        },
        error: function() {
            alert("Não foi possivel Conectar");
        }
    });
}

$(function() {
    GetAtivar();
    ChangeCheck();
    $("#togglebutton").button('toggle');
});

function ChangeCheck()
{
    $('#toggle-event').change(function() {
        var toogle = $(this).prop('checked');
        PostAtivar(toogle == true ? 1:0);
        if(toogle == true)
        {
            $("#statusled").removeClass("led-red");
            $("#statusled").attr('class', 'led-green');
        }
        else
        {
            $("#statusled").removeClass("led-green");
            $("#statusled").attr('class', 'led-red');
        }
    })
}

function PostAtivar(status)
{
    $.ajax({
        type: "POST",
        data: {Form: status, _token: _token },
        url: baseurl+"setstatus",
        dataType: "JSON",
        success: function (data) {
            console.log(data.Error);
        },
        error: function (data) {
            console.log(data.Error);
        }
    })
}

function SetSatus(result)
{
    $('#toggle-event').prop('checked',result).change();
}

function GetAtivar()
{
    $.ajax({
        type: 'GET',
        url: baseurl+"getstatus",
        dataType: 'JSON',
        success: function(jsonData) {
            SetSatus(jsonData.Status);
        },
        error: function(data) {
            alert("Não foi possivel conectar.");
        }
    });
}

function Desativar(id,desativado) {
    var texto = "";
    var tipo = "";
    if(desativado == "Ativo")
    {
        texto = "Você deseja desativar.";
        tipo = "desative!";
        desativado = 1;
    }
    else
    {
        texto = "Você deseja ativar.";
        tipo = "ative!";
        desativado = 0;
    }
    swal({
        title: 'Voce tem certesa ?',
        text: texto,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, '+tipo,
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            if(!ajaxdesativar(id,desativado)){
                swal({
                    title:"Pronto!",
                    message:"Solicitação concluida!",
                    type:"success"
                }).then((result) => {
                    window.location.reload();
                });
            }
            else
            {
                swal({
                    title:"Erro!",
                    message:"Tente novamente!",
                    type:"error"
                }).then((result) => {
                    window.location.reload();
                });
            }
        }
    });
}

function ajaxdesativar(id,desativado)
{
    $.ajax({
        type: 'GET',
        url: baseurl+"/login/desativar",
        data: {Codigo: id,Desativado: desativado},
        dataType: 'JSON',
        success: function(jsonData) {
            console.log(jsonData.msg);
            return true;
        },
        error: function(jsonData) {
            return false;
        }
    });
}

function AlterarSenhaModal(id) {
    console.log(id);
    $("#altsenhamodal").modal('show');
    document.getElementById("idfunc").value = id;
}


function FilaAcao(acao,id) {
    switch (acao)
    {
        case 'avancar':
            Passar(id);
            break;
        case 'voltar':
            Voltar(id);
            break;
        case 'remover':
            Excluir(id);
            break;
        case 'adiantar':
            Adiar(id);
            break;
        default:
            alert("Não foi possivel identificar a ação.");
            break;
    }
}