<?php
    include('ajax/ajax_departamentos.php');
    include("ajax/ajax_nivel.php");
    include('ajax/ajax_tipoderesponsable.php');
    include('ajax/ajax_tipoIE.php');
    include('ajax/ajax_tipoFamilia.php');
    include('ajax/ajax_tipoVivienda.php');
    include('ajax/ajax_seguroMedico.php');
    include('ajax/ajax_gradoInstruccion.php');
    include('ajax/ajax_estadocivil.php');
    include('ajax/ajax_condicionlaboral.php');
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="libs/jquery-3.6.1.min.js" charset="utf-8"></script>
    <script src="libs/jquery.js" charset="utf-8"></script>
    <script language="JavaScript" src="js/lugar-nacimiento.js?32"></script>
    <script language="JavaScript" src="js/nivel-grado.js?3589"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css?1452">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="imagenes/logo1.png">
    <!--BDP-->
    <script src="libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
    <link rel= "stylesheet" href="libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <title>Ficha de Nuevos Postulantes</title>
  </head>
  <body>
    <!--Cabecera-->
    <header class="header">
      <nav class="navbar navbar-light background">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="" alt="" width="55" height="49" class="d-inline-block"><div class="d-inline-block text">
              Colegio X
            </div>
          </a>
          <button class="btn btn-primary"> <div class="d-inline-block text">Iniciar Sesion</div></button>
        </div>
      </nav>
    </header>
    <!--Formulario---->
    <div class="container mb-4">
      <div class="card">
        <p class="texto">Ficha de Postulantes Nuevos 2023</p>
        <div class="cuadrado"> 
          <form  name="form-work" method="POST" action="bd/registrar.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="font-text">Fecha de Pago<span class="text-danger"> *Voucher</span></label>
              <div class="input-group date new-date">
                <input type="text"  class="form-control" name='fechaPago' required placeholder="Ingrese fecha"><span class="input-group-addon"><ion-icon name="calendar-outline" size="large" class="ion-icon  icon"></ion-icon></span>
              </div>
            </div>
            <div class="mb-3">
              <label class="font-text">N° de Operación del Voucher<span class="text-danger"> *Voucher</span></label>
              <input type="number" name="numoperacion" class="form-control" required placeholder="Ingrese número de operación">
            </div>
            <div class="mb-3">
              <label for="archivo" class="font-text">Adjunte foto del Voucher (max. 4MB)<span class="text-danger"> 
                *Voucher (formatos permitidos ".png", ".jpg", ".jpeg")</span></label>
              <input class="form-control" type="file" id="archivo" accept='image/*' name="archivoV">
            </div>
            <div class="input-group mb-3">
              <div class="form-group col-md-6">
                <label class="font-text">Nivel Educativo<span class="text-danger"> *Al que postula</span></label>
                <select class="form-select" name="nivel-postulante" id="nivel">
                  <option value="0">Seleccionar</option>
                    <?php while($rowNP = $nivelesP->fetch_assoc()) { ?>
                      <option value="<?php echo $rowNP["idNivel"]; ?>"><?php echo $rowNP["nombre"]; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="font-text">Grado Académico<span class="text-danger"> *Al que postula</span></label>
                <select class="form-select" name="grado-postulante" id="grado">
                  <option value="0" selected>Seleccionar</option>
                </select>
              </div>
            </div>
            <!--DATOS POSTULANTE-->
            <label class="subtitulo">Datos del Estudiante</label>
            <div class="input-group mb-3">
              <div class="form-group col-md-6">
                <label class="font-text">Apellido Paterno<span class="text-danger"> *Postulante</span></label>
                <input type="text" name="apePaterno" class="form-control" required placeholder="Ingrese apellido paterno">
              </div>
              <div class="form-group col-md-6">
                <label class="font-text">Apellido Materno<span class="text-danger"> *Postulante</span></label>
                <input type="text" name="apeMaterno" class="form-control" required placeholder="Ingrese apellido materno">
              </div>
            </div>
            <div class="mb-3">
              <label class="font-text">Nombres<span class="text-danger"> *Postulante</span></label>
              <input type="text" name="nombre" class="form-control" required placeholder="Ingrese sus nombres">
            </div>
            <div class="input-group mb-3">
              <div class="form-group col-md-6">
                <label class="font-text">DNI<span class="text-danger"> *Postulante</span></label>
                <input type="number" name="dniPostulante" class="form-control" required placeholder="Ingrese DNI">
              </div>
              <div class="form-group col-md-6">
                <label class="font-text">Sexo<span class="text-danger"> *Postulante</span></label>
                <select class="form-select" name="sexo-postulante" id="nivel">
                  <option selected>Seleccionar</option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="form-group col-md-5">
                <label class="font-text">Fecha de Nacimiento<span class="text-danger"> *Postulante</span></label>
                <div class="input-group date new-date">
                  <input type="text" class="form-control" name="fechaNacPos" required placeholder="Ingrese fecha"><span class="input-group-addon"><ion-icon name="calendar-outline" size="large" class="ion-icon icon"></ion-icon></span>
                </div>
              </div>
              <div class="form-group col-md-7">
                <label class="font-text">Institución Educativa de procedencia<span class="text-danger"> *Postulante</span></label>
                <select class="form-select" name="TipoIEpostulante" id="nivel">
                  <option value="0">Seleccionar</option>
                    <?php while($rowIE = $ie->fetch_assoc()) { ?>
                      <option value="<?php echo $rowIE['idTipoIE']; ?>"><?php echo $rowIE['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label class="font-text">Institución Educativa de procedencia<span class="text-danger"> *Postulante</span></label>
                <input type="text" name="IEpostulante" class="form-control" required placeholder="Ingrese nombre de la institución">
              </div>
              <div class="form-group col-md-4">
                <label class="font-text">Departamento<span class="text-danger"> *Lugar de Nacimiento</span></label>
                <select class="form-select" name="departamento" id="departamento">
                  <option value="0">Seleccionar departamento</option>
                    <?php while($row = $resultado->fetch_assoc()) { ?>
                      <option value="<?php echo $row['idDepartamento']; ?>"><?php echo $row['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="font-text">Provincia<span class="text-danger"> *Lugar de Nacimiento</span></label>
                <select class="form-select" name="provincia" id="provincia">
                  <option value="0">Seleccionar</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="font-text">Distrito<span class="text-danger"> *Lugar de Nacimiento</span></label>
                <select class="form-select" name="distrito" id="distrito">
                  <option value="0">Seleccionar</option>
                </select>
              </div>         
            </div>

            <div class="mb-2">
              <label class="font-text">¿Tiene hermanos?<span class="text-danger"> *Postulante</span></label>
              <div class="form-group col-md-5">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="siHermanos" type="radio" name="Hermano" value="siH">
                  <label class="form-check-label" >Si</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="noHermanos" type="radio" name="Hermano" id="inlineRadio2" value="noH">
                  <label class="form-check-label" >No</label>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <div id="div-num-hijo" style="display:none;" class="form-group col-md-6">
                <label class="font-text">¿Qué numero de hijo es?<span class="text-danger"> *(orden de entre los hermanos)</span></label>
                <input id="numH" type="number" name="numhijo" class="form-control" placeholder="Ingrese numero entero">
              </div> 
              <div id="div-num-hermano" style="display:none;" class="form-group col-md-6">
                <label class="font-text">¿Cuantos hermanos tiene?<span class="text-danger"> *(especificar)</span></label>
                <input id="cantH" type="number" name="numhermano" class="form-control" placeholder="Ingrese numero entero">
              </div> 
            </div>
            <div id="hermanosM" style="display:none;" class="mb-2">
              <label class="font-text">¿Tiene hermanos matriculados en el C.E.E. RAFAEL NARVÁEZ CADENILLAS?<span class="text-danger"> *Postulante</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="siHermanosM" type="radio" name="HermanoM" value="siHM">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="noHermanosM" type="radio" name="HermanoM" value="nHM">
                <label class="form-check-label"  for="inlineRadio2">No</label>
              </div>
            </div>
            <div id="div-num-HM" style="display:none;" class="form-group col-md-6">
                <label class="font-text">Cantidad de hermanos matriculados<span class="text-danger"> *Hermanos</span></label>
                <input id="numHM" type="number" name="numHermanoHM" class="form-control" placeholder="Ingrese numero entero">
                <label class="font-text">Agregue un formulario con el botón +<span class="text-danger"> *Hermanos</span></label>
            </div> 
            <!--info del hermano-->
            <div id="infoH" style="display:none;" class="infoH input-group mb-3">
              
              <div id="new-infoH" class="infoH">
                <!---add hermano matriculado-->
              </div>
              <!--botones-->
              <div class="form-group col-md-12">
                <div class="agregar-icon d-inline" id="agregarH">
                  <span class=""><ion-icon  class="ion-icon  icon" name="add-outline"></ion-icon></span>
                </div>  
                <div class="agregar-icon d-inline" id="eliminarH">
                  <!--btn-eliminar-->
                </div>
                <label class="font-text">Presione para añadir o quitar formulario </label>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="form-group col-md-6">
                <label class="font-text">Dirección<span class="text-danger"> *Postulante</span></label>
                <input type="text" name="direccion" class="form-control" required placeholder="Ingrese su direccion">
              </div>
              <div class="form-group col-md-6">
                <label class="font-text">Responsable<span class="text-danger"> *Postulante</span></label>
                <select class="form-select" name="tipoResponsable-postulante" id="tipoSeguro">
                  <option value="0">Seleccionar</option>
                    <?php while($rowTR = $responsables->fetch_assoc()) { ?>
                      <option value="<?php echo $rowTR['idTipoResponsable']; ?>"><?php echo $rowTR['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <div class="form-group col-md-4">
                <label class="font-text">Tipo de Familia<span class="text-danger"> *Postulante</span></label>
                <select class="form-select" name="tipoFam-postulante" id="tipoFam">
                  <option value="0">Seleccionar</option>
                    <?php while($rowTF = $fam->fetch_assoc()) { ?>
                      <option value="<?php echo $rowTF['idTipoFam']; ?>"><?php echo $rowTF['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="font-text">Tipo de Vivienda<span class="text-danger"> *Postulante</span></label>
                <select class="form-select" name="tipoVivienda-postulante" id="tipoVivienda">
                  <option value="0">Seleccionar</option>
                    <?php while($rowTV = $vivienda->fetch_assoc()) { ?>
                      <option value="<?php echo $rowTV['idTipoVivienda']; ?>"><?php echo $rowTV['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="font-text">Tipo de Seguro Salud<span class="text-danger"> *Postulante</span></label>
                <select class="form-select" name="tipoSeguro-postulante" id="tipoSeguro">
                  <option value="0">Seleccionar</option>
                    <?php while($rowTS = $seguroMedico->fetch_assoc()) { ?>
                      <option value="<?php echo $rowTS['idSeguroMedico']; ?>"><?php echo $rowTS['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>

            <div id="alergias" class="mb-2">
              <label class="font-text">¿Es alérgico a un medicamento u otro?<span class="text-danger"> *Postulante</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="siAlergia" type="radio" name="alergia" value="siA">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="noAlergia" type="radio" name="alergia" value="noA">
                <label class="form-check-label"  for="inlineRadio2">No</label>
              </div>
            </div>
            <div id="divAdicional" style="display:none;" class="mb-3">
              <label class="font-text">Ingrese detalle<span class="text-danger"> *Postulante</span></label>
              <input id="adicional" type="text" name="adicional" class="form-control" placeholder="Ingrese breve descripción">
            </div>
            <!--------------PADRE-------------->
            <div id="preguntaP" class="mb-3">
              <label class="font-text">¿Tiene Padre?<span class="text-danger"> *Postulante</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="siPapa" type="radio" name="padre" value="siP">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="noPapa" type="radio" name="padre" value="noP">
                <label class="form-check-label"  for="inlineRadio2">No</label>
              </div>
            </div>
            <label id="textPadre" style="display:none;" class="subtitulo">Datos del Padre</label>
            <!-- <div id="padreR" style="display:none;" class="mb-2">
              <label class="font-text">¿Alguna vez se ha registrado en este formulario?<span class="text-danger"> *Padre</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="siPR" type="radio" name="padreR" value="siPR">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="noPR" type="radio" name="padreR" value="noPR">
                <label class="form-check-label"  for="inlineRadio2">No</label>
              </div>
            </div>
            <div id="divPR" style="display:none;">
              <label class="font-text">DNI<span class="text-danger"> *Padre</span></label><br>
              <input id="dniPR" type="number" name="dniPadreR" class="form-control-input"  placeholder="Ingrese dni ya registrado">
            </div> -->

            <!----------INFO-DEL-PADRE--------------->
            <div id="padreNR" style="display:none;">
              <div class="input-group mb-3 infoH">
                <div class="form-group col-md-6">
                  <label class="font-text">Apellido Paterno<span class="text-danger"> *Padre</span></label>
                  <input type="text" id="apePaternoPadre" name="apePaternoP" class="form-control"  placeholder="Ingrese apellido paterno">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Apellido Materno<span class="text-danger"> *Padre</span></label>
                  <input type="text" id="apeMaternoPadre" name="apeMaternoP" class="form-control"  placeholder="Ingrese apellido materno">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Nombres<span class="text-danger"> *Padre</span></label>
                  <input type="text" id="nombrePadre" name="nombreP" class="form-control"  placeholder="Ingrese sus nombres">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Fecha de Nacimiento<span class="text-danger"> *Padre</span></label>
                  <div class="input-group date new-date">
                    <input type="text" id="fechNacP" name="fechaNacPa" class="form-control"  placeholder="Ingrese fecha"><span class="input-group-addon"><ion-icon name="calendar-outline" size="large" class="ion-icon icon"></ion-icon></span>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">Nacionalidad<span class="text-danger"> *Padre</span></label>
                  <input type="text" id="nacionalidadPadre" name="nacionalidadP" class="form-control"  placeholder="Ingrese su nacionalidad">
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">DNI<span class="text-danger"> *Padre</span></label>
                  <input id="dniP" type="number" name="dniP" class="form-control"  placeholder="Ingrese su dni">
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">Estado Civil<span class="text-danger"> *Padre</span></label>
                  <select class="form-select" name="estado-civilP" id="estadoCivilPadre">
                    <option value="0" >Seleccionar</option>
                    <?php while($rowEC = $estadocivilP->fetch_assoc()) { ?>
                      <option value="<?php echo $rowEC['idEstadoCivil']; ?>"><?php echo $rowEC['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Religión<span class="text-danger"> *Padre</span></label>
                  <input id="religionP" type="text" name="religionP" class="form-control"  placeholder="Ingrese su religión">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Grado de Instrucción y Mención<span class="text-danger"> *Padre</span></label>
                  <select class="form-select" name="grado-instruP" id="intruccionP">
                    <option value="0" >Seleccionar</option>
                    <?php while($rowGI = $instruccionP->fetch_assoc()) { ?>
                      <option value="<?php echo $rowGI['idGradoIns']; ?>"><?php echo $rowGI['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Telefono fijo<span class="text-danger"> *Padre</span></label>
                  <input id="telefonoP" type="number"  name="telefonoP" class="form-control"  placeholder="Ingrese su número de telefono">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Celular<span class="text-danger"> *Padre</span></label>
                  <input id="celularP" type="number" name="celularP" class="form-control"  placeholder="Ingrese su número de celular">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Correo Electrónico<span class="text-danger"> *Padre</span></label>
                  <input id="correoP" type="email" name="correoP" class="form-control"  placeholder="Ingrese su correo">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Lugar de trabajo<span class="text-danger"> *Padre</span></label>
                  <input id="lugarTraP" type="text" name="lugarTraP" class="form-control"  placeholder="Ingrese nombre del lugar">
                </div>
                <div class="form-group col-md-12">
                  <label class="font-text">Funcion que realiza<span class="text-danger"> *Padre</span></label>
                  <input id="funcionTraP" type="text" name="funcionTraP" class="form-control"  placeholder="Ingrese una breve descripción">
                </div>  
                <div class="form-group col-md-12">
                  <label class="font-text">¿Percibe usted algún ingreso mensual?<span class="text-danger"> *Padre</span></label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="siIngresoP" type="radio" name="padreI" value="siPIM">
                    <label class="form-check-label" >Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="noIngresoP" type="radio" name="padreI" value="noPIM">
                    <label class="form-check-label" >No</label>
                  </div>
                </div>
                <div id="ingresoP" style="display:none;" class="col-md-6">
                  <label class="font-text">Ingrese la cantidad de ingreso mensual<span class="text-danger"> *Padre</span></label>
                  <input id="ingresoMP" type="number" name="ingresoMP" class="form-control"  placeholder="Ingrese su ingreso mensual">
                </div>
                <div id="preguntaUNTP" style="display:none;" class="col-md-12">
                  <label class="font-text">¿Es docente o administrativo de la UNT?<span class="text-danger"> *Padre</span></label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="siTrabajaUNTP" type="radio" name="padreUNT" value="siTUNT">
                    <label class="form-check-label" >Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="noTrabajaUNTP" type="radio" name="padreUNT" value="noTUNT">
                    <label class="form-check-label" >No</label>
                  </div>
                </div>
                <div id="divtrabajaUNTP" style="display: none;">
                  <div class="input-group infoH">
                    <div class="form-group col-md-12">
                      <label class="font-text">Unidad Donde Labora<span class="text-danger"> *Padre</span></label>
                      <input id="unidadUNTM" type="text" name="unidadTrabajoUNTP" class="form-control"  placeholder="Ingrese nombre de la unidad">
                    </div>
                    <div class="form-group col-md-12"><label class="font-text">Condición Laboral<span class="text-danger"> *Padre</span></label>
                      <select class="form-select" name="condicionLP" id="condicionLaboralP">
                        <option value="5" selected>Seleccionar</option>
                        <?php while($rowCL = $condicionlaboralP->fetch_assoc()) { ?>
                          <option value="<?php echo $rowCL['idConLaboral']; ?>"><?php echo $rowCL['nombre']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!---------MADRE---------->
            <div id="preguntaM" class="mb-3">
              <label class="font-text">¿Tiene Madre?<span class="text-danger"> *Postulante</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="siMadre" type="radio" name="madre" value="siM">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="noMadre" type="radio" name="madre" value="noM">
                <label class="form-check-label"  for="inlineRadio2">No</label>
              </div>
            </div>
            <label id="textMadre" style="display:none;" class="subtitulo">Datos de la Madre</label>
            <!-- <div id="madreR" style="display:none;" class="mb-2">
              <label class="font-text">¿Alguna vez se ha registrado en este formulario?<span class="text-danger"> *Madre</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="siMR" type="radio" name="madreR" value="siMR">
                <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="noMR" type="radio" name="madreR" value="noMR">
                <label class="form-check-label"  for="inlineRadio2">No</label>
              </div>
            </div>
            <div id="divMR" style="display:none;" class="mb-3">
              <label class="font-text">DNI<span class="text-danger"> *Madre</span></label>
              <input id="dniMR" type="text" name="dniMadreR" class="form-control"  placeholder="Ingrese dni ya registrado">
            </div> -->
            <!----------INFO-DEL-MADRE--------------->
            <div id="madreNR" style="display:none;">
              <div class="input-group mb-3 infoH">
                <div class="form-group col-md-6">
                  <label class="font-text">Apellido Paterno<span class="text-danger"> *Madre</span></label>
                  <input type="text" id="apeMaternoMadre" name="apeMaternoM" class="form-control"  placeholder="Ingrese apellido paterno">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Apellido Materno<span class="text-danger"> *Madre</span></label>
                  <input type="text" id="apeMaternoMadre" name="apeMaternoM" class="form-control"  placeholder="Ingrese apellido materno">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Nombres<span class="text-danger"> *Madre</span></label>
                  <input type="text" id="nombreMadre" name="nombreM" class="form-control"  placeholder="Ingrese sus nombres">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Fecha de Nacimiento<span class="text-danger"> *Madre</span></label>
                  <div class="input-group date new-date">
                    <input type="text" id="fechNacM" name="fechaNacMa" class="form-control"  placeholder="Ingrese fecha"><span class="input-group-addon"><ion-icon name="calendar-outline" size="large" class="ion-icon icon"></ion-icon></span>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">Nacionalidad<span class="text-danger"> *Madre</span></label>
                  <input type="text" id="nacionalidadMadre" name="nacionalidadM" class="form-control"  placeholder="Ingrese su nacionalidad">
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">DNI<span class="text-danger"> *Madre</span></label>
                  <input id="dniM" type="number" name="dniM" class="form-control"  placeholder="Ingrese su dni">
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">Estado Civil<span class="text-danger"> *Madre</span></label>
                  <select class="form-select" name="estado-civilM" id="estadoCivilMadre">
                    <option value="0" >Seleccionar</option>
                    <?php while($rowEC = $estadocivilM->fetch_assoc()) { ?>
                      <option value="<?php echo $rowEC['idEstadoCivil']; ?>"><?php echo $rowEC['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Religión<span class="text-danger"> *Madre</span></label>
                  <input id="religionM" type="text" name="religionM" class="form-control"  placeholder="Ingrese su religión">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Grado de Instrucción y Mención<span class="text-danger"> *Madre</span></label>
                  <select class="form-select" name="grado-instruM" id="intruccionM">
                    <option value="0" >Seleccionar</option>
                    <?php while($rowGI = $instruccionM->fetch_assoc()) { ?>
                      <option value="<?php echo $rowGI['idGradoIns']; ?>"><?php echo $rowGI['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Telefono fijo<span class="text-danger"> *Madre</span></label>
                  <input id="telefonoM" type="number"  name="telefonoM" class="form-control"  placeholder="Ingrese su número de telefono">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Celular<span class="text-danger"> *Madre</span></label>
                  <input id="celularM" type="number" name="celularM" class="form-control"  placeholder="Ingrese su número de celular">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Correo Electrónico<span class="text-danger"> *Madre</span></label>
                  <input id="correoM" type="email" name="correoM" class="form-control"  placeholder="Ingrese su correo">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Lugar de trabajo<span class="text-danger"> *Madre</span></label>
                  <input id="lugarTraM" type="text" name="lugarTraM" class="form-control"  placeholder="Ingrese nombre del lugar">
                </div>
                <div class="form-group col-md-12">
                  <label class="font-text">Funcion que realiza<span class="text-danger"> *Madre</span></label>
                  <input id="funcionTraM" type="text" name="funcionTraM" class="form-control"  placeholder="Ingrese una breve descripción">
                </div>  
                <div class="form-group col-md-12">
                  <label class="font-text">¿Percibe usted algún ingreso mensual?<span class="text-danger"> *Madre</span></label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="siIngresoM" type="radio" name="madreI" value="siMI">
                    <label class="form-check-label" >Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="noIngresoM" type="radio" name="madreI" value="noMI">
                    <label class="form-check-label" >No</label>
                  </div>
                </div>
                <div id="ingresoM" style="display:none;" class="col-md-6">
                  <label class="font-text">Ingrese la cantidad de ingreso mensual<span class="text-danger"> *Madre</span></label>
                  <input id="ingresoMM" type="text" name="ingresoMM" class="form-control"  placeholder="Ingrese su ingreso mensual">
                </div>
                <div id="preguntaUNTM" style="display:none;" class="col-md-12">
                  <label class="font-text">¿Es docente o administrativo de la UNT?<span class="text-danger"> *Madre</span></label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="siTrabajaUNTM" type="radio" name="madreUNT" value="siTUNTM">
                    <label class="form-check-label" >Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="noTrabajaUNTM" type="radio" name="madreUNT" value="noTUNTM">
                    <label class="form-check-label" >No</label>
                  </div>
                </div>
                <div id="divtrabajaUNTM" style="display: none;">
                  <div class="input-group infoH">
                    <div class="form-group col-md-12">
                      <label class="font-text">Unidad Donde Labora<span class="text-danger"> *Madre</span></label>
                      <input id="unidadUNTM" type="text" name="unidadTrabajoUNTM" class="form-control"  placeholder="Ingrese nombre de la unidad">
                    </div>
                    <div class="form-group col-md-12"><label class="font-text">Condición Laboral<span class="text-danger"> *Madre</span></label>
                      <select class="form-select" name="condicionLM" id="condicionLaboralM">
                        <option value="5" selected>Seleccionar</option>
                        <?php while($rowCL = $condicionlaboralM->fetch_assoc()) { ?>
                          <option value="<?php echo $rowCL['idConLaboral']; ?>"><?php echo $rowCL['nombre']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--APODERADO-->
            <div id="apoderado">
              <label id="textApoderado" class="subtitulo">Datos del Apoderado</label>
              <div class="input-group mb-3">
                <div class="form-group col-md-6">
                  <label class="font-text">Apellido Paterno<span class="text-danger"> *Apoderado</span></label>
                  <input type="text" id="apePaternoA" name="apePaternoAp" class="form-control" required placeholder="Ingrese apellido paterno">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Apellido Materno<span class="text-danger"> *Apoderado</span></label>
                  <input type="text" id="apeMaternoA" name="apeMaternoAp" class="form-control" required placeholder="Ingrese apellido materno">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Nombres<span class="text-danger"> *Apoderado</span></label>
                  <input type="text" id="nombreA" name="nombreAp" class="form-control" required placeholder="Ingrese sus nombres">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Fecha de Nacimiento<span class="text-danger"> *Apoderado</span></label>
                  <div class="input-group date new-date">
                    <input type="text" id="fechNacA" name="fechaNacAp" class="form-control" required placeholder="Ingrese fecha"><span class="input-group-addon"><ion-icon name="calendar-outline" size="large" class="ion-icon icon"></ion-icon></span>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">Nacionalidad<span class="text-danger"> *Apoderado</span></label>
                  <input type="text" id="nacionalidadA" name="nacionalidadAp" class="form-control" required placeholder="Ingrese su nacionalidad">
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">DNI<span class="text-danger"> *Apoderado</span></label>
                  <input id="dniA" type="number" name="dniAp" class="form-control" required placeholder="Ingrese su dni">
                </div>
                <div class="form-group col-md-4">
                  <label class="font-text">Estado Civil<span class="text-danger"> *Apoderado</span></label>
                  <select class="form-select" name="estado-civilAp" id="estadoCivilA">
                    <option value="0" >Seleccionar</option>
                    <?php while($rowECA = $estadocivilA->fetch_assoc()) { ?>
                      <option value="<?php echo $rowECA['idEstadoCivil']; ?>"><?php echo $rowECA['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Religión<span class="text-danger"> *Apoderado</span></label>
                  <input id="religionM" type="text" name="religionA" class="form-control" required placeholder="Ingrese su religión">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Grado de Instrucción y Mención<span class="text-danger"> *Apoderado</span></label>
                  <select class="form-select" name="grado-instruAp" id="intrucciónA">
                    <option value="0" >Seleccionar</option>
                    <?php while($rowGI = $instruccionA->fetch_assoc()) { ?>
                      <option value="<?php echo $rowGI['idGradoIns']; ?>"><?php echo $rowGI['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Telefono fijo<span class="text-danger"> *Apoderado</span></label>
                  <input id="telefonoA" type="number"  name="telefonoAp" class="form-control" required placeholder="Ingrese su número de telefono">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Celular<span class="text-danger"> *Apoderado</span></label>
                  <input id="celularA" type="number" name="celularAp" class="form-control" required placeholder="Ingrese su número de celular">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Correo Electrónico<span class="text-danger"> *Apoderado</span></label>
                  <input id="correoA" type="email" name="correoAp" class="form-control" required placeholder="Ingrese su correo">
                </div>
                <div class="form-group col-md-6">
                  <label class="font-text">Lugar de trabajo<span class="text-danger"> *Apoderado</span></label>
                  <input id="lugarTraM" type="text" name="lugarTraAp" class="form-control" required placeholder="Ingrese nombre del lugar">
                </div>
                <div class="form-group col-md-12">
                  <label class="font-text">Funcion que realiza<span class="text-danger"> *Apoderado</span></label>
                  <input id="funcionTraA" type="text" name="funcionTraAp" class="form-control" required placeholder="Ingrese una breve descripción">
                </div>  
                <div class="form-group col-md-12">
                  <label class="font-text">¿Percibe usted algún ingreso mensual?<span class="text-danger"> *Apoderado</span></label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="siIngresoA" type="radio" name="apoderadoI" value="siAI">
                    <label class="form-check-label" >Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="noIngresoA" type="radio" name="apoderadoI" value="noAI">
                    <label class="form-check-label" >No</label>
                  </div>
                </div>
                <div id="ingresoA" style="display:none;" class="col-md-6">
                  <label class="font-text">Ingrese la cantidad de ingreso mensual<span class="text-danger"> *Apoderado</span></label>
                  <input id="ingresoApoderado" type="number" name="ingresoAp" class="form-control"  placeholder="Ingrese su ingreso mensual">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" id="envio">Guardar</button>
          </form>
        </div>
      </div>
    </div>
    
    
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>Ponte en conección con nuestras principales redes sociales:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="https://www.facebook.com" target="_blank" class="me-4 text-reset">
            <ion-icon name="logo-facebook" size="large" class="icon"></ion-icon>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>NOMBRE DEL COLEGIO
              </h6>
              <p>
                Here you can use rows and columns to organize your footer content. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Principales Páginas
              </h6>
              <p>
                <a href="#!" class="text-reset">Angular</a>
              </p>
              <p>
                <a href="#!" class="text-reset">React</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Vue</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Laravel</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
              <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a href="https://www.linkedin.com/in/mariana-risco-cosavalente/" target="_blank" class="text-black">MarianaLRisco</a> y 
        <a href="https://www.linkedin.com/in/luis-alberto-cadillo-lucio-879617231/" target="_blank" class="text-black">LuisCadilloLucio</a>, UNT
      </div>
      
      <!-- Copyright -->
    </footer>
    
    <!-- Optional JavaScript; choose one of the two! -->
    <?php include("bd/registrar.php");
    ?>
    <!-- Option 1: Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <!-- Option 2: My JS -->
    <script src="js/date.js" charset="utf-8"></script>
    <script src="js/div-hide.js?4589"></script>
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
