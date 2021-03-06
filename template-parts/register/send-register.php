<?php
  header('Access-Control-Allow-Origin: https://socialbase.com.br');
  require("../global/actions/RdStationAPI.php");

  if(!$_POST['secret_key']) {
      die('not allowed');
  }

  if ( $_POST ) {
    $conversion_identifier = $_POST['conversion_identifier'];
    $order_type = $_POST['order_type'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $password = $_POST['password'];
    $company_employees = $_POST['company_employees'];
    $company_certificate = $_POST['company_certificate'];
    $company_office = $_POST['company_office'];
    $company_sector = $_POST['company_sector'];
    $company_url = $_POST['company_url'];
    $department = $_POST['company_sector'];
    $company_invite = $_POST['company_invite'];
    $phone = $_POST['phone'];
    $tech = $_POST['tech'];
    $invites = $_POST['company_invite'];

    if ($company_invite) {
      $company_invite = explode(',', $company_invite);
    } else {
      $company_invite = 'Não efetuou convites';
      $invites = 'Não efetuou convites';
    }

    if ($company_url) {
      $company_url = str_replace('.', '', $company_url);
      $company_url = str_replace(' ', '', $company_url);
      $company_url = 'https://' . $company_url . '.socialbase.com.br';
    }

    try{
      // SEND TO PQL MANAGER
      $url = 'https://pql-manager.socialbase.com.br/';
      $data = array(
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'job_title' => $company_office,
        'phone' => $phone,
        'url' => $company_url,
        'invites' => $company_invite,
      );
      
      if (!$company_url) {
        array_splice($data, 5, 1);
      }

      $options = array(
        'http' => array(
          'header'  => "Content-type: application/json",
          'method'  => 'POST',
          'content' => json_encode($data),
        )
      );
      $context  = stream_context_create($options);
      $pqlResult = file_get_contents($url, false, $context);
      $pqlResult = json_decode($pqlResult);

      if ($pqlResult === null) {
        http_response_code(412);
        die("url exist");
      } else {
        $company_url = $pqlResult->url;
      }

      // Envia os dados para RD, primeiro argumento é o token privado e o segundo o publico
      $rdAPI = new RDStationAPI("b4c77961b56365cf0c3473428348926d","26a20461c98ce755c35e78c47fd23205");
      $returnoRD = $rdAPI->sendNewLead($email,array(
        'identificador' => $conversion_identifier,
        'conversion_identifier' => $conversion_identifier,
        'nome' => $name,
        'telefone' => $phone,
        'Setor_OK' => $company_sector,
        'quantidade-de-funcionarios_OK' => $company_employees,
        'empresa' => $company,
        'CargoNovo' => $company_office,
        'convidados-trial' => $company_invite,
        'tipo-pedido' => $order_type,
        'GPTW' => $company_certificate,
        'rede-url' => $company_url,
        'origem-pedido' => $conversion_identifier,
        'data-final' => date('d/m/Y',strtotime('+30 days')),
        // 'traffic_source' => $_POST['trafego'],
        // 'tech' => $_POST['tech'],
        // 'primeiro-passo' => $_POST['primeiro_passo'],
        // 'finalizou' => $_POST['finalizou'],
      ));

      if($returnoRD != 202){
        throw new Exception('Erro ao enviar lead para RD');
      }

      //Send data to PQL Report
      $url = 'https://website-api.socialbase.com.br/pql';
      $data = array(
        'name' => $name,
        'email' => $email,
        'company' => $company,
        'company_size' => $company_employees,
        'job_title' => $company_office,
        'phone' => $phone,
        'department' => $company_sector,
        'tipo_pedido' => $order_type,
        'origin' => $conversion_identifier,
        'conversion_identifier' => $conversion_identifier,
        'gptw' => $company_certificate,
        'invites' => $invites,
        'started_at' => date("m/d/Y"),
        'end_at' => date('m/d/Y',strtotime('+30 days')),
        'url' => $company_url,
        'department_job' => $company_sector . '|' . $company_office,
        'origin_tipo' => $conversion_identifier . '|' . $order_type,
        'company_companysize' => $company . '|' . $company_employees,
        // 'traffic_source' => $_POST['traffic_source'],
        'tech' => $tech,
        // 'lead_help' => $_POST['lead_help'],
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
        throw new Exception('Erro ao enviar para o relatório');
      }

      unset($_POST['id']);
      $array = array(
        'url' => $company_url,
        'email' => $email,
      );

      $array = json_encode($array);
      echo $array;

    } catch(Exception $e){
        echo $e -> getMessage();
    }
  }
?>
