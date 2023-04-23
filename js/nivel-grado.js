$(document).ready(function(){
    $("#nivel").change(function () {
        $('#grado').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $("#nivel option:selected").each(function () {
            idNivel = $(this).val();
            $.post("./ajax_grado.php", { idNivel: idNivel }, function(data){
                $("#grado").html(data);
            });            
        });
    })
});

