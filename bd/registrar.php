<?php 
require 'conexion.php';

if(isset($_POST['apePaternoAp'])){

    //datos del apoderado
    $a_pater_apo= $_POST['apePaternoAp'];
    $a_mater_apo= $_POST['apeMaternoAp'];
    $n_apo= $_POST['nombreAp'];
    $naciona_apo= $_POST['nacionalidadAp'];
    $f_nac_apo= $_POST['fechaNacAp'];
    $dni_apo= $_POST['dniAp'];
    $e_civil_apo= $_POST['estado-civilAp'];
    $religion_apo= $_POST['religionA'];
    $g_instru_apo= $_POST['grado-instruAp'];
    $telefono_apo= $_POST['telefonoAp'];
    $cel_apo= $_POST['celularAp'];
    $email_apo= $_POST['correoAp'];
    $lugar_tra_apo= $_POST['lugarTraAp'];
    $fu_rea_apo= $_POST['funcionTraAp'];

    if($_POST['apoderadoI']=='siAI'){
        $ing_men_apo= $_POST['ingresoAp'];
    }else{
        $ing_men_apo= 0;
    }

    //verifica si el apoderado esta registrado en la BD
    $buscar_apo_re="SELECT DNI FROM apoderado WHERE DNI='$dni_apo';";
    $rpta1=mysqli_query($mysqli,$buscar_apo_re);
    $opcion1=mysqli_num_rows($rpta1);

    if($opcion1==0){
        //registro del apoderado
        $insertar="INSERT INTO apoderado (DNI, apePaterno, apeMaterno, nombre, nacionalidad, religion, fechaNac, telefono, celular, email, lugarTrabajo, ingresoMensual, funcionRealiza, idEstadoCivil, idGradoIns) VALUES ('$dni_apo','$a_pater_apo','$a_mater_apo','$n_apo','$naciona_apo','$religion_apo','$f_nac_apo','$telefono_apo','$cel_apo','$email_apo','$lugar_tra_apo','$ing_men_apo','$fu_rea_apo','$e_civil_apo','$g_instru_apo')";
        $funciona=mysqli_query($mysqli,$insertar);
    }else{
        //actualizacion del apoderado
        $actualizar3="UPDATE apoderado SET DNI='$dni_apo', apePaterno='$a_pater_apo', apeMaterno='$a_mater_apo', nombre='$n_apo', nacionalidad='$naciona_apo', religion='$religion_apo', fechaNac='$f_nac_apo', telefono='$telefono_apo', celular='$cel_apo', email='$email_apo', lugarTrabajo='$lugar_tra_apo', ingresoMensual='$ing_men_apo', funcionRealiza='$fu_rea_apo', idEstadoCivil='$e_civil_apo', idGradoIns='$g_instru_apo' WHERE DNI='$dni_apo';";
        $funciona=mysqli_query($mysqli,$actualizar3);
    }

    //datos del postulante
    $tiene_he=$_POST['Hermano'];
    $id_nivel= $_POST['nivel-postulante'];
    $id_grado= $_POST['grado-postulante'];
    $a_pat= $_POST['apePaterno'];
    $a_mat= $_POST['apeMaterno'];
    $nombre= $_POST['nombre'];
    $dni_post= $_POST['dniPostulante'];
    $sexo= $_POST['sexo-postulante'];
    $f_nac_post= $_POST['fechaNacPos'];
    $IE_post= $_POST['IEpostulante'];
    $departamento= $_POST['departamento'];
    $provincia= $_POST['provincia'];
    $distrito= $_POST['distrito'];
    $n_hijo= 1;
    $n_hermanos= 0;
    $direccion= $_POST['direccion'];
    $TipoIE_post= $_POST['TipoIEpostulante'];
    $responsable= $_POST['tipoResponsable-postulante'];
    $t_fam_post= $_POST['tipoFam-postulante'];
    $t_viv_post= $_POST['tipoVivienda-postulante'];
    $s_salud= $_POST['tipoSeguro-postulante'];
    
    $tiene_desA=$_POST['alergia'];
    if($tiene_desA=='siA'){
        $d_adicional= $_POST['adicional'];
    }
    else{
        $d_adicional= 'sin alergias';
    }

    $queryApo = "SELECT idApoderado
    FROM apoderado
    WHERE DNI = '$dni_apo';";
    $idApo=mysqli_query($mysqli,$queryApo);
    $id_apo=mysqli_fetch_assoc($idApo);
    $id_apo=$id_apo["idApoderado"];

    $queryCon = "SELECT idConforma
    FROM conforma as c
    JOIN Grado as g
    ON c.idGrado=g.idGrado
    JOIN Nivel as n
    ON c.idNivel= n.idNivel
    WHERE n.idNivel = '$id_nivel' or g.idGrado = '$id_grado';";
    $idCon=mysqli_query($mysqli,$queryCon);
    $id_con=mysqli_fetch_assoc($idCon);
    $id_con=$id_con["idConforma"];

    if($tiene_he=='noH'){
        //registro del postulante
        $insertar1= "INSERT INTO postulante (DNI, apePaterno, apeMaterno, nombre, sexo, fechaNac, numHijo, numHermanos, direccion, IEprocedencia, desAdicional, idDistrito, idConforma, idTipoVivienda, idTipoResponsable, idSeguroMedico, idApoderado, idTipoFam, idTipoIE) VALUES ('$dni_post','$a_pat','$a_mat','$nombre','$sexo','$f_nac_post','$n_hijo','$n_hermanos','$direccion','$IE_post','$d_adicional','$distrito','$id_con','$t_viv_post','$responsable','$s_salud','$id_apo','$t_fam_post','$TipoIE_post')";
        $funciona1=mysqli_query($mysqli,$insertar1);

        //buscamos ID del postulante
        $queryPostu = "SELECT idPostulante
        FROM postulante
        WHERE DNI = '$dni_post';";
        $idPostul=mysqli_query($mysqli,$queryPostu);
        $id_postul=mysqli_fetch_assoc($idPostul);
        $id_postul=$id_postul["idPostulante"];
    }
    else{
        $n_hijo= $_POST['numhijo'];
        $n_hermanos= $_POST['numhermano'];
        $tiene_he_ma=$_POST['HermanoM'];

        //registro del postulante
        $insertar1= "INSERT INTO postulante (DNI, apePaterno, apeMaterno, nombre, sexo, fechaNac, numHijo, numHermanos, direccion, IEprocedencia, desAdicional, idDistrito, idConforma, idTipoVivienda, idTipoResponsable, idSeguroMedico, idApoderado, idTipoFam, idTipoIE) VALUES ('$dni_post','$a_pat','$a_mat','$nombre','$sexo','$f_nac_post','$n_hijo','$n_hermanos','$direccion','$IE_post','$d_adicional','$distrito','$id_con','$t_viv_post','$responsable','$s_salud','$id_apo','$t_fam_post','$TipoIE_post')";
        $funciona1=mysqli_query($mysqli,$insertar1);

        //buscamos ID del postulante
        $queryPostu = "SELECT idPostulante
        FROM postulante
        WHERE DNI = '$dni_post';";
        $idPostul=mysqli_query($mysqli,$queryPostu);
        $id_postul=mysqli_fetch_assoc($idPostul);
        $id_postul=$id_postul["idPostulante"];

        if($tiene_he_ma=='siHM'){

            //datos del hermano
            $contador=$_POST['numHermanoHM'];
            for($i=1; $i<=$contador; $i++){
                $a_pat_he=$_POST['apePaternoH'.$i];
                $a_mat_he= $_POST['apeMaternoH'.$i];
                $n_he= $_POST['nombreH'.$i];
                $dni_he= $_POST['dniH'.$i];
                $nivel_he= $_POST['nivel-hermano'.$i];
                $grado_he= $_POST['grado-hermano'.$i];
                $seccion_he= $_POST['seccion-hermano'.$i];

                $queryConH = "SELECT idConforma
                FROM conforma as c
                JOIN Grado as g
                ON c.idGrado=g.idGrado
                JOIN Nivel as n
                ON c.idNivel= n.idNivel
                WHERE n.idNivel = '$nivel_he' or g.idGrado = '$grado_he';";
                $idConH=mysqli_query($mysqli,$queryConH);
                $id_conH=mysqli_fetch_assoc($idConH);
                $id_conH=$id_conH["idConforma"];
                

                $buscar_he_re="SELECT DNI FROM hermano WHERE DNI='$dni_he';";
                $rpta5=mysqli_query($mysqli,$buscar_he_re);
                $opcion5=mysqli_num_rows($rpta5);

                if($opcion5==0){
                //registro del hermano
                $insertar3="INSERT INTO hermano( DNI, apePaterno, apeMaterno, nombre, seccion, idConforma) VALUES ('$dni_he','$a_pat_he','$a_mat_he','$n_he','$seccion_he','$id_conH')";
                $funciona3=mysqli_query($mysqli,$insertar3);
                }else{
                    //actualizacion del padre
                    $actualizar10="UPDATE hermano SET DNI='$dni_he', apePaterno='$a_pat_he', apeMaterno='$a_mat_he', nombre='$n_he', seccion='$seccion_he', idConforma='$id_conH' WHERE DNI='$dni_he';";
                    $funciona3=mysqli_query($mysqli,$actualizar10);
                }

                //datos de la relacion postulante-hermanos(Tiene)
                $queryHer = "SELECT idHermano FROM hermano WHERE DNI = '$dni_he';";
                $idHer=mysqli_query($mysqli,$queryHer);
                $id_her=mysqli_fetch_assoc($idHer);
                $id_her=$id_her["idHermano"];

                $insertar7="INSERT INTO tiene (idPostulante, idHermano) VALUES ('$id_postul','$id_her')";
                $funciona7=mysqli_query($mysqli,$insertar7);
            }
        }
    }

    //datos del voucher
    $f_pago= $_POST['fechaPago'];
    $n_operacion= $_POST['numoperacion'];
    $imagenV = $_FILES['archivoV'];
    $imgVoucher = addslashes(file_get_contents($imagenV['tmp_name']));

    $queryId = "SELECT idPostulante
    FROM postulante
    WHERE DNI = '$dni_post';";
    $idPostu=mysqli_query($mysqli,$queryId);
    $id_postu=mysqli_fetch_assoc($idPostu);
    $id_postu=$id_postu["idPostulante"];
    $funciona2;
    if($imagenV['error']>0){
        echo "<script> alert('Error al cargar imagen.');</script>";
    }else{
        $permitidos = array("image/png", "image/jpg", "image/jpeg");
        if(in_array($imagenV['type'],$permitidos) ){
            
            //registro del voucher
            $insertar2= "INSERT INTO voucher ( numOperacion, fechaPago, idPostulante, imagen) VALUES ('$n_operacion','$f_pago','$id_postu','$imgVoucher')";
            $funciona2=mysqli_query($mysqli,$insertar2);
        }
    }

    //datos del padre
    $tiene_pa=$_POST['padre'];
    if($tiene_pa=='siP'){
        $a_pater_pa= $_POST['apePaternoP'];
        $a_mater_pa= $_POST['apeMaternoP'];
        $n_padre= $_POST['nombreP'];
        $naciona_pa= $_POST['nacionalidadP'];
        $f_nac_pa= $_POST['fechaNacPa'];
        $dni_pa= $_POST['dniP'];
        $e_civil_pa= $_POST['estado-civilP'];
        $religion_pa= $_POST['religionP'];
        $g_instru_pa= $_POST['grado-instruP'];
        $telefono_pa= $_POST['telefonoP'];
        $cel_pa= $_POST['celularP'];
        $email_pa= $_POST['correoP'];
        $lugar_tra_pa= $_POST['lugarTraP'];
        $fu_rea_pa= $_POST['funcionTraP'];

        if($_POST['padreI']=='siPIM'){
            $ing_men_pa= $_POST['ingresoMP'];

            if($_POST['padreUNT']=='siTUNT'){
                $con_lab_pa= $_POST['condicionLP'];
                $u_d_t_pa= $_POST['unidadTrabajoUNTP'];
                $fu_rea_pa= $fu_rea_pa.' - '.$u_d_t_pa;
    
            }else{
                $con_lab_pa= 5;
            }
        }else{
            $ing_men_pa= 0;
            $con_lab_pa= 5;
        }

        //verifica si el padre esta registrado en la BD
        $buscar_pa_re="SELECT DNI FROM progenitor WHERE DNI='$dni_pa';";
        $rpta2=mysqli_query($mysqli,$buscar_pa_re);
        $opcion2=mysqli_num_rows($rpta2);

        if($opcion2==0){
            //registro del padre
            $insertar4="INSERT INTO progenitor( DNI, apePaterno, apeMaterno, nombre, nacionalidad, religion, fechaNac, telefono, celular, email, lugarTrabajo, ingresoMensual, funcionRealiza, idEstadoCivil, idGradoIns, idConLaboral) VALUES ('$dni_pa','$a_pater_pa','$a_mater_pa','$n_padre','$naciona_pa','$religion_pa','$f_nac_pa','$telefono_pa','$cel_pa','$email_pa','$lugar_tra_pa','$ing_men_pa','$fu_rea_pa','$e_civil_pa','$g_instru_pa','$con_lab_pa')";
            $funciona4=mysqli_query($mysqli,$insertar4);
        }else{
            //actualizacion del padre
            $actualizar1="UPDATE progenitor SET DNI='$dni_pa', apePaterno='$a_pater_pa', apeMaterno='$a_mater_pa', nombre='$n_padre', nacionalidad='$naciona_pa', religion='$religion_pa', fechaNac='$f_nac_pa', telefono='$telefono_pa', celular='$cel_pa', email='$email_pa', lugarTrabajo='$lugar_tra_pa', ingresoMensual='$ing_men_pa', funcionRealiza='$fu_rea_pa', idEstadoCivil='$e_civil_pa', idGradoIns='$g_instru_pa', idConLaboral='$con_lab_pa' WHERE DNI='$dni_pa';";
            $funciona4=mysqli_query($mysqli,$actualizar1);
        }

        //registro padre-hijo
        $queryPadre = "SELECT idProgenitor
        FROM progenitor
        WHERE DNI = '$dni_pa';";
        $idPadre=mysqli_query($mysqli,$queryPadre);
        $id_padre=mysqli_fetch_assoc($idPadre);
        $id_padre=$id_padre["idProgenitor"];

        //registro
        $insertar9="INSERT INTO posee (idPostulante, idProgenitor, relacion) VALUES ('$id_postul','$id_padre','padre-hijo')";
        $funciona6=mysqli_query($mysqli,$insertar9);
        
    }

    //datos del madre
    $tiene_ma=$_POST['madre'];
    if($tiene_ma=='siM'){
        $a_pater_ma= $_POST['apeMaternoM'];
        $a_mater_ma= $_POST['apeMaternoM'];
        $n_madre= $_POST['nombreM'];
        $naciona_ma= $_POST['nacionalidadM'];
        $f_nac_ma= $_POST['fechaNacMa'];
        $dni_ma= $_POST['dniM'];
        $e_civil_ma= $_POST['estado-civilM'];
        $religion_ma= $_POST['religionM'];
        $g_instru_ma= $_POST['grado-instruM'];
        $telefono_ma= $_POST['telefonoM'];
        $cel_ma= $_POST['celularM'];
        $email_ma= $_POST['correoM'];
        $lugar_tra_ma= $_POST['lugarTraM'];
        $fu_rea_ma= $_POST['funcionTraM'];

        if($_POST['madreI']=='siMI'){
            $ing_men_ma= $_POST['ingresoMM'];

            if($_POST['madreUNT']=='siTUNTM'){
                $con_lab_ma= $_POST['condicionLM'];
                $u_d_t_ma= $_POST['unidadTrabajoUNTM'];
                $fu_rea_ma= $fu_rea_ma.' - '.$u_d_t_ma;
            }else{
                $con_lab_ma= 5;
            }
        }else{
            $ing_men_ma= 0;
            $con_lab_ma= 5;
        }

        //buscamos si el madre esta registrado
        $buscar_ma_re="SELECT DNI FROM progenitor WHERE DNI='$dni_ma';";
        $rpta=mysqli_query($mysqli,$buscar_ma_re);
        $opcion=mysqli_num_rows($rpta);

        //verifica si el madre esta registrado
        if($opcion==0){
            //registro del madre
            $insertar5="INSERT INTO progenitor( DNI, apePaterno, apeMaterno, nombre, nacionalidad, religion, fechaNac, telefono, celular, email, lugarTrabajo, ingresoMensual, funcionRealiza, idEstadoCivil, idGradoIns, idConLaboral) VALUES ('$dni_ma','$a_pater_ma','$a_mater_ma','$n_madre','$naciona_ma','$religion_ma','$f_nac_ma','$telefono_ma','$cel_ma','$email_ma','$lugar_tra_ma','$ing_men_ma','$fu_rea_ma','$e_civil_ma','$g_instru_ma','$con_lab_ma')";
            $funciona5=mysqli_query($mysqli,$insertar5);
        }else{
            //actualizacion del madre
            $actualizar2="UPDATE progenitor SET DNI='$dni_ma', apePaterno='$a_pater_ma', apeMaterno='$a_mater_ma', nombre='$n_madre', nacionalidad='$naciona_ma', religion='$religion_ma', fechaNac='$f_nac_ma', telefono='$telefono_ma', celular='$cel_ma', email='$email_ma', lugarTrabajo='$lugar_tra_ma', ingresoMensual='$ing_men_ma', funcionRealiza='$fu_rea_ma', idEstadoCivil='$e_civil_ma', idGradoIns='$g_instru_ma', idConLaboral='$con_lab_ma' WHERE DNI='$dni_ma';";
            $funciona5=mysqli_query($mysqli,$actualizar2);
        }

        //registro madre-hijo
        $queryMadre = "SELECT idProgenitor
        FROM progenitor
        WHERE DNI = '$dni_ma';";
        $idMadre=mysqli_query($mysqli,$queryMadre);
        $id_madre=mysqli_fetch_assoc($idMadre);
        $id_madre=$id_madre["idProgenitor"];
        
        //registro
        $insertar8="INSERT INTO posee ( idPostulante, idProgenitor, relacion) VALUES ('$id_postul','$id_madre','madre-hijo')";
        $funciona8=mysqli_query($mysqli,$insertar8);
    }
    

    if($funciona && $funciona1 && $funciona2 || $funciona3 || $funciona4 || $funciona5 || $funciona6 || $funciona7 || $funciona8){

        echo "<script> alert('Registro exitoso, gracias.');
        location.href = '../index.php';
        </script>";
     
    }else{
        $eliminar="DELETE * FROM voucher WHERE numOperacion='$n_operacion';";

        if($tiene_ma='siM'){
            $eliminar1="DELETE * FROM posee WHERE idProgenitor='$id_madre';"; 
            $eliminar2="DELETE * FROM progenitor WHERE DNI='$dni_ma';"; 
        }

        if($tiene_pa='siP'){
            $eliminar3="DELETE * FROM posee WHERE idProgenitor='$id_padre';"; 
            $eliminar4="DELETE * FROM progenitor WHERE DNI='$dni_pa';"; 
        }

        if($tiene_he_ma='siHM'){
            for($i=1; $i<=$contador; $i++){
                $dni_he= $_POST['dniH'.$i];

                $queryHerm = "SELECT idHermano
                FROM hermano
                WHERE DNI = '$dni_he';";
                $idHerm=mysqli_query($mysqli,$queryHerm);
                $id_herm=mysqli_fetch_assoc($idHerm);
                $id_herm=$id_herm["idHermano"];

                $eliminar5="DELETE * FROM tiene WHERE idHermano='$id_herm';"; 
                $eliminar6="DELETE * FROM hermano WHERE DNI='$dni_he';";
            }
        }

        $eliminar7="DELETE * FROM postulante WHERE DNI='$dni_post';";
        $eliminar8="DELETE * FROM apoderado WHERE DNI='$dni_apo';";

        echo "<script> alert('Error de registro, intente nuevamente');
        location.href = '../index.php';
        </script>";
    }
}
?> 
