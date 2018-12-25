function Adiar(idfila)
{
    $.get(baseurl+"/fila/adiantar/"+idfila,function (data) {
        swal({
            title: "Concluido",
            text: "Deletado com sucesso."
        }).then((result) => {
            window.location.reload();
        });
    });
}

function Excluir(idfila)
{
    $.getJSON(baseurl+"/fila/deletar/"+idfila,function (data) {
        swal({
            title: "Concluido",
            text: "Deletado com sucesso."
        }).then((result) => {
            window.location.reload();
        });
    });
}

function Passar(idfila)
{
    $.get(baseurl+"/fila/subir/"+idfila,function (data) {
        swal({
            title: "Concluido",
            text: "Alterado com sucesso."
        }).then((result) => {
            window.location.reload();
        });
    });
}

function Voltar(idfila)
{
    $.get(baseurl+"/fila/voltar/"+idfila,function () {
        swal({
            title: "Concluido",
            text: "Alterado com sucesso."
        }).then((result) => {
            window.location.reload();
        });
    });
}