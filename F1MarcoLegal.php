<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instituto Veracruzano de la Cultura :: Artistas</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #F2F2F2;
}
li { margin-bottom:10px }
</style>
</head>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#0071C4" class="gris25" style="color:#FFF; padding-left:8px"><a href="fracciones.php" class="recintos"  style="color:#FFF;" >Transparencia</a></td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <form method="post" action="datosf.php?id=<?=$id?>">
      <table width="613" border="0" cellspacing="0" cellpadding="5">
        
        <tr>
          <td colspan="4" class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td colspan="4"> 
     
          </td>
        </tr>
        <tr>
          <td colspan="4" align="left" class="Arial12Nego"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
            
            <tr class="Hevel16Gris" >
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"><strong>Fracción I.- </strong> <span class="negro19">
                 Marco Legal <!--<?=$rowl['titulo']?>-->
                </span><br />
                <span style="color:#333; font-size: 15px">
                Responsable de la Información: Unidad de Acceso a la Información<br /> 
                <br /> Fecha de Actualización: Junio de 2016<br /> 
                </span></td>

                <!--Las convocatorias a los procedimientos administrativos de licitación pública, licitación restringida o simplificada, 
                incluidos los contratos o pedidos resultantes, además, de elaborarse un listado con las ofertas económicas consideradas. 
                En el caso de los procedimientos administrativos de licitación.<?=nl2br($rowl['descrip'])?></span></td>

                http://litorale.com.mx/ivec/admin/fracciones/FraccionI/CodigoConducta.pdf

              -->
            </tr>
          </table></td>
        </tr>

        <tr>
          <td colspan="4" align="left" class="Arial12Nego"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
           
            <tr class="Hevel16Gris" >
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"><ul type=circle>
                <li><span class="">Federal</span><br /><br /></li>
                  <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2014-01-27/933.pdf" target="_blank"><span class="Arial12Nego">CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS CONSTITUCIÓN PUBLICADA EN EL DIARIO OFICIAL DE LA FEDERACIÓN EL 5 DE FEBRERO DE 1917 TEXTO VIGENTE ÚLTIMA REFORMA PUBLICADA DOF 29-01-2016</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/Fraccion_I/PUNTO 15.pdf" target="_blank"><span class="Arial12Nego">ACUERDO NÚMERO 15/12/15 POR EL QUE SE EMITEN LAS REGLAS DE OPERACIÓN DEL PROGRAMA DE APOYOS A LA CULTURA PARA EL EJERCICIO FISCAL 2016, PUBLICADO EN EL DIARIO OFICIAL DE LA FEDERACION EL DÍA 29 DE DICIEMBRE DE 2015. </span></a><br /><br /></li>
                      <li><a href="http://www.dof.gob.mx/nota_detalle.php?codigo=5391143&fecha=04/05/2015" target="_blank"><span class="Arial12Nego">DOF: 04/05/2015 DECRETO POR EL QUE SE EXPIDE LA LEY GENERAL DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA.</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/Fraccion_I/PUNTO17.pdf" target="_blank"><span class="Arial12Nego">DOF:20/08/2015 ACUERDO QUE TIENE POR OBJETO EMITIR EL CÓDIGO DE ÉTICA DE LOS SERVIDORES PÚBLICOS DEL GOBIERNO FEDERAL, LAS REGLAS DE INTEGRIDAD PARA EL EJERCICIO DE LA FUNCIÓN PÚBLICA, Y LOS LINEAMIENTOS GENERALES PARA PROPICIAR LA INTEGRIDAD DE LOS SERVIDORES PÚBLICOS Y PARA IMPLEMENTAR ACCIONES PERMANENTES QUE FAVOREZCAN SU COMPORTAMIENTO ÉTICO, A TRAVÉS DE LOS COMITÉS DE ÉTICA Y DE PREVENCIÓN DE CONFLICTOS DE INTERÉS.</span></a><br /><br /></li>
                      <li><a href="https://www.sep.gob.mx/work/models/sep1/Resource/558c2c24-0b12-4676-ad90-8ab78086b184/ley_fomento_lectura_libro.pdf" target="_blank"><span class="Arial12Nego">LEY DE FOMENTO PARA LA LECTURA Y EL LIBRO NUEVA LEY PUBLICADA EN EL DIARIO OFICIAL DE LA FEDERACIÓN EL 24 DE JULIO DE 2008 TEXTO VIGENTE ÚLTIMA REFORMA PUBLICADA DOF 17-12-2015</span></a><br /><br /></li>
                      <li><a href="http://www.legisver.gob.mx/leyes/LeyesPDF/EJECUTIVO260515.pdf" target="_blank"><span class="Arial12Nego">LEY ORGÁNICA DEL PODER EJECUTIVO DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE.</span></a><br /><br /></li>
                      <li><a href="http://www.diputados.gob.mx/LeyesBiblio/pdf/92_121115.pdf" target="_blank"><span class="Arial12Nego">LEY DEL SEGURO SOCIAL</span></a><br /><br /></li>
                      <li><a href="http://www.diputados.gob.mx/LeyesBiblio/pdf/244_181215.pdf" target="_blank"><span class="Arial12Nego">LEY FEDERAL DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA GUBERNAMENTAL</span></a><br /><br /></li>
                      <li><a href="http://www.diputados.gob.mx/LeyesBiblio/pdf/125_120615.pdf" target="_blank"><span class="Arial12Nego">LEY FEDERAL DEL TRABAJO ULTIMA REFORMA  PUBLICADA EN EL DIARIO OFICIAL DE LA FEDERACIÓN EL DÍA 12 DE JUNIO DE 2015</span></a><br /><br /></li>
                      <li><a href="https://tefina.bn1301.livefilestore.com/y3mGVlX7X0OPH46jiscXa1ZYw-AFYzHTTgaAwJdGCAbBLDCn9HyNk9sLn1QoM1lO1h8Rsd6FaYFLLT9gOZabv5rL5DZ4ST5cSbdByMmUk_MU4BguCKChc2qrVyUJAW2LQwzJ4Fzn5fblgCzoq8eFifkUQ/PUNTO%2076.LEY%20DE%20FISCALIZACI%C3%93N%20Y%20RENDICI%C3%93N%20DE%20CUENTAS%20DE%20LA%20FEDERACI%C3%93N.pdf?psid=1" target="_blank"><span class="Arial12Nego">LEY DE FISCALIZACIÓN Y RENDICIÓN DE CUENTAS DE LA FEDERACIÓN</span></a><br /><br /></li>
                    </ul>
                      
                <li><span class="">Estatal</span><br /><br /></li>
                  <ul>
                      <li><a href="http://www.ordenjuridico.gob.mx/Documentos/Estatal/Veracruz/wo77736.pdf" target="_blank"><span class="Arial12Nego">LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE ULTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL: 26 DE AGOSTO DE 2013</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2014-01-27/928.pdf" target="_blank"><span class="Arial12Nego">CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-06-28/CodigoEtica.pdf" target="_blank"><span class="Arial12Nego">CÓDIGO DE ÉTICA DE LOS SERVIDORES PÚBLICOS</span></a><br /><br /></li>
                      <li><a href="http://www.ivai.org.mx/I/lineamientos_uiap.pdf" target="_blank"><span class="Arial12Nego">OFICIAL DEL 03 DE JUNIO DE 2009 LINEAMIENTOS GENERALES QUE DEBERÁN OBSERVAR LOS SUJETOS OBLIGADOS POR LA LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE, PARA REGLAMENTAR LA OPERACIÓN DE LAS UNIDADES  DE ACCESO A LA INFORMACIÓN</span></a><br /><br /></li>
                      <li><a href="http://www.ivai.org.mx/I/lineamientos_mantener_actualizada.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS GENERALES QUE DEBERÁN OBSERVAR LOS SUJETOS OBLIGADOS POR LA LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE, PARA PUBLICAR Y MANTENER ACTUALIZADA LA INFORMACIÓN PÚBLICA; PUBLICADA EN GACETA OFICIAL DEL 03 DE JUNIO DE 2009</span></a><br /><br /></li>
                      <li><a href="http://www.editoraveracruz.gob.mx/gacetas/2010/06/Gac2010175.pdf" target="_blank"><span class="Arial12Nego">FE DE ERRATAS A LOS LINEAMIENTOS GENERALES PARA ORIENTAR SOBRE LA CREACIÓN O MODIFICACIÓN DE FICHEROS O ARCHIVOS QUE CONTENGAN DATOS PERSONALES. PUBLICADO EN LA GACETA OFICIAL DEL ESTADO EL 01 DE JUNIO DE 2010</span></a><br /><br /></li>
                      <li><a href="http://www.ivai.org.mx/I/LineamientosDatos%20Personales.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS PARA LA TUTELA DE DATOS PERSONALES EN EL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE. ÚLTIMA ADICIÓN PUBLICADA EN LA GACETA OFICIAL NÚMERO 509 DEL 27 DE DICIEMBRE DE 2013</span></a><br /><br /></li>
                      <li><a href="http://web.ssaver.gob.mx/transparencia/files/2011/11/GAC2012-018_LINEAMIENTOS-_SITIOS_WEB.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS PARA LA ESTANDARIZACIÓN, PUBLICACIÓN Y ADMINISTRACIÓN DE SITIOS DE INTERNET DE LA ADMINISTRACIÓN PÚBLICA DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE. PUBLICADOS EN LA GACETA OFICIAL DEL ESTADO DE VERACRUZ EL DÍA 16 DE ENERO DE 2012 BAJO EL NÚM. EXT. 18</span></a><br /><br /></li>
                      <li><a href="http://www.editoraveracruz.gob.mx/gacetas/2011/09/Gac2011-307%20Miercoles%2028%20Ext.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS EN MATERIA DE CONSTRUCCIÓN, MONITOREO Y DIFUSIÓN DE INDICADORES DE DESEMPEÑO DE LA ADMINISTRACIÓN PÚBLICA ESTATAL. PUBLICADO EN LA GACETA OFICIAL NÚM. EXT. 307 EL DÍA 28 DE SEPTIEMBRE DE 2011</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-09/440.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS POR LOS QUE SE ESTABLECEN LOS CRITERIOS TÉCNICO-ADMINISTRATIVOS PARA LA MODIFICACIÓN, ELABORACIÓN Y AUTORIZACIÓN DE LAS ESTRUCTURAS ORGÁNICAS Y PLANTILLA DE PERSONAL DE LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA, DEL GOBIERNO DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-09/439.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS GENERALES Y ESPECÍFICOS DE DISCIPLINA, CONTROL Y AUSTERIDAD EFICAZ, QUE SE EXPIDEN DE CONFORMIDAD CON LO DISPUESTO POR LOS ARTÍCULOS 4, 10 Y TERCERO TRANSITORIO DEL DECRETO QUE ESTABLECE EL PROGRAMA INTEGRAL DE AUSTERIDAD, DISCIPLINA, TRANSPARENCIA Y EFICIENTE ADMINISTRACIÓN DE LOS RECURSOS PÚBLICOS POR PARTE DE LAS DEPENDENCIAS Y ENTIDADES DEL PODER EJECUTIVO DEL ESTADO LIBRE Y SOBERANO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://www.ordenjuridico.gob.mx/Documentos/Estatal/Veracruz/wo109839.pdf" target="_blank"><span class="Arial12Nego">DECRETO NÚMERO 623 DE PRESUPUESTO DE EGRESOS DEL GOBIERNO DEL ESTADO DE VERACRUZ PARA EL EJERCICIO FISCAL 2016</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2014-01-30/934.pdf" target="_blank"><span class="Arial12Nego">DECRETO QUE DECLARA 2014 COMO EL AÑO DEL CENTENARIO DE LA DEFENSA HEROICA DEL PUERTO DE VERACRUZ</span></a><br /><br /></li>
                      <li><a href="http://www.ordenjuridico.gob.mx/Documentos/Estatal/Veracruz/wo102702.pdf" target="_blank"><span class="Arial12Nego">REGLAMENTO INTERIOR DE LA CONTRALORÍA GENERAL DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE.</span></a><br /><br /></li>
                      <li><a href="http://web.segobver.gob.mx/juridico/decretos/Vigente201.pdf" target="_blank"><span class="Arial12Nego">DECRETO POR EL QUE SE ESTABLECE EL REGISTRO ESTATAL DE TRÁMITES Y SERVICIOS DEL PODER EJECUTIVO DEL GOBIERNO DEL ESTADO DE VERACRUZ (RETS)</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2013-01-31/704.pdf" target="_blank"><span class="Arial12Nego">DECRETO SERVICIOS PERSONALES 2013</span></a><br /><br /></li>
                      <li><a href="http://www.itsx.edu.mx/transparencia/I/Ptto_Egresos2015.pdf" target="_blank"><span class="Arial12Nego">DECRETO NÚMERO 319 DE PRESUPUESTO DE EGRESOS DEL GOBIERNO DEL ESTADO DE VERACRUZ PARA EL EJERCICIO FISCAL 2015.</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/429.pdf" target="_blank"><span class="Arial12Nego">DECRETO QUE CREA EL CONSEJO ESTATAL PARA LA CULTURA Y LAS ARTES</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/428.pdf" target="_blank"><span class="Arial12Nego">DECRETO POR EL QUE SE CREAN, FUSIONAN, TRANSFIEREN, SUPRIMEN, SECTORIZAN Y CAMBIAN LAS FUNCIONES DE DIVERSAS ÁREAS DE LA ADMINISTRACIÓN PÚBLICA DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/427.pdf" target="_blank"><span class="Arial12Nego">"DECRETO POR EL QUE SE TRANSFIERE EL ÁREA DENOMINADA ADMINISTRACIÓN DEL TEATRO DEL ESTADO AL INSTITUTO VERACRUZANO DE LA CULTURA"</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-07/360.pdf" target="_blank"><span class="Arial12Nego">"DECRETO QUE ESTABLECE Y REGULA LA FUNCIÓN DE ENLACE INSTITUCIONAL EN MATERIA DE COMUNICACIÓN SOCIAL DE LAS DEPENDENCIAS Y ENTIDADES DEL PODER EJECUTIVO DEL ESTADO"</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-07/350.pdf" target="_blank"><span class="Arial12Nego">DECRETO II PARA LA ORGANIZACIÓN Y FUNCIONAMIENTO DE LA GESTIÓN GUBERNAMENTAL</span></a><br /><br /></li>
                      <li><a href="http://www.editoraveracruz.gob.mx/gacetas/2015/12/Gac2015-518%20Martes%2029%20Ext%20TOMO%20I.pdf" target="_blank"><span class="Arial12Nego">DECRETO NÚMERO 623 DE PRESUPUESTO DE EGRESOS DEL GOBIERNO DEL ESTADO DE VERACRUZ PARA EL EJERCICIO FISCAL 2016. PUBLICADO EN LA GACETA OFICIAL NUM. EXT. 518  DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE Y EL  ANEXO IX PRESUPUESTO BASADO EN RESULTADOS, CORRESPONDIENTE AL DECRETO NÚMERO 623 DE PRESUPUESTO DE EGRESOS DEL GOBIERNO DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE, PARA EL EJERCICIO FISCAL 2016.</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2015-03-25/1175.pdf" target="_blank"><span class="Arial12Nego">PDCI</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2015-03-25/1174.pdf" target="_blank"><span class="Arial12Nego">PDCH</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2015-03-25/1173.pdf" target="_blank"><span class="Arial12Nego">FORCAZ</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2015-03-31/1208.pdf" target="_blank"><span class="Arial12Nego">PDCS</span></a><br /><br /></li>                 
                      <li><a href="http://vinculacion.conaculta.gob.mx/vv/paice_docs_2016/RO__2016.pdf" target="_blank"><span class="Arial12Nego">DCI</span></a><br /><br /></li>
                      <li><a href="http://www.legisver.gob.mx/leyes/LeyesPDF/INGRESOS2016.pdf" target="_blank"><span class="Arial12Nego">LEY DE INGRESOS DEL GOBIERNO DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE PARA EL EJERCICIO FISCAL DE 2016</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2013-01-07/670.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 581 PARA LA TUTELA DE LOS DATOS PERSONALES EN EL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-10-23/32.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 602 DE RESPONSABILIDAD PATRIMONIAL DE LA ADMINISTRACIÓN PÚBLICA ESTATAL Y MUNICIPAL DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-10-23/31.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 859 DEL PATRIMONIO CULTURAL DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf/90.pdf" target="_blank"><span class="Arial12Nego">DECRETO NÚMERO 602 QUE REFORMA Y ADICIONA DIVERSAS DISPOSICIONES DE LA LEY DE TURISMO DEL ESTADO DE VERACRUZ. PUBLICADO EN LA GACETA OFICIAL EL 02 DE DIC. 2015</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf_ult/127.pdf" target="_blank"><span class="Arial12Nego">"LEY NÚMERO 822 PARA LA INTEGRACIÓN DE LAS PERSONAS CON DISCAPACIDAD DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE"</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-10-23/28.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 584 DEL SERVICIO PÚBLICO DE CARRERA EN LA ADMINISTRACIÓN PÚBLICA CENTRALIZADA DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf/115.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 364 ESTATAL DEL SERVICIO CIVIL DE VERACRUZ, ULTIMA REFORMA EN LA GACETA OFICIAL DEL ESTADO EL 07 DE DICIEMBRE DE 2015</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-10-23/25.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 252 DE FISCALIZACIÓN SUPERIOR PARA EL ESTADO </span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf_ult/35.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 539 DE ADQUISICIONES, ARRENDAMIENTOS, ADMINISTRACIÓN Y ENAJENACIÓN DE BIENES MUEBLES DEL ESTADO DE VERACRUZ-LLAVE. ULTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL DEL ESTADO EL DÍA 05 DE SEPTIEMBRE DE 2007</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf/40.pdf" target="_blank"><span class="Arial12Nego">LEY NO. 698. LEY DE BIENES DEL ESTADO, ULTIMA REFORMA PUBLICADA EL 13 DE ABRIL DE 2011</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf/44.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 44 DE COORDINACIÓN FISCAL PARA EL ESTADO Y LOS MUNICIPIOS DE VERACRUZ DE IGNACIO DE LA LLAVE ULTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL: 28 DE DICIEMBRE DE 2015</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf/86.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 36 DE RESPONSABILIDADES DE LOS SERVIDORES PÚBLICOS PARA EL ESTADO LIBRE Y SOBERANO DE VERACRUZ-LLAVE. ULTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL DEL ESTADO DE VERACRUZ EL DÍA  07 DE AGOSTO DE 2015</span></a><br /><br /></li>
                      <li><a href="http://juridico.segobver.gob.mx/pdf/74.pdf" target="_blank"><span class="Arial12Nego">LEY NO. 56. LEY DE PLANEACIÓN DEL ESTADO DE VERACRUZ-LLAVE. ULTIMA MODIFICACIÓN PUBLICADA EL DÍA 19 DE DICIEMBRE DE 2014</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-10-23/19.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 821 PARA EL DESARROLLO CULTURAL DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-10-23/18.pdf" target="_blank"><span class="Arial12Nego">LEY NÚMERO 866 PARA EL FOMENTO DE LA LECTURA Y EL LIBRO PARA EL ESTADO LIBRE Y SOBERANO DE VERACRUZ DE IGNACIO DE LA LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-06-14/Gac2014-520.pdf" target="_blank"><span class="Arial12Nego">LEY 318 DE INGRESOS Y DECRETO NUMERO 319 DE PRESUPUESTO DE EGRESOS DEL GOBIERNO DEL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE PARA EL EJERCICIO FISCAL 2015</span></a><br /><br /></li>
                      
                      59<li><a href="" target="_blank"><span class="Arial12Nego">LEY ORGANICA DEL PODER EJECUTIVO DEL ESTADO DE VERACRUZ ULTIMA REFORMA, PUBLICADA EN LA GACETA OOFICIAL DEL ESTADO EL DÍA  26 DE MAYO DE 2015</span></a><br /><br /></li>
                      60<li><a href="" target="_blank"><span class="Arial12Nego">CÓDIGO CIVIL PARA EL ESTADO DE VERACRUZ ULTIMA REFORMA 17 DE FEBRERO DE 2016</span></a><br /><br /></li>
                      61<li><a href="" target="_blank"><span class="Arial12Nego">CODIGO DE PROCEDIMIENTOS ADMINISTRATIVOS PARA EL ESTADO DE VERACRUZ DE IGNACIO DE LA LLAVE. ÚLTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL: 26 DE MAYO DE 2015</span></a><br /><br /></li>
                      62<li><a href="" target="_blank"><span class="Arial12Nego">CÓDIGO DE PROCEDIMIENTOS CIVILES PARA EL ESTADO DE VERACRUZ ÚLTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL 8 DE ENERO DE 2016</span></a><br /><br /></li>
                      63<li><a href="" target="_blank"><span class="Arial12Nego">CODIGO FINANCIERO PARA EL ESTADO DE VERACRUZ ÚLTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL 20 DE OCTUBRE DE 2015</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/432.pdf" target="_blank"><span class="Arial12Nego">ACUERDO DE ENAJENACIÓN A TÍTULO GRATUITO DEL INMUEBLE DONDE SE UBICA EL TEATRO DEL ESTADO A FAVOR DEL INSTITUTO VERACRUZANO DE LA CULTURA</span></a><br /><br /></li>
                      65<li><a href="" target="_blank"><span class="Arial12Nego">ACUERDO QUE AUTORIZA AL EJECUTIVO DEL ESTADO A ENAJENAR A TÍTULO GRATUITO A FAVOR DEL IVEC EL INMUEBLE DENOMINADO CASA DE ARTESANÍAS, UBICADO EN ESTA CIUDAD CAPITAL.</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/433.pdf" target="_blank"><span class="Arial12Nego">ACUERDO QUE AUTORIZA AL EJECUTIVO DEL ESTADO A ENAJENAR A TÍTULO GRATUITO A FAVOR DEL IVEC LA PINACOTECA DIEGO RIVERA, EL TEATRO DE LA REFORMA Y EL MUSEO TAJÍN.</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/434.pdf" target="_blank"><span class="Arial12Nego">ACUERDO QUE AUTORIZA AL TITULAR DE LA SEFIPLAN PARA ENAJENAR, A TÍTULO GRATUITO, LA PINACOTECA DIEGO RIVERA, EL TEATRO REFORMA Y EL MUSEO TAJÍN, PARA USO DEL IVEC.</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-09/435.pdf" target="_blank"><span class="Arial12Nego">ACUERDO 09/IVEC/SO-01/260308 POR EL QUE SE EMITE EL REGLAMENTO DE OPERACIÓN DE LA UNIDAD DE ACCESO A LA INFORMACIÓN PÚBLICA Y SE CREA LA UNIDAD DE ACCESO A LA INFORMACIÓN PÚBLICA Y EL COMITÉ DE INFORMACIÓN DE ACCESO RESTRINGIDO</span></a><br /><br /></li>
                      <li><a href="http://sistemas.cgever.gob.mx/08/pdf/ACUERDO%20ESTABLECEN%20BASES%20PARA%20CONSTITUCION%20DE%20COMITES%20DE%20%20CONTRALORIA%20CIUDADANA%20ADELANTE%2004-dic-2012.pdf" target="_blank"><span class="Arial12Nego">ACUERDO QUE ESTABLECE LAS BASES PARA LA CONSTITUCIÓN DE COMITÉS DE CONTRALORÍA CIUDADANA ADELANTE. PUBLICADO EN LA GACETA OFICIAL DEL ESTADO NÚM. EXT. 420 DE FECHA 4 DE DICIEMBRE DE 2012</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-09/437.pdf" target="_blank"><span class="Arial12Nego">ACUERDO DE CORRESPONSABILIDAD SOCIAL</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-09/438.pdf" target="_blank"><span class="Arial12Nego">ACUERDO QUE ESTABLECE LAS BASES GENERALES PARA EL FUNCIONAMIENTO DE LOS ORGANOS DE GOBIERNO O SUS EQUIVALENTES, EN LA ADMINISTRACION PUBLICA PARAESTATAL DEL ESTADO DE VERACRUZ-LLAVE</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2012-11-08/431.pdf" target="_blank"><span class="Arial12Nego">ACUERDO DE COORDINACIÓN PARA LA RESTAURACIÓN Y REHABILITACIÓN DEL MUSEO DE ARTE DEL ESTADO, ANTIGUO ORATORIO SAN FELIPE NERI</span></a><br /><br /></li>
                      <li><a href="https://tefina.bn1301.livefilestore.com/y3mpcOfkQh1X-B1wL9uxAnswqzUJpfpHf7YvkDWeUk33Ffxkfod25JkFQgycP8-oyYVoDLqAtSrqtnJqpjVeBAR61ChU5pYBMaq80WijXJp45zilnxNIq6NcMgGJxSovU81yv0hd71niF87STvSvOfKGw/Gac2016-012%20Viernes%2008%20Ext.pdf?psid=1" target="_blank"><span class="Arial12Nego">DECRETO NÚMERO 840 QUE REFORMA EL ARTÍCULO 527 DEL CÓDIGO DE PROCEDIMIENTOS CIVILES PARA EL ESTADO DE VERACRUZ.</span></a><br /><br /></li>
                      <li><a href="https://tefina.bn1301.livefilestore.com/y3mvSFBXbdoGxdC4QSJXXrf_IJ1Q8itLOhI5TMZt4Cb6q590aP-Qw_qfJerzuhgMQ3AZ2NWGsYRYw5cbLGlKuY0Lx6mgZsuqPWPWeT5_7WhOQtp2TOtxY7-PzojkJeBJrlDZMyTPBzDOoOR97niwLUg6w/c%C3%B3digo%20%20de%20Derechos.pdf?psid=1" target="_blank"><span class="Arial12Nego">DECRETO NÚMERO 624 QUE REFORMA, ADICIONA Y DEROGA DIVERSAS DISPOSICIONES DEL CÓDIGO DE DERECHOS PARA EL ESTADO DE VERACRUZ.</span></a><br /><br /></li>
                      <li><a href="https://tefina.bn1301.livefilestore.com/y3mkrR-HBYo25DSjm0vCrgCZDa2mH7nkKaKMI_6nVtDWGck2l7spN4xSf3pIwXPqw4avD3WYoWQtdb0frL1rMdO0JAngm_WJIlYw9B_6K-iXru9hTv1rYLCpY6XwA-R93GAGIBYBSANUdPexqTkp03F4Q/Gac2016-036%20Martes%2026%20Ext%20TOMO%20IV.pdf?psid=1" target="_blank"><span class="Arial12Nego">ESTATUTO PARA LA OPERACIÓN DE LA UNIDAD DE GÉNERO.</span></a><br /><br /></li>
                    </ul>
                      
                <li><span class="">Local</span><br /><br /></li>
                  <ul>
                      <li><a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-06-22/1543.pdf" target="_blank"><span class="Arial12Nego">REGLAMENTO INTERIOR DEL INSTITUTO VERACRUZANO DE LA CULTURA</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/Fraccion_I/6CODIGO_DE_CONDUCTA.pdf" target="_blank"><span class="Arial12Nego">CÓDIGO DE CONDUCTA DE LOS TRABAJADORES DEL IVEC</span></a><br /><br /></li>
                      <li><a href="" target="_blank"><span class="Arial12Nego">LEY NÚMERO 61 QUE CREA EL INSTITUTO VERACRUZANO DE LA CULTURA, ULTIMA REFORMA PUBLICADA EN LA GACETA OFICIAL DEL ESTADO EL 22 DE FEBRERO DE 2010</span></a><br /><br /></li>
                      <li><a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-05-26/1504.pdf" target="_blank"><span class="Arial12Nego">LINEAMIENTOS PARA LA OPERACIÓN DEL COMITÉ DE ÉTICA Y PARA LA APLICACIÓN DEL CÓDIGO DE CONDUCTA DEL INSTITUTO VERACRUZANO DE LA CULTURA</span></a><br /><br /></li>
                      <li><a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-05-26/1503.pdf" target="_blank"><span class="Arial12Nego">INTEGRANTES DEL COMITÉ DE ÉTICA</span></a><br /><br /></li>
                  </ul>
              </ul></td>
            </tr>
          </table></td>
        </tr>
         </table>
         </form>
      </div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4">&nbsp;</td>
    </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>