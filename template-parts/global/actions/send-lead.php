<?php
  header('Access-Control-Allow-Origin: *');
  require("./RdStationAPI.php");

  if ( $_POST ) {
    try{
        //Envia os dados para RD, primeiro argumento é o token privado e o segundo o publico
        $rdAPI = new RDStationAPI("b4c77961b56365cf0c3473428348926d","26a20461c98ce755c35e78c47fd23205");
        $returnoRD = $rdAPI->sendNewLead($_POST['lead_email'],array(
          'identificador' => $_POST['conversion_identifier'],
          'nome' => $_POST['lead_name'],
          'telefone' => $_POST['lead_phone'],
          'Setor_OK' => $_POST['lead_sector'],
          'tipo-pedido' => $_POST['order_type'],
          'origem-pedido' => $_POST['origem_pedido'],
          'traffic_source' => $_POST['traffic_source'],
          'tech' => $_POST['tech'],
          'lead_help' => $_POST['lead_help'],
        ));

        if($returnoRD != 202){
          throw new Exception('Erro ao enviar lead para RD');
        }

        //Send data to PQL Report
        $url = 'https://website-api.socialbase.com.br/pql';
        $data = array(
          'name' => $_POST['lead_name'],
          'email' => $_POST['lead_email'],
          'phone' => $_POST['lead_phone'],
          'department' => $_POST['lead_sector'],
          'tipo_pedido' => $_POST['order_type'],
          'origin' => $_POST['origem_pedido'],
          'conversion_identifier' => $_POST['conversion_identifier'],
          'traffic_source' => $_POST['traffic_source'],
          'tech' => $_POST['tech'],
          'lead_help' => $_POST['lead_help'],
          'origin_tipo' => $_POST['conversion_identifier'] . ' | ' . $_POST['order_type'],
        );

        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
          )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        if ($result === FALSE) {
          echo 'erro ao enviar para o relatório';
        }
        
        unset($_POST['id']);
        echo 'success';

    } catch(Exception $e){
        echo $e -> getMessage();
    }
  }
?>
