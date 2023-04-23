var conHermano = document.getElementById('siHermanos'),
    sinHermano = document.getElementById('noHermanos'),
    divnumHijo = document.getElementById('div-num-hijo'),
    divnumHermano = document.getElementById('div-num-hermano'),
    divHermanoM = document.getElementById('hermanosM'),
    siHermanoM = document.getElementById('siHermanosM'),
    noHermanoM = document.getElementById('noHermanosM'),
    divCantidadHM = document.getElementById('div-num-HM'),
    divInfoH = document.getElementById('infoH'),
    siAlergias = document.getElementById('siAlergia'),
    noAlergias = document.getElementById('noAlergia'),
    divAdi = document.getElementById('divAdicional');

var siPadre = document.getElementById('siPapa'),
    noPadre = document.getElementById('noPapa'),
    textoP = document.getElementById('textPadre'),
    divPadre = document.getElementById('padreNR');

var siIngresosP = document.getElementById('siIngresoP'),
    noIngresosP = document.getElementById('noIngresoP'),
    divIngresosP = document.getElementById('ingresoP'),
    divPreguntaUNTP = document.getElementById('preguntaUNTP'),
    siTraUNTP = document.getElementById('siTrabajaUNTP'),
    noTraUNTP = document.getElementById('noTrabajaUNTP'),
    divTrabajaUNTPadre = document.getElementById('divtrabajaUNTP');

var siMadre = document.getElementById('siMadre'),
    noMadre = document.getElementById('noMadre'),
    textoM = document.getElementById('textMadre'),
    divPreguntaMR = document.getElementById('madreR'),
    siMadreR = document.getElementById('siMR'),
    noMadreR = document.getElementById('noMR'),
    divMadreRdni = document.getElementById('divMR'),
    divMadre = document.getElementById('madreNR');

var siIngresosM = document.getElementById('siIngresoM'),
    noIngresosM = document.getElementById('noIngresoM'),
    divIngresosM = document.getElementById('ingresoM'),
    divMreguntaUNTM = document.getElementById('preguntaUNTM'),
    siTraUNTM = document.getElementById('siTrabajaUNTM'),
    noTraUNTM = document.getElementById('noTrabajaUNTM'),
    divTrabajaUNTMadre = document.getElementById('divtrabajaUNTM');

var siIngresosA = document.getElementById('siIngresoA'),
    noIngresosA = document.getElementById('noIngresoA'),
    divIngresosA= document.getElementById('ingresoA');

var i = 0, aux = 0;
var c = false;
var v = true;



conHermano.addEventListener('click',() => {
    if(divnumHijo.style.display==='none' && divnumHermano.style.display==='none' && divHermanoM.style.display==='none'){
        divnumHijo.style.display ='block';
        divnumHermano.style.display ='block';
        divHermanoM.style.display ='block';
    }    
});


sinHermano.addEventListener('click',() => {
    if(divnumHijo.style.display==='block' && divnumHermano.style.display ==='block' && divHermanoM.style.display==='block'  || divInfoH.style.display==='block'){
        divnumHijo.style.display ='none';
        divnumHermano.style.display ='none';
        divHermanoM.style.display='none';
        divInfoH.style.display ='none';      
        document.getElementById('numH').value = "";
        document.getElementById('cantH').value = "";
        siHermanoM.checked = false;
        noHermanoM.checked = false;
    }
});

function validar() {
    if ($("#cantH").val().length == 0 || $("#cantH").val()==0) {
      alert('Ingrese numero de hermanos');
      c = true;
      return c;
    }
};

function vacio(){ 
    if($('#infoH').html()==""){
        v = false;
    }else{
        v = true;
    }
    return v;
};

