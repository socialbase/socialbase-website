<?php
  header('Access-Control-Allow-Origin: *');
  require("../global/actions/RdStationAPI.php");

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
    $department = $_POST['department'];
    $company_invite = $_POST['company_invite'];
    $phone = '';
    $tech = $_POST['tech'];

    if ($company_invite) {
      $company_invite = explode(',', $company_invite);
    } else {
      $company_invite = 'Não efetuou convites';
    }

    if ($company_url) {
      $company_url = $company_url . '.socialbase.com.br';
    }

    try{
      // SEND TO PQL MANAGER
      // $url = 'https://pql-manager.socialbase.com.br/';
      // $data = array(
      //   'name' => $name,
      //   'email' => $email,
      //   'company_name' => $company,
      //   'password' => $password,
      //   'invites' => '',
      // );

      // $options = array(
      //   'http' => array(
      //     'header'  => "Content-type: application/json",
      //     'method'  => 'POST',
      //     'content' => http_build_query($data),
      //   )
      // );
      // $context  = stream_context_create($options);
      // $result = file_get_contents($url, false, $context);

      //Envia os dados para RD, primeiro argumento é o token privado e o segundo o publico
      $rdAPI = new RDStationAPI("b4c77961b56365cf0c3473428348926d","26a20461c98ce755c35e78c47fd23205");
      $returnoRD = $rdAPI->sendNewLead($email,array(
        'identificador' => $conversion_identifier,
        'nome' => $name,
        'telefone' => $phone,
        'Setor_OK' => $company_sector,
        'qtd_funcionarios' => $company_employees,
        'empresa' => $company,
        'CargoNovo' => $company_office,
        'convidados-trial' => $company_invite,
        'tipo-pedido' => $order_type,
        'GPTW' => $company_certificate,
        'origem-pedido' => $conversion_identifier,
        // 'traffic_source' => $_POST['trafego'],
        // 'data-final' => $_POST['final_date'],
        // 'rede-url' => $_POST['sb_url'],
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
        'invites' => $company_invite,
        'started_at' => date("d/m/y"),
        'end_at' => date('d/m/Y',strtotime('+30 days')),
        'url' => 'null',
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
      echo 'success';

    } catch(Exception $e){
        echo $e -> getMessage();
    }
  }
?>
