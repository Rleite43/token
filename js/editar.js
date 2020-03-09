function getParameter(theParameter) {
    var params = window.location.search.substr(1).split('&');

    for (var i = 0; i < params.length; i++) {
        var p = params[i].split('=');
        if (p[0] == theParameter) {
            return decodeURIComponent(p[1]);
        }
    }
    return false;
}

function preencherForm(id) {
    $.getJSON("http://localhost/token/listar_esp.php", "id=" + id, function(data) {
        $("[name=id]").val(id);
        $("[name=nome]").val(data.nome);
        $("[name=i_date]").val(data.i_date);
        $("[name=f_date]").val(data.f_date);
    });
}
$(document).ready(function() {
    var id = getParameter("id")
    preencherForm(id)
    $("body").on("submit", "form", function(e) {
        e.preventDefault();
        $.ajax({
            url: "http://localhost/token/editar.php",
            method: "POST",
            data: $(this).serialize(),
            success: function() {
                alert('Editado com sucesso!')
                window.location.href = 'http://localhost/token/listar.html'
            }
        });
        console.log($(this).serializeArray());
        $(this).trigger("reset");
    });
});
s