siHermanoM.addEventListener('click',() => {
    if(divInfoH.style.display==='none' && divCantidadHM.style.display==='none' && validar()!=true && vacio()==true) {
        divInfoH.style.display ='block';
        divCantidadHM.style.display ='block';
        i = i+1;
        aux = i;                       
        var nuevo='<div id="divHermano'+i+'" class="infoH"><div  class="input-group mb-3"><div class="form-group col-md-6"><label class="font-text">Apellido Paterno<span class="text-danger"> *Hermano</span></label><input type="text" name="apePaternoH'+i+'" id="apPaternoH'+i+'" class="form-control" placeholder="Ingrese apellido paterno"></div><div  class="form-group col-md-6"><label class="font-text">Apellido Materno<span class="text-danger"> *Hermano</span></label><input type="text" name="apeMaternoH'+i+'" id="apMaternoH'+i+'" class="form-control" placeholder="Ingrese apellido materno"></div><div  class="form-group col-md-8"><label class="font-text">Nombres<span class="text-danger"> *Hermano</span></label><input type="text" name="nombreH'+i+'"  id="nombreH'+i+' "class="form-control" placeholder="Ingrese sus nombres"></div><div  class="form-group col-md-4"><label class="font-text">DNI<span class="text-danger"> *Hermano</span></label><input type="number" name="dniH'+i+'"  id="dniH'+i+'" class="form-control" placeholder="Ingrese DNI"></div><div id="nivelH"  class="form-group col-md-4"><label class="font-text">Nivel Educativo<span class="text-danger"> *Hermano</span></label><select class="form-select" name="nivel-hermano'+i+'" id="nivelHermano'+i+'"><option value="0">Seleccionar</option><option value="1">Inicial</option><option value="2">Primaria</option><option value="3">Secundaria</option></select></div><div id="gradoH"  class="form-group col-md-4"><label class="font-text">Grado Académico<span class="text-danger"> *Hermano</span></label><select class="form-select" name="grado-hermano'+i+'" id="gradoHermano'+i+'"><option selected value="0">Seleccionar</option><option value = "1">3 años</option><option value = "2">4 años</option><option value = "3">5 años</option><option value = "4">Primero</option><option value = "5">Segundo</option><option value = "6">Tercero</option><option value = "7">Cuarto</option><option value = "8">Quinto</option><option value = "9">Sexto</option></select></div><div id="seccionH" class="form-group col-md-4"><label class="font-text">Sección<span class="text-danger"> *Hermano</span></label><input type="text" name="seccion-hermano'+i+'" id="seccionHermano'+i+'" class="form-control" placeholder="Ingrese su sección"></div></div></div>';      
        $('#new-infoH').append(nuevo);
    }else{
        siHermanoM.checked = false;
    }
});

noHermanoM.addEventListener('click',() => {
    if(divInfoH.style.display==='block' && divCantidadHM.style.display==='block'){
        $('#eliminarH').empty();
        $('#new-infoH').empty();
        divInfoH.style.display ='none';
        divCantidadHM.style.display='none';
        for(i=0;i<aux; i++){
            document.getElementById('apPaternoH'+i+'').value = "";
            document.getElementById('apMaternoH'+i+'').value = "";
            document.getElementById('nombreH'+i+'').value = "";
            document.getElementById('dniH'+i+'').value = "";
        }  
    } 
});

function limpiar(){
    var activo = document.activeElement.id;
    activo.innerHTML = "";
};


$('#agregarH').click(function() {
    var cantidadHM = $("#numHM").val();
    var cantidadH = $("#cantH").val();
    if(cantidadHM<=cantidadH){
        if(i<=(cantidadHM-1)){
            i = i+1;
            aux=i;
            var nuevo='<div id="divHermano'+i+'" class="infoH"><div  class="input-group mb-3"><div class="form-group col-md-6"><label class="font-text">Apellido Paterno<span class="text-danger"> *Hermano</span></label><input type="text" name="apePaternoH'+i+'" id="apPaternoH'+i+'" class="form-control" placeholder="Ingrese apellido paterno"></div><div  class="form-group col-md-6"><label class="font-text">Apellido Materno<span class="text-danger"> *Hermano</span></label><input type="text" name="apeMaternoH'+i+'" id="apMaternoH'+i+'" class="form-control" placeholder="Ingrese apellido materno"></div><div  class="form-group col-md-8"><label class="font-text">Nombres<span class="text-danger"> *Hermano</span></label><input type="text" name="nombreH'+i+'"  id="nombreH'+i+' "class="form-control" placeholder="Ingrese sus nombres"></div><div  class="form-group col-md-4"><label class="font-text">DNI<span class="text-danger"> *Hermano</span></label><input type="number" name="dniH'+i+'"  id="dniH'+i+'" class="form-control" placeholder="Ingrese DNI"></div><div id="nivelH"  class="form-group col-md-4"><label class="font-text">Nivel Educativo<span class="text-danger"> *Hermano</span></label><select class="form-select" name="nivel-hermano'+i+'" id="nivelHermano'+i+'"><option value="0">Seleccionar</option><option value="1">Inicial</option><option value="2">Primaria</option><option value="3">Secundaria</option></select></div><div id="gradoH"  class="form-group col-md-4"><label class="font-text">Grado Académico<span class="text-danger"> *Hermano</span></label><select class="form-select" name="grado-hermano'+i+'" id="gradoHermano'+i+'"><option selected value="0">Seleccionar</option><option value = "1">3 años</option><option value = "2">4 años</option><option value = "3">5 años</option><option value = "4">Primero</option><option value = "5">Segundo</option><option value = "6">Tercero</option><option value = "7">Cuarto</option><option value = "8">Quinto</option><option value = "9">Sexto</option></select></div><div id="seccionH" class="form-group col-md-4"><label class="font-text">Sección<span class="text-danger"> *Hermano</span></label><input type="text" name="seccion-hermano'+i+'" id="seccionHermano'+i+'" class="form-control" placeholder="Ingrese su sección"></div></div></div>';      
            $('#new-infoH').append(nuevo);
            if(i==2 && $('#new-infoH').html()!=""){
                var btnEliminar = '<span class=""><ion-icon class="ion-icon icon" name="remove-outline"></ion-icon></span>';
                $('#eliminarH').append(btnEliminar);
    
            }
            aux = i;
        }else{
            alert('Ha sobrepasado el numero de hermanos');
        }
    }else{
        alert("El numero de hermanos matriculados es mayor a su cantidad de hermanos, vuelva a ingresar la cantidad");
    }
    

});


