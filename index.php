<?php
include_once "connect.php";
//receiving the parameters
header("Content-type:text/plain");

$number=$_REQUEST['number'];

$sessionId=$_REQUEST['sessionId'];
$sessionCode=$_REQUEST['sessionCode'];
$text=$_REQUEST['text'];

$array=explode("*", $text);
$level=count($array);
// echo "$level"; used to check the level you are

if ($level==1) {
$string="Welcome to Martin's Hospital\n1.Patient Follow up \n2.Book Appointment\n3.Radiology Services\n4.Lab Services \n5.Ambulance Services\n Powered by Martin Mwangi ";
proceed ($string);
}
else{
    
    switch ($array[1]) {
    	case 1:
    		//call the functions
    	Patient();
    		break;
    		case 2:
    		Book();
    		break;
        case 3:
        Radiology();
        break;
        case 4:
        Lab();
        break;
        case 5:
        Ambulance();
        break;
    	
    	default:
    		echo "invalid selection";
    		break;
    }

}






//*****************************************************************************************************//
//create a function below if to call

function Patient()
{
	global $level;
	global $array;
	

 if ($level==2) {

 	$string="Select action \n1.Check Dosage prescription\n2.Check clinic Day\n3.Check Bill";
 	proceed($string);
 }
 	
 	//we switch again
 	if($level==3)
 	{
 		
 	switch ($array[2]) {
 		case 1:
 			     echo "enter patient id number";
 			break;
 			case 2:
 			      echo "enter patient id number";;
 			break;
 			case 3:
 			     echo "enter patient id number";;
 			break;
      
 		default:
 			echo "invalid selection";
 			break;
 	}


}
///////////////////////when the selection to check dosage is made
if ($level==4 && $array[2]==1) {
	global $number;
  


$result=mysql_query("SELECT dosage from patientrecord where phonenumber='$number'");
$count=mysql_num_rows($result);


  $row=mysql_fetch_array($result);
  $dosage=$row[0];
  $patientid=$array[2];




if($count>=1 && $dosage!=""){
  
   echo "your dosage is \n $dosage \n please take your drugs as prescribed";

  }
  else {
    echo "you have no drugs prescribed";
  }


  
}
////////////////////selection to check next clinic  day
if ($level==4 && $array[2]==2) {
  global $number;


$result=mysql_query("SELECT nextclinic from patientrecord where phonenumber='$number'");
$count=mysql_num_rows($result);


  $row=mysql_fetch_array($result);
  $nextclinic=$row[0];
  $patientid=$array[2];

 if($count>=1 && $nextclinic!=""){
  
   echo "your nextclinic is on $nextclinic,please come early";

  }
  else {
    echo "you have no other clinic followup";
  }
       
}


//////////////selection to check bill
if ($level==4 && $array[2]==3) {
  global $number;



$result=mysql_query("SELECT bill from patientrecord where phonenumber='$number'");
$count=mysql_num_rows($result);


  $row=mysql_fetch_array($result);
  $bill=$row[0];
  $patientid=$array[2];

   if($count>=1 && $bill!=""){
  
   echo "your bill is  $bill";

  }
  else {
    echo "you have no outstanding  balance";
  }
       
}



}

