<style>
#mar1 td, #mar2 td
{ padding:5px ; 

}
</style>
<link href="estilo.css" rel="stylesheet" type="text/css">
	<div style="width:930px; margin:auto; min-height:350px; background-color:#FFF"><table width="930" border="0" cellspacing="0" cellpadding="0">
  <tr class="negro12" id="mar2">
        <td   class="negro12"><strong>IVEC</strong></td>
        <td  class="negro12"><strong>AGENDA</strong></td>
        <td  class="negro12"><strong>RECINTOS CULTURALES</strong></td>
        <td  class="negro12"><strong>CONVOCATORIAS</strong></td>
        <td class="negro12"><strong>ARTISTAS</strong></td>
      <td><strong>SUBDIRECCIONES</strong></td>
  </tr>
 <tr valign="top" class="negro11" id="mar1">
        <td height="170" class="negro11"><a href="historia.php" class="negro11">Historia</a>&nbsp;<br>
          <a href="mision.php" class="negro11">Visión y Misión</a><br>
          <a href="objetivos.php" class="negro11">Objetivos</a><br>
          <a href="directorio.php" class="negro11">Directorio</a><br>
          <a href="organigrama.php" class="negro11">Organigrama</a><br>
          <a href="fracciones.php" class="negro11">Transparencia</a><br>
Comunicación Social<br>
CACREV<br>
Controlaría Ciudadana<br>
<a href="contacto.php" class="negro11">Contacto</a></td>
        <td  class="negro11"><a href="agenda.php" class="negro11">Eventos<br>
        Exposiciones<br>
        Talleres<br>
        Cursos<br>
        Diplomados<br>
      Cine Club</a></td>
        <td  class="negro11">
           <? $br=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?><a href="recintos.php?id=<?=$rrr['id']?>" class="negro11" style="color:#333; font-weight:normal"><?=$rrr['nombre']?></a><br>
      <? } ?> </td>
        <td  class="negro11"><a href="convocatorias.php" class="negro11">Abiertas<br />
        Resultados recientes</a></td>
        <td class="negro11"><strong><a href="artistas.php" class="negro11">ARTISTAS PLASTICOS</a></strong><a href="artistas.php" class="negro11"><br>
        <strong>ARTES ESCENICAS</strong><br>
        <strong>MÚSICA</strong><br>
        <strong>LITERATURA</strong><br>
        <strong>PROMOTORES CULTURALES</strong></a><br>
        </td>
      <td><strong>Educación e investigación artística</strong>&nbsp; <br>
            <a href="subdirecciones14.php" class="negro11">Alas y Raíces Veracruz</a><br>
            <a href="subdirecciones15.php" class="negro11">Fomento a la lectura</a><br>
            <a href="subdirecciones16.php" class="negro11">PECDAV</a><br>
            <a href="subdirecciones17.php" class="negro11">Creadores en los estados</a><br>          <strong>Artes y patrimonio</strong><br>
        <a href="subdirecciones19.php" class="negro11">Desarrollo Cultural Regional</a><br>
        <a href="subdirecciones20.php" class="negro11">Subdirección de administración</a><br>
      <a href="subdirecciones21.php"><span class="negro11">Actividades de subdirecciones</span></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><table width="930" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50%" align="right">&nbsp;</td>
        <td width="50%"><img src="imagenes/adelante.png" width="460" height="93" /></td>
      </tr>
      <tr>
        <td  colspan="2" align="right"><img src="imagenes/pleca.png" width="930" height="94" /></td>
      </tr>
    </table></td>
    </tr>
</table>
	</div>