$('#eliminarH').click(function() {
    var cantidadH = $("#numHM").val();
    if (i> 0 || i<cantidadH) { 
        $('#divHermano'+i).remove(); 
        i = i-1;
        aux = i;
    }else{
        alert('No puede eliminar un hermano');
    }
    if(i==1){
        $('#eliminarH').empty();
    }


});

siAlergias.addEventListener('click', () => {
    if(divAdi.style.display==='none'){
        divAdi.style.display ='block';
    }
});

noAlergias.addEventListener('click', () => {
    if(divAdi.style.display==='block'){
        divAdi.style.display ='none';
    }
});

siPadre.addEventListener('click', () => {
    if(textoP.style.display==='none' && divPadre.style.display==='none' || divPreguntaUNTP.style.display==='none'|| divTrabajaUNTPadre.style.display==='none'){
        textoP.style.display ='block';
        divPadre.style.display ='block';
        siIngresosP.checked = false;
        noIngresosP.checked = false;
        divIngresosP.style.display='none';
        divPreguntaUNTP.style.display='none';
        siTraUNTP.checked = false;
        noTraUNTP.checked = false;
        divTrabajaUNTPadre.style.display='none';
        document.getElementById('ingresoMP').value = "";
        document.getElementById('unidadUNTP').value = "";
        document.getElementById('apePaternoPadre').value = "";
        document.getElementById('apeMaternoPadre').value = "";
        document.getElementById('nombrePadre').value = "";
        document.getElementById('fechNacP').value = "";
        document.getElementById('nacionalidadPadre').value = "";
        document.getElementById('dniP').value = "";
        document.getElementById('religionP').value = "";
        document.getElementById('telefonoP').value = "";
        document.getElementById('celularP').value = "";
        document.getElementById('correoP').value = "";
        document.getElementById('lugarTraP').value = "";
        document.getElementById('funcionTraP').value = "";
    }
});

noPadre.addEventListener('click', () => {
    if(textoP.style.display==='block' && divPadre.style.display==='block' ){
        textoP.style.display ='none';
        divPadre.style.display ='none';
        siTraUNTP.checked = false;
        noTraUNTP.checked = false;
        $('#estadoCivilPadre').val('0')
        $('#condicionLaboralP').val('0')
        $('#intruccionP').val('0')
    }
});

siIngresosP.addEventListener('click', () => {
    if(divIngresosP.style.display==='none' && divPreguntaUNTP.style.display==='none'){
        divIngresosP.style.display='block';
        divPreguntaUNTP.style.display='block';
    }
});

noIngresosP.addEventListener('click', () => {
    if(divIngresosP.style.display==='block' && divPreguntaUNTP.style.display==='block' || divTrabajaUNTPadre.style.display==='block'){
        divIngresosP.style.display='none';
        divPreguntaUNTP.style.display='none';
        siTraUNTP.checked = false;
        noTraUNTP.checked = false;
        divTrabajaUNTPadre.style.display='none';
        document.getElementById('ingresoMP').value = "";
        $('#condicionLaboralP').val('0')
    }
});

siTraUNTP.addEventListener('click', () => {
    if(divTrabajaUNTPadre.style.display==='none'){
        divTrabajaUNTPadre.style.display='block';
    }  
});

noTraUNTP.addEventListener('click',() => {
    if(divTrabajaUNTPadre.style.display==='block'){
        divTrabajaUNTPadre.style.display='none';
        document.getElementById('unidadUNTP').value = "";
        $('#condicionLaboralP').val('0')
    }  
});


