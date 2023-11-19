<?php
session_start();
include '../../Config/configDB.php';
include '../../Modelo/consulSQL.php';

$nitOldProveUp=consultasSQL::clean_string($_POST['nit-prove-old']);
$nameProveUp=consultasSQL::clean_string($_POST['prove-name']);
$dirProveUp=consultasSQL::clean_string($_POST['prove-dir']);
$telProveUp=consultasSQL::clean_string($_POST['prove-tel']);
$webProveUp=consultasSQL::clean_string($_POST['prove-web']);

if(consultasSQL::UpdateSQL("proveedor", "NombreProveedor='$nameProveUp',Direccion='$dirProveUp',Telefono='$telProveUp',PaginaWeb='$webProveUp'", "NITProveedor='$nitOldProveUp'")){
    echo '<script>
        swal({
          title: "Proveedor actualizado",
          text: "Los datos del proveedor se actualizaron correctamente",
          type: "success",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
          },
          function(isConfirm) {
          if (isConfirm) {
            location.reload();
          } else {
            location.reload();
          }
        });
    </script>';
}else{
    echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
}

$codeCateg=consultasSQL::clean_string($_POST['categ-code']);
$cons=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoCat='$codeCateg'");
if(mysqli_num_rows($cons)<=0){
    if(consultasSQL::DeleteSQL('categoria', "CodigoCat='".$codeCateg."'")){
        echo '<script>
		    swal({
		      title: "Categoría eliminada",
		      text: "La categoría se eliminó con éxito",
		      type: "success",
		      showCancelButton: true,
		      confirmButtonClass: "btn-danger",
		      confirmButtonText: "Aceptar",
		      cancelButtonText: "Cancelar",
		      closeOnConfirm: false,
		      closeOnCancel: false
		      },
		      function(isConfirm) {
		      if (isConfirm) {
		        location.reload();
		      } else {
		        location.reload();
		      }
		    });
		</script>';
    }else{
       echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
    }
}else{
    echo '<script>swal("ERROR", "Lo sentimos no podemos eliminar la categoría ya que existen productos asociados a dicha categoría", "error");</script>';
}
mysqli_free_result($cons);