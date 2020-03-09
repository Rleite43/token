function criarEvento(data) {
    var table = $("<table id='customers'>")
    console.log(data[0].nome)
    table.append("<tr><th>Atividade</th><th>Inicio</th><th>Fim</th><th>Editar</th><th>Excluir</th></tr>")

    data.forEach(d => {
        var id = $("<tr>")
        var row = $("<tr id='" + d.id + "'>")
        var descricao = $("<td>")
        var inicio = $("<td>")
        var fim = $("<td>")
        var editar = $("<td>")
        var excluir = $("<td>")

        descricao.append(d.nome);
        inicio.append(d.i_date);
        fim.append(d.f_date);
        editar.append("<a href='editar.html?id=" + d.id + "'>Editar</a>");
        excluir.append("<button id='" + d.id + "'>Excluir</button>");
        row.append(descricao)
        row.append(inicio)
        row.append(fim)
        row.append(editar)
        row.append(excluir)

        table.append(row)


    });

    console.log(data[0].nome)
    return table;


}

$(document).ready(function() {
    $.getJSON("http://localhost/token/listar.php", function(data) {
        $("main").empty();
        var eventos = criarEvento(data);
        $("main").append(eventos);
    })

    $("main").on("click", "button", (e) => {
        id = e.target.getAttribute("id");

        if (confirm("Tem certeza que deseja excluir?")) {
            $.ajax({
                url: "http://localhost/token/deletar.php",
                type: "GET",
                data: "id=" + id,
                success: function(id) {
                    alert("Excluido com sucesso")
                }
            })
        }
    });
})