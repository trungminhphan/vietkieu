<?php
$arr = array();
for($i=0; $i<57; $i++){
  array_push($arr, array($_GET['columns'][1]['data'],'Satou','Accountant','Tokyo','28th Nov 08','123456'));
}

echo json_encode(
  array('draw' => 0,
        'recordsTotal' => 57,
        'recordsFiltered' => 57,
        'data' => $arr
    ));
?>