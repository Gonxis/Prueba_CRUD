<?php

require_once 'claseModel.php';
require_once 'clase.php';

$alm = new Alumno();
$model = new AlumnoModel();

if (isset($_REQUEST['action'])){

    switch ($_REQUEST['action']){

        case 'update':

            $alm->__SET('id'              , $_REQUEST['id']);
            $alm->__SET('Nombre'          , $_REQUEST['Nombre']);
            $alm->__SET('Apellido'        , $_REQUEST['Apellido']);
            $alm->__SET('Sexo'            , $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento' , $_REQUEST['FechaNacimiento']);

            $model->update($alm);
            break;

        case 'insert':

            var_dump($_REQUEST);
            exit();

            $alm->__SET('Nombre'          , $_REQUEST['Nombre']);
            $alm->__SET('Apellido'        , $_REQUEST['Apellido']);
            $alm->__SET('Sexo'            , $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento' , $_REQUEST['FechaNacimiento']);

            $model->insert($alm);
            break;

        case 'delete':

            $model->delete($_REQUEST['id']);
            break;

        case 'edit':

            $alm = $model->obtain($_REQUEST['id']);
            break;
    }
}

?>

<form action="?action=<?php echo $alm->id > 0 ? 'update' : 'insert'; ?>" autocomplete="off" method="post">
    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>"/>
    <input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" placeholder="Nombre"/>
    <input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" placeholder="Apellido"/>
    <input type="text" name="Sexo" value="<?php echo $alm->__GET('Sexo'); ?>" placeholder="Sexo"/>
    <input type="text" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>" placeholder="Fecha Nacimiento"/>
    <button type="submit">guardar</button>
</form>