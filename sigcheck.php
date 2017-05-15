<?php
$senial = $_POST['senial'];
exec('pgrep -f "ffmpeg.*SDI \(' . $senial . '\).*"',$output,$return);
echo ( $return == 0 ) ? $output[0] : $return;
?>