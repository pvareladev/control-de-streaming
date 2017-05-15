<?php
$data = array ( 'code' => 0 );
exec('sudo /var/www/webscript.sh ' . $_POST['accion'] . ' ' . $_POST['senial'] . ' ' . $_POST['usuario'],$output,$return);
$data['code'] = $return;
$data['msg'] = $output[0];
echo json_encode($data);
?>