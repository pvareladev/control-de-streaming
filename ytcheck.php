<?php
exec('rm -v /tmp/ytstate.xml');
exec('nmap a.rtmp.youtube.com -p 1935 -Pn --reason --webxml -oX /tmp/ytstate.xml 2>&1',$output,$return);
$data = array( 'code' => 0 );
if ( $return !== 0 ){
	$data['code'] = $return;
	$data['error'] = $output[0];
} else {
	$ytstate = simplexml_load_file('/tmp/ytstate.xml');
	$data['address'] = ((string) $ytstate->host->address['addr'][0]);
	$data['hostname'] = ((string) $ytstate->host->hostnames->hostname['name'][0]);
	$data['protocol'] = ((string) $ytstate->host->ports->port['protocol'][0]);
	$data['portid'] = ((string) $ytstate->host->ports->port['portid'][0]);
	$data['service'] = ((string) $ytstate->host->ports->port->service['name'][0]);
	$data['state'] = ((string) $ytstate->host->ports->port->state['state'][0]);
	$data['state2'] = ((string) $ytstate->host->ports->port->state['reason'][0]);
}
$data = json_encode($data);
echo $data;
?>