siMadre.addEventListener('click', () => {
    if(textoM.style.display==='none' && divMadre.style.display==='none' || divMreguntaUNTM.style.display==='none'|| divTrabajaUNTMadre.style.display==='none'){
        textoM.style.display ='block';
        divMadre.style.display ='block';
        siIngresosM.checked = false;
        noIngresosM.checked = false;
        divIngresosM.style.display='none';
        divMreguntaUNTM.style.display='none';
        divTrabajaUNTMadre.style.display='none';
        siTraUNTM.checked = false;
        noTraUNTM.checked = false;
        document.getElementById('ingresoMM').value = "";
        document.getElementById('unidadUNTM').value = "";
        document.getElementById('apeMaternoMadre').value = "";
        document.getElementById('apeMaternoMadre').value = "";
        document.getElementById('nombreMadre').value = "";
        document.getElementById('fechNacM').value = "";
        document.getElementById('nacionalidadMadre').value = "";
        document.getElementById('dniM').value = "";
        document.getElementById('religionM').value = "";
        document.getElementById('telefonoM').value = "";
        document.getElementById('celularM').value = "";
        document.getElementById('correoM').value = "";
        document.getElementById('lugarTraM').value = "";
        document.getElementById('funcionTraM').value = "";       
    }
});

noMadre.addEventListener('click', () => {
    if(textoM.style.display==='block' && divMadre.style.display==='block' ){
        textoM.style.display ='none';
        divMadre.style.display ='none';
        siTraUNTM.checked = false;
        noTraUNTM.checked = false;
        $('#estadoCivilPadre').val('0')
        $('#condicionLaboralP').val('0')
        $('#intruccionP').val('0')
    }
});

// siMadreR.addEventListener('click', () => {
//     if(divMadreRdni.style.display==='none' || divMadre.style.display==='block' ){
//         divMadreRdni.style.display ='block';
//         divMadre.style.display ='none';
//         siTraUNTM.checked = false;
//         noTraUNTM.checked = false;
//         $('#estadoCivilPadre').val('0')
//         $('#condicionLaboralP').val('0')
//         $('#intruccionP').val('0')
//     }
// });

// noMadreR.addEventListener('click', () => {
//     if(divMadreRdni.style.display==='block' || divMadre.style.display==='none' || divMreguntaUNTM.style.display==='block'|| divTrabajaUNTMadre.style.display==='block'){
//         divMadreRdni.style.display ='none';
//         divMadre.style.display ='block';
//         siIngresosM.checked = false;
//         noIngresosM.checked = false;
//         divIngresosM.style.display='none';
//         divMreguntaUNTM.style.display='none';
//         divTrabajaUNTMadre.style.display='none';
//         siTraUNTM.checked = false;
//         noTraUNTM.checked = false;
//         document.getElementById('ingresoMM').value = "";
//         document.getElementById('unidadUNTM').value = "";
//         document.getElementById('apeMaternoMadre').value = "";
//         document.getElementById('apeMaternoMadre').value = "";
//         document.getElementById('nombreMadre').value = "";
//         document.getElementById('fechNacM').value = "";
//         document.getElementById('nacionalidadMadre').value = "";
//         document.getElementById('dniM').value = "";
//         document.getElementById('religionM').value = "";
//         document.getElementById('telefonoM').value = "";
//         document.getElementById('celularM').value = "";
//         document.getElementById('correoM').value = "";
//         document.getElementById('lugarTraM').value = "";
//         document.getElementById('funcionTraM').value = "";
//     }
// });

siIngresosM.addEventListener('click', () => {
    if(divIngresosM.style.display==='none' && divMreguntaUNTM.style.display==='none'){
        divIngresosM.style.display='block';
        divMreguntaUNTM.style.display='block';
    }
});

noIngresosM.addEventListener('click', () => {
    if(divIngresosM.style.display==='block' && divMreguntaUNTM.style.display==='block' || divTrabajaUNTMadre.style.display==='block'){
        divIngresosM.style.display='none';
        divMreguntaUNTM.style.display='none';
        siTraUNTM.checked = false;
        noTraUNTM.checked = false;
        divTrabajaUNTMadre.style.display='none';
        document.getElementById('ingresoMM').value = "";
        document.getElementById('condicionLaboralM').value = '0';
        $('#condicionLaboralP').val('0')
    }
});

siTraUNTM.addEventListener('click', () => {
    if(divTrabajaUNTMadre.style.display==='none'){
        divTrabajaUNTMadre.style.display='block';
    }  
});

noTraUNTM.addEventListener('click',() => {
    if(divTrabajaUNTMadre.style.display==='block'){
        divTrabajaUNTMadre.style.display='none';
        document.getElementById('unidadUNTM').value = "";
        $('#condicionLaboralP').val('0')
    }  
});


siIngresosA.addEventListener('click', () => {
    if(divIngresosA.style.display==='none'){
        divIngresosA.style.display='block';
    }
});

noIngresosA.addEventListener('click', () => {
    if(divIngresosA.style.display==='block'){
        divIngresosA.style.display='none';
        document.getElementById('ingresoApoderado').value = "";
    }
});