/**************************************************************************************************************/
function Book()
{
  global $level;
  global $array;
  

 if ($level==2) {

  $string="Select department \n1.Pediatric\n2.Cardiology\n3.Oncology\n4.Physiotherapy\n5.Counselling";
  proceed($string);
 }
  
  //we switch again
  if($level==3)
  {
    
  switch ($array[2]) {
    case 1:
           echo "enter date ";
      break;
      case 2:
            echo "enter date";;
      break;
      case 3:
           echo "enter date";;
      break;
      case 4:
           echo "enter date";;
      break;
      case 5:
           echo "enter date";;
      break;
      
    default:
      echo "invalid selection";
      break;
  }


}
///////////////////////when the selection to book pedriatic//////////////////////////////////////////////////////
if ($level==4 && $array[2]==1) {
 
  global $number;
  global $array;
   $pediatric=$array[2];

  $datee=$array[3];

$okey=mysql_query("INSERT INTO booky
(tid,phone,dat,department) VALUES('','$number','$datee','$pediatric')");

if($okey)
{

  
  echo "you have successfuly booked an appointment on date $datee,\n in Pediatric department. please come early.";
  
}
else{
  echo "unsuccesful,please try again";
}

  
}
/////////cardiology
if ($level==4 && $array[2]==2) {
 
  global $number;
  global $array;
   $cardiology=$array[2];

  $datee=$array[3];

$okey=mysql_query("INSERT INTO booky
(tid,phone,dat,department) VALUES('','$number','$datee','$cardiology')");

if($okey)
{

  
  echo "you have successfuly booked an appointment on date $datee,\n in Cardiology department. please come early.";
  
}
else{
  echo "unsuccesful,please try again";
}

  
}

///oncology

if ($level==4 && $array[2]==3) {
 
  global $number;
  global $array;
   $oncology=$array[2];

  $datee=$array[3];

$okey=mysql_query("INSERT INTO booky
(tid,phone,dat,department) VALUES('','$number','$datee','$oncology')");

if($okey)
{

  
  echo "you have successfuly booked an appointment on date $datee,\n in Oncology department. please come early.";
  
}
else{
  echo "unsuccesful,please try again";
}

  
}
/////physiotherapy
if ($level==4 && $array[2]==4) {
 
  global $number;
  global $array;
   $phsiotherapy=$array[2];

  $datee=$array[3];

$okey=mysql_query("INSERT INTO booky
(tid,phone,dat,department) VALUES('','$number','$datee','$phsiotherapy')");

if($okey)
{

  
  echo "you have successfuly booked an appointment on date $datee, \n
  in Physiotherapy department. please come early.";
  
}
else{
  echo "unsuccesful,please try again";
}

  
}

///counselling
if ($level==4 && $array[2]==5) {
 
  global $number;
  global $array;
   $counselling=$array[2];

  $datee=$array[3];

$okey=mysql_query("INSERT INTO booky
(tid,phone,dat,department) VALUES('','$number','$datee','$counselling')");

if($okey)
{

  
  echo "you have successfuly booked an appointment on date $datee,\n1. in Counselling department. please come early.";
  
}
else{
  echo "unsuccesful,please try again";
}

  
}




}
//*****************************************************************************************************************************//


function Radiology(){

global $level;
 if ($level==2) {

  $string="Services offered at our diagnostic imaging centre.
   \n1.CT Scans\n2.Flouroscopy\n3.Ultrasound\n4.Interventional\n5.Mammography\n6.X-rays\n7.OPG\n8.ERCP\n9.Cardiac catheterization\n10.Echocardiography";
  terminate($string);
 }

}

//*****************************************************************************************************************************//

function Lab(){

global $level;
 if ($level==2) {

  $string="Services offered at our Laboratory centre.
   \n1.CT Scans\n2.Flouroscopy\n3.Ultrasound\n4.Interventional\n5.Mammography\n6.X-rays\n7.OPG\n8.ERCP\n9.Cardiac catheterization\n10.Echocardiography";
  terminate($string);
 }

}

//*****************************************************************************************************************************//
    function Ambulance(){

global $level;
 if ($level==2) {

  $string="We offer 24/7 Ambulance Services Dial  the nearest location.
   \n1.Nairobi  tel:0210365488\n2.Mombasa tel:02065978995\n3.Nyeri tel:1203654789\n4.Meru tel:02136545799\n5.Machakos tel:045620123\n6.Garrissa  tel:02302146987\n7.Nakuru tel:021456879\n8.Eldoret tel:0231456985\n9.Kisumu tel:0456321799\n10.Kakamega tel:036987456";
  terminate($string);
 }

}
//****************************************************************************************************************************///
function proceed($string) {
  echo "CON $string";

}
function terminate($string) {
  echo "END $string";

}
function attach() {
  
  mysql_connect("localhost","root");
  mysql_select_db(mpesa);
}

?>