<?php

include("../database.php");

$id = $_SESSION['inspectorid'];
$qry = "select * from inspector where email='$id'";
$inspector = mysqli_query($conn,$qry);
$res = mysqli_fetch_row($inspector);

$qry = "select * from complaint where status='Registred' AND inspector_id='$res[0]'";
$RegistredComplaints = mysqli_query($conn,$qry);
$RegistredRows = mysqli_affected_rows($conn);

$qry = "select * from complaint where status='In Progress' AND inspector_id='$res[0]' ";
$InProgressComplaints = mysqli_query($conn,$qry);
$InProgressRows = mysqli_affected_rows($conn);

$qry = "select * from complaint where status='Completed' AND inspector_id='$res[0]'";
$CompletedComplaints = mysqli_query($conn,$qry);
$CompletedComplaintsRows = mysqli_affected_rows($conn);

function fetchInspector($conn,$type){
  $profession = "";
  if ($type=="Potholes & Bad Road Conditions"){
    $profession = "Road";
  } else {
    $profession = "Waste";
  }
  $qry = "select * from inspector where profession='$profession'";
  $inspector = mysqli_query($conn,$qry);
  return $inspector;
}
function fetchInspectorName($conn,$id){
  $qry = "select * from inspector where id='$id'";
  $inspector = mysqli_query($conn,$qry);
  $inspectorRows = mysqli_affected_rows($conn);
  return $inspector;
}

function fetchUserName($conn,$id){
  $qry = "select * from user where id='$id'";
  $user = mysqli_query($conn,$qry);
  $userRows = mysqli_affected_rows($conn);
  if ($userRows>0){
      return mysqli_fetch_row($user)[2];
  }
}
 ?>
