<?php
header('Content-Type: application/json');
require('../config.php');
require('../functions.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $input = filter_input_array(INPUT_POST);
} else {
  $input = filter_input_array(INPUT_GET);
}

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Połączenie do bazy MySQL nieudane: ' . mysqli_connect_error()));
  exit;
}

if ($input['action'] == 'edit') {
  $arr = array(sanitize_input($input['Hidden_Q1']), sanitize_input($input['Hidden_Q2']), sanitize_input($input['Hidden_Q3']));
  $json_hidden = json_encode($arr);
  
  DBi::$db->query("UPDATE `users` SET `imie` = '".sanitize_input($input['Imie'])."', `nazwisko` = '".sanitize_input($input['Nazwisko'])."', `email` = '".sanitize_input($input['Email'])."', `opis` = '".sanitize_input($input['Opis'])."', `stanowisko` = '".sanitize_input($input['Stanowisko'])."', `json_form` = '".$json_hidden."' WHERE `users`.`id` = ".sanitize_input($input['id']).";");
} else if ($input['action'] == 'delete') {
  DBi::$db->query("DELETE FROM `users` WHERE `users`.`id` = ".sanitize_input($input['id'])."");
}


echo json_encode($input);