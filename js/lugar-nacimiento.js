$(document).ready(function(){
    $("#departamento").change(function () {
        $('#distrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $("#departamento option:selected").each(function () {
            idDepartamento = $(this).val();
            $.post("./ajax_provincias.php", { idDepartamento: idDepartamento }, function(data){
                $("#provincia").html(data);
            });            
        });
    })
});

$(document).ready(function(){
    $("#provincia").change(function () {
        $("#provincia option:selected").each(function () {
            idProvincia = $(this).val();
            $.post("./ajax_distritos.php", { idProvincia: idProvincia }, function(data){
                $("#distrito").html(data);
            });            
        });
    })
});
