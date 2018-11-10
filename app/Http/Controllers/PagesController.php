<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Location;



class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

		  public function curl(){

        $data = DB::table('toll_url')->get();
        //return $data;
		    	
        foreach($data as $data1):{

        $url=$data1->url;
        
        //return $url;
		    	//print_r(get_data($url));
        $state=$data1->state;
        $seo_state= $this->format_uri($state,$separator = '-');
        $nh_no=$data1->nh_no;
        $toll_plaza_name=$data1->toll_name;
        $seo_toll_plaza_name=$this->format_uri($toll_plaza_name,$separator = '-');
        $toll_plaza_location=$data1->toll_location;

     //***************************From URL Start***************************   
       //    $url='http://tis.nhai.gov.in/TollInformation?TollPlazaID=10';
		    	$result = $this->get_data($url);
		    	$returned_content=(string) $result;
       //    //echo $returned_content;

     //***************************From URL Stop***************************   
          
           	 //echo $toll_plaza =$this-> getBetwee$returned_content,"Information Toll Plaza Information","Stretch");
               //$header =$this-> getBetween($returned_content,"Toll Plaza Information","Stretch");
               //$header1=strpos($header,'I');
               //$header2=substr($header1,1000,20);

               //echo $header;
               //$state =$this-> getBetween($returned_content,"Home","Tollable Length");
               // $pos1 = strpos($returned_content,"Toll Plaza Information");
               // $toll=strpos($returned_content,"Toll Plaza Information",$pos1+1);
               // //$tollplaza =substr($this-> getBetween($returned_content,"Toll Plaza Information","Stretch"),$toll+2,16);
               // $tollplaza=substr($returned_content,$toll+12,100);
               //echo $tollplaza;
           	   



              $stretch1 =$this-> getBetween($returned_content,"Stretch :","Tollable");
              $stretch=strip_tags($stretch1);
           	  $tollable_len =strip_tags(substr($this-> getBetween($returned_content,"Tollable Length :","Fee Effective Date :"),4,16));
           	  $fee_effective_date1 =strip_tags($this-> getBetween($returned_content,"Fee Effective Date :","Due date of toll revision :"));
           	  $fee_effective_date=str_replace("&nbsp;", "", $fee_effective_date1);
              $due_date_toll_revision =strip_tags(substr($this-> getBetween($returned_content,"Due date of toll revision :","Type of"),1	,15));
           	  $date_fee_notification =substr($this-> getBetween($returned_content,"Date of fee notification","Commercial Operation Date"),9,11);
           	  $commercial_operation_date1 =$this-> getBetween($returned_content,"Commercial Operation Date","Fee Rule");
           	  $commercial_operation_date=strip_tags($commercial_operation_date1);
              $fee_rule =strip_tags($this-> getBetween($returned_content,$commercial_operation_date1."Fee Rule","Capital"));
              $project_capital_cost =strip_tags($this-> getBetween($returned_content,"Capital Cost of Project (in Rs. Cr.)","Cumulative "));
           	  

           	  $concessions_period =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Concessions Period","Design Capacity (PCU)")));
           	  $pcu =strip_tags($this-> getBetween($returned_content,"Design Capacity (PCU)","Traffic (PCU/day)"));
           	  $traffic =strip_tags($this-> getBetween($returned_content,"Traffic (PCU/day)","Target"));
              //$traffic1=strpos($traffic,' ');
              //echo $traffic1;
           	  $concessionaire_name =strip_tags($this-> getBetween($returned_content,"OMT Contractor","Name / Contact Details of Incharge"));
           	  $incharge_name =strip_tags($this-> getBetween($returned_content,"Name / Contact Details of Incharge","Download"));
           	  
           	  //Facilities Available Near Toll Plaza
           	  $reset_area =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Rest Areas :","Truck")));
           	  $truck_lay =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Truck Lay byes :","Static Weigh ")));
           	  $byes =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Static Weigh","Bridge")));
              $static_weight_bridge =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Bridge :","Announcement")));
           	  
              $announcement_date =strip_tags($this-> getBetween($returned_content,"Announcement","Important"));
           	  
           	  //Important Information
           	  $helpline_no =strip_tags($this-> getBetween($returned_content,"Helpline No. :","Emergency "));
           	  $emergency_service =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Services :","Nearest ")));
           	  $nearest_police_station =strip_tags($this-> getBetween($returned_content,"Station:","Highway "));
           	  $project_director =strip_tags($this-> getBetween($returned_content,"Director):","Project"));
           	  $piu =strip_tags($this-> getBetween($returned_content,"Unit(PIU)","Regional"));
           	  $ro =strip_tags($this-> getBetween($returned_content,"Office(RO)","Representative"));
           	  $representative_of_consultant =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Consultant","Representative")));
           	  $representative_of_concessionaire =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Representative of Concessionaire:","Nearest")));
              $nearest_hospital =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Nearest Hospital(s):","Conceptualized")));
           	  $concessions =strip_tags($this-> getBetween($returned_content,"concessions","Facilities Available Near Toll Plaza"));
           	  
           	  //Vehicle type
              $car =trim($this-> getBetween($returned_content,"Car/Jeep/Van","LCV"));
           	  //$car =preg_replace("/[^a-zA-Z0-9.]/", "",$car );
               //$car = preg_replace('/\<[\/]?(table|tr|td)([^\>]*)\>/i', '', $car);
           	  $car_len=strlen($car);  
           	  $car_single_pos=strpos($car,'.');
           	  $car_single1=substr($car,9,$car_single_pos+2);
              $car_single=strip_tags($car_single1);
           	  $car_return_pos=strpos($car,'.',$car_single_pos+1);
           	  $car_return=preg_replace("/[^a-zA-Z0-9.]/", "",substr($car,strlen($car_single1)+10,($car_return_pos-(strlen($car_single1)+9))+2));
           	  $car_monthly_pass_pos=strpos($car,'.',$car_return_pos+1);
           	  $car_monthly_pass=preg_replace("/[^a-zA-Z0-9.]/", "",substr($car,strlen($car_single1)+strlen($car_return)+19,($car_monthly_pass_pos-(strlen($car_single1)+strlen($car_return)+18)+2)));
              $car_com_vehicle_pos=$car_monthly_pass_pos+3;
              $car_com_vehicle=strip_tags(substr($car,$car_com_vehicle_pos));
           	  //$test=strlen($car_single)+strlen($car_return)+19;

              $lcv =trim($this-> getBetween($returned_content,"LCV","Bus"));
              $lcv_len=strlen($lcv);
              $lcv_single_pos=strpos($lcv,'.');
              $lcv_single1=substr($lcv,9,$lcv_single_pos+2);
              $lcv_single=strip_tags($lcv_single1);
              //echo $lcv;
              $lcv_return_pos=strpos($lcv,'.',$lcv_single_pos+1);
              $lcv_return=preg_replace("/[^a-zA-Z0-9.]/", "",substr($lcv,strlen($lcv_single1)+10,($lcv_return_pos-(strlen($lcv_single1)+9))+2));
              $lcv_monthly_pass_pos=strpos($lcv,'.',$lcv_return_pos+1);
              $lcv_monthly_pass=preg_replace("/[^a-zA-Z0-9.]/", "",substr($lcv,strlen($lcv_single1)+strlen($lcv_return)+19,($lcv_monthly_pass_pos-(strlen($lcv_single1)+strlen($lcv_return)+18)+2)));
              $lcv_com_vehicle_pos=$lcv_monthly_pass_pos+3;
              $lcv_com_vehicle=strip_tags(substr($lcv,$lcv_com_vehicle_pos));

              $bus =trim($this-> getBetween($returned_content,"Bus/Truck","Upto 3 Axle Vehicle"));
              $bus_len=strlen($bus);
              $bus_single_pos=strpos($bus,'.');
              $bus_single1=substr($bus,9,$bus_single_pos+2);
              $bus_single=strip_tags($bus_single1);
              $bus_return_pos=strpos($bus,'.',$bus_single_pos+1);
              $bus_return=$car =preg_replace("/[^a-zA-Z0-9.]/", "",substr($bus,strlen($bus_single1)+10,($bus_return_pos-(strlen($bus_single1)+9))+2));
              $bus_monthly_pass_pos=strpos($bus,'.',$bus_return_pos+1);
              $bus_monthly_pass=$car =preg_replace("/[^a-zA-Z0-9.]/", "",substr($bus,strlen($bus_single1)+strlen($bus_return)+19,($bus_monthly_pass_pos-(strlen($bus_single1)+strlen($bus_return)+18)+2)));
              $bus_com_vehicle_pos=$bus_monthly_pass_pos+3;
              $bus_com_vehicle=strip_tags(substr($bus,$bus_com_vehicle_pos));

              $axle3_vehicle =trim($this-> getBetween($returned_content,"Upto 3 Axle Vehicle","4 to 6 Axle"));
              $axle3_vehicle_len=strlen($axle3_vehicle);
              $axle3_vehicle_single_pos=strpos($axle3_vehicle,'.');
              $axle3_vehicle_single1=substr($axle3_vehicle,9,$axle3_vehicle_single_pos+2);
              $axle3_vehicle_single=strip_tags($axle3_vehicle_single1);
              $axle3_vehicle_return_pos=strpos($axle3_vehicle,'.',$axle3_vehicle_single_pos+1);
              $axle3_vehicle_return=preg_replace("/[^a-zA-Z0-9.]/", "",substr($axle3_vehicle,strlen($axle3_vehicle_single1)+10,($axle3_vehicle_return_pos-(strlen($axle3_vehicle_single1)+9))+2));
              $axle3_vehicle_monthly_pass_pos=strpos($axle3_vehicle,'.',$axle3_vehicle_return_pos+1);
              $axle3_vehicle_monthly_pass=preg_replace("/[^a-zA-Z0-9.]/", "",substr($axle3_vehicle,strlen($axle3_vehicle_single1)+strlen($axle3_vehicle_return)+19,($axle3_vehicle_monthly_pass_pos-(strlen($axle3_vehicle_single1)+strlen($axle3_vehicle_return)+18)+2)));
              $axle3_vehicle_com_vehicle_pos=$axle3_vehicle_monthly_pass_pos+3;
              $axle3_vehicle_com_vehicle=strip_tags(substr($axle3_vehicle,$axle3_vehicle_com_vehicle_pos));

              $axle46_vehicle =trim($this-> getBetween($returned_content,"4 to 6 Axle","HCM/EME"));
              $axle46_vehicle_len=strlen($axle46_vehicle);
              $axle46_vehicle_single_pos=strpos($axle46_vehicle,'.');
              $axle46_vehicle_single1=substr($axle46_vehicle,9,$axle46_vehicle_single_pos+2);
              $axle46_vehicle_single=strip_tags($axle46_vehicle_single1);
              $axle46_vehicle_return_pos=strpos($axle46_vehicle,'.',$axle46_vehicle_single_pos+1);
              $axle46_vehicle_return=preg_replace("/[^a-zA-Z0-9.]/", "",substr($axle46_vehicle,strlen($axle46_vehicle_single1)+10,($axle46_vehicle_return_pos-(strlen($axle46_vehicle_single1)+9))+2));
              $axle46_vehicle_monthly_pass_pos=strpos($axle46_vehicle,'.',$axle46_vehicle_return_pos+1);
              $axle46_vehicle_monthly_pass=preg_replace("/[^a-zA-Z0-9.]/", "",substr($axle46_vehicle,strlen($axle46_vehicle_single1)+strlen($axle46_vehicle_return)+19,($axle46_vehicle_monthly_pass_pos-(strlen($axle46_vehicle_single1)+strlen($axle46_vehicle_return)+18)+2)));
              $axle46_vehicle_com_vehicle_pos=$axle46_vehicle_monthly_pass_pos+3;
              $axle46_vehicle_com_vehicle=strip_tags(substr($axle46_vehicle,$axle46_vehicle_com_vehicle_pos));

              $hcm =trim($this-> getBetween($returned_content,"HCM/EME","7 or more Axle"));
              $hcm_len=strlen($hcm);
              $hcm_single_pos=strpos($hcm,'.');
              $hcm_single1=substr($hcm,9,$hcm_single_pos+2);
              $hcm_single=strip_tags($hcm_single1);
              $hcm_return_pos=strpos($hcm,'.',$hcm_single_pos+1);
              $hcm_return=preg_replace("/[^a-zA-Z0-9.]/", "",substr($hcm,strlen($hcm_single1)+10,($hcm_return_pos-(strlen($hcm_single1)+9))+2));
              $hcm_monthly_pass_pos=strpos($hcm,'.',$hcm_return_pos+1);
              $hcm_monthly_pass=preg_replace("/[^a-zA-Z0-9.]/", "",substr($hcm,strlen($hcm_single1)+strlen($hcm_return)+19,($hcm_monthly_pass_pos-(strlen($hcm_single1)+strlen($hcm_return)+18)+2)));
              $hcm_com_vehicle_pos=$hcm_monthly_pass_pos+3;
              $hcm_com_vehicle=strip_tags(substr($hcm,$hcm_com_vehicle_pos));

              $axle7_vehicle =trim($this-> getBetween($returned_content,"7 or more Axle","Date"));
              $axle7_vehicle_len=strlen($axle7_vehicle);
              $axle7_vehicle_single_pos=strpos($axle7_vehicle,'.');
              $axle7_vehicle_single1=substr($axle7_vehicle,9,$axle7_vehicle_single_pos+2);
              $axle7_vehicle_single=strip_tags($axle7_vehicle_single1);
              $axle7_vehicle_return_pos=strpos($axle7_vehicle,'.',$axle7_vehicle_single_pos+1);
              $axle7_vehicle_return=preg_replace("/[^a-zA-Z0-9.]/", "",substr($axle7_vehicle,strlen($axle7_vehicle_single1)+10,($axle7_vehicle_return_pos-(strlen($axle7_vehicle_single1)+9))+2));
              $axle7_vehicle_monthly_pass_pos=strpos($axle7_vehicle,'.',$axle7_vehicle_return_pos+1);
              $axle7_vehicle_monthly_pass=preg_replace("/[^a-zA-Z0-9.]/", "",substr($axle7_vehicle,strlen($axle7_vehicle_single1)+strlen($axle7_vehicle_return)+19,($axle7_vehicle_monthly_pass_pos-(strlen($axle7_vehicle_single1)+strlen($axle7_vehicle_return)+18)+2)));
              $axle7_vehicle_com_vehicle_pos=$axle7_vehicle_monthly_pass_pos+3;
              $axle7_vehicle_com_vehicle=strip_tags(substr($axle7_vehicle,$axle7_vehicle_com_vehicle_pos));

              DB::insert('insert into toll_plaza_list2 (state,seo_state,nh_no,toll_plaza_name,seo_toll_plaza_name,toll_plaza_location,stretch,tollable_len,fee_effective_date,due_date_toll_revision,date_fee_notification,commercial_operation_date,fee_rule,project_capital_cost,concessions_period,pcu,traffic,concessionaire_name,incharge_name,reset_area,truck_lay,byes,static_weight_bridge,announcement_date,helpline_no,emergency_service,nearest_police_station,project_director,piu,ro,representative_of_consultant,representative_of_concessionaire,nearest_hospital,car_single,car_return,car_monthly_pass,car_com_vehicle,lcv_single,lcv_return,lcv_monthly_pass,lcv_com_vehicle,bus_single,bus_return,bus_monthly_pass,bus_com_vehicle,axle3_vehicle_single,axle3_vehicle_return,axle3_vehicle_monthly_pass,axle3_vehicle_com_vehicle,axle46_vehicle_single,axle46_vehicle_return,axle46_vehicle_monthly_pass,axle46_vehicle_com_vehicle,hcm_single,hcm_return,hcm_monthly_pass,hcm_com_vehicle,axle7_vehicle_single,axle7_vehicle_return,axle7_vehicle_monthly_pass,axle7_vehicle_com_vehicle) 
              values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
              [$state,$seo_state,$nh_no,$toll_plaza_name,$seo_toll_plaza_name,$toll_plaza_location,$stretch,$tollable_len,$fee_effective_date,$due_date_toll_revision,$date_fee_notification,$commercial_operation_date,$fee_rule,$project_capital_cost,$concessions_period,$pcu,$traffic,$concessionaire_name,$incharge_name,$reset_area,$truck_lay,$byes,$static_weight_bridge,$announcement_date,$helpline_no,$emergency_service,$nearest_police_station,$project_director,$piu,$ro,$representative_of_consultant,$representative_of_concessionaire,$nearest_hospital,$car_single,$car_return,$car_monthly_pass,$car_com_vehicle,$lcv_single,$lcv_return,$lcv_monthly_pass,$lcv_com_vehicle,$bus_single,$bus_return,$bus_monthly_pass,$bus_com_vehicle,$axle3_vehicle_single,$axle3_vehicle_return,$axle3_vehicle_monthly_pass,$axle3_vehicle_com_vehicle,$axle46_vehicle_single,$axle46_vehicle_return,$axle46_vehicle_monthly_pass,$axle46_vehicle_com_vehicle,$hcm_single,$hcm_return,$hcm_monthly_pass,$hcm_com_vehicle,$axle7_vehicle_single,$axle7_vehicle_return,$axle7_vehicle_monthly_pass,$axle7_vehicle_com_vehicle]);
          
          }endforeach;

              // $car =$this-> getBetween($returned_content,"Car/Jeep/Van","LCV");
              // //$car =preg_replace("/[^a-zA-Z0-9.]/", "",$car );
              //  $car1 = preg_replace('/\<[\/]?(table|tr|td)([^\>]*)\>/i', '', $car);
              //  // echo $car;
              // $car_len=strlen($car1);
              // $car_single_pos=strpos($car1,'.');
              // $car_single=substr($car1,1,$car_single_pos+2);
              // echo $car_single;

              // //$car_single=substr($car,9,$car_single_pos+2);
              // $car_return_pos=strpos($car,'.',$car_single_pos+1);
              // $car_return=substr($car,strlen($car_single)+10,($car_return_pos-(strlen($car_single)+9))+2);
              // $car_monthly_pass_pos=strpos($car,'.',$car_return_pos+1);
              // $car_monthly_pass=substr($car,strlen($car_single)+strlen($car_return)+19,($car_monthly_pass_pos-(strlen($car_single)+strlen($car_return)+18)+2));
              // $car_com_vehicle_pos=$car_monthly_pass_pos+3;
              // $car_com_vehicle=substr($car,$car_com_vehicle_pos);
              // //$test=strlen($car_single)+strlen($car_return)+19;




           	  //echo $axle7_vehicle_com_vehicle;


              
              //$test=preg_replace("/[^a-zA-Z0-9.]/", "",$bus_return );
                //echo $test;
           	 

           	 
           	 // echo "<b> Car :</b>",$car.
           	 //  "<br><b>Car Single: </b>",$car_single.
           	 //  "<br><br><b>Car return: </b>",$car_return.
             //  "<br><b>Car Monthly Pass: </b>",$car_monthly_pass.
           	 //  "<br><b>Car Commerical Vehicle: </b>",$car_com_vehicle;


             //  echo "<br><br><b> lcv :</b>",$lcv.
             //  "<br><b>lcv Single: </b>",$lcv_single.
             //  "<br><br><b>lcv return: </b>",$lcv_return.
             //  "<br><b>lcv Monthly Pass: </b>",$lcv_monthly_pass.
             //  "<br><b>lcv Commerical Vehicle: </b>",$lcv_com_vehicle;

             //  echo "<br><br><b> bus :</b>",$bus.
             //  "<br><b>bus Single: </b>",$bus_single.
             //  "<br><br><b>bus return: </b>",$bus_return.
             //  "<br><b>bus Monthly Pass: </b>",$bus_monthly_pass.
             //  "<br><b>bus Commerical Vehicle: </b>",$bus_com_vehicle;

             //  echo "<br><br><b> axle3_vehicle :</b>",$axle3_vehicle.
             //  "<br><b>axle3_vehicle Single: </b>",$axle3_vehicle_single.
             //  "<br><br><b>axle3_vehicle return: </b>",$axle3_vehicle_return.
             //  "<br><b>axle3_vehicle Monthly Pass: </b>",$axle3_vehicle_monthly_pass.
             //  "<br><b>axle3_vehicle Commerical Vehicle: </b>",$axle3_vehicle_com_vehicle;

             //  echo "<br><br><b> axle46_vehicle :</b>",$axle46_vehicle.
             //  "<br><b>axle46_vehicle Single: </b>",$axle46_vehicle_single.
             //  "<br><br><b>axle46_vehicle return: </b>",$axle46_vehicle_return.
             //  "<br><b>axle46_vehicle Monthly Pass: </b>",$axle46_vehicle_monthly_pass.
             //  "<br><b>axle46_vehicle Commerical Vehicle: </b>",$axle46_vehicle_com_vehicle;

             //  echo "<br><br><b> hcm :</b>",$hcm.
             //  "<br><b>hcm Single: </b>",$hcm_single.
             //  "<br><br><b>hcm return: </b>",$hcm_return.
             //  "<br><b>hcm Monthly Pass: </b>",$hcm_monthly_pass.
             //  "<br><b>hcm Commerical Vehicle: </b>",$hcm_com_vehicle;

             //  echo
             //  "<br><b>axle7_vehicle Single: </b>",$axle7_vehicle_single.
             //  "<br><br><b>axle7_vehicle return: </b>",$axle7_vehicle_return.
             //  "<br><b>axle7_vehicle Monthly Pass: </b>",$axle7_vehicle_monthly_pass;
             //  //"<br><b>axle7_vehicle Commerical Vehicle: </b>",$axle7_vehicle_com_vehicle;

           	 // // echo "<br><b>"."Details</b><br>";
           	 // // echo $duate_notificatione_date.
           	 // // "<br>",$commerical_date.
           	 // // "<br>",$fees_rule.
           	 // // "<br>",$cost.
           	 // // "<br>",$period.
           	 // // "<br>",$design_capacity.
           	 // // "<br>",$traffic.
           	 // // "<br>",$omt
           	 // // //"<br>",$incharge;

           	  
           	 //  echo "<br><br><b> Stretch: </b>",$stretch.
           	 //  "<br><b>Toll Length: </b>",$tollable_len.
           	 //  "<br><b>Fee Effective Date: </b>",$fee_effective_date.
           	 //  "<br><b>Due Date:</b>",$due_date_toll_revision.
           	 //  "<br><b>Date of fee notification: </b>",$date_fee_notification.
           	 //  "<br><b>Commercial Operation Date:</b>",$commercial_operation_date.
           	 //  "<br><b>Fees Rule:</b>",$fee_rule.
           	 //  "<br><b>Capital Cost of Project (in Rs. Cr.):</b>",$project_capital_cost.
           	 //  "<br><b>Concessions Period:</b>",$concessions_period.
           	 //  "<br><b>Design Capacity (PCU):</b>",$pcu.
           	 //  "<br><b>Traffic (PCU/day):</b>",$traffic.
           	 //  "<br><b>Name of Concessionaire / OMT Contractor:</b>",$concessionaire_name."<br>";	
           	 //  //"<br><b>Name / Contact Details of Incharge:</b>",$incharge_name."<br>";
           	  
      
           	 //  // "<br><b>Rest Areas:</b>", $rest_areas.
           	 //  // "<br><b>Truck Lay byes :</b>",$truck_lay."<br>"

           	 //  ;

           	 //  echo "<br><b>"."Important Information</b><br>";
           	 // echo $helpline_no.
           	 // "<br>",$emergency_service.
           	 // "<br>",$nearest_police_station.
           	 // "<br>",$project_director.
           	 // "<br>",$piu.
           	 // "<br>",$ro.
           	 // "<br>",$representative_of_consultant.
           	 // "<br>",$representative_of_concessionaire.
           	 // "<br>",$nearest_hospital."<br>"
           	 // ;

           	 // echo "<br><b>"."Facilities Available Near Toll Plaza</b><br>";
           	 // echo $reset_area.
           	 // "<br>",$truck_lay.
             // "<br>",$static_weight_bridge.
           	 // "<br>",$announcement_date;
           	 // //"<br>",$bridge;
           	 //  //echo $truck_lay;

           	  
    //        	  $string = preg_replace( '/^[\s]*(.*?)[\s]*$/si', ',', " search string " );
				// print $string;
		    	//print_r($returned_content);
		 //    	$ch = curl_init();
			// $timeout = 5;
			// curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			// $data = curl_exec($ch);
			// curl_close($ch);
		    	//return $data;

		//     	$data=file_get_contents($url);
		//     	$json_object = json_decode($data);
		//     	//var_dump(json_decode($json));           // Object
		// var_dump(json_decode($json, true));
             //}endforeach;
			

		    }

        public function curl1(){

        $data = DB::table('toll_url')->get();
        //return $data;
          
        foreach($data as $data1):{

        $url=$data1->url;
        
        //return $url;
          //print_r(get_data($url));
        $state=$data1->state;
        $seo_state= $this->format_uri($state,$separator = '-');
        $nh_no=$data1->nh_no;
        $toll_plaza_name=$data1->toll_name;
        $seo_toll_plaza_name=$this->format_uri($toll_plaza_name,$separator = '-');
        $toll_plaza_location=$data1->toll_location;
        $url=$data1->url;

     //***************************From URL Start***************************   
       //    $url='http://tis.nhai.gov.in/TollInformation?TollPlazaID=10';
          $result = $this->get_data($url);
          $returned_content=(string) $result;
       //    //echo $returned_content;

     //***************************From URL Stop***************************   
          
             //echo $toll_plaza =$this-> getBetwee$returned_content,"Information Toll Plaza Information","Stretch");
               //$header =$this-> getBetween($returned_content,"Toll Plaza Information","Stretch");
               //$header1=strpos($header,'I');
               //$header2=substr($header1,1000,20);

               //echo $header;
               //$state =$this-> getBetween($returned_content,"Home","Tollable Length");
               // $pos1 = strpos($returned_content,"Toll Plaza Information");
               // $toll=strpos($returned_content,"Toll Plaza Information",$pos1+1);
               // //$tollplaza =substr($this-> getBetween($returned_content,"Toll Plaza Information","Stretch"),$toll+2,16);
               // $tollplaza=substr($returned_content,$toll+12,100);
               //echo $tollplaza;
               



              $stretch1 =$this-> getBetween($returned_content,"Stretch :","Tollable");
              $stretch=strip_tags($stretch1);
              $tollable_len =strip_tags(substr($this-> getBetween($returned_content,"Tollable Length :","Fee Effective Date :"),4,16));
              $fee_effective_date1 =strip_tags($this-> getBetween($returned_content,"Fee Effective Date :","Due date of toll revision :"));
              $fee_effective_date=str_replace("&nbsp;", "", $fee_effective_date1);
              $due_date_toll_revision =strip_tags(substr($this-> getBetween($returned_content,"Due date of toll revision :","Type of"),1  ,15));
              $date_fee_notification =substr($this-> getBetween($returned_content,"Date of fee notification","Commercial Operation Date"),9,11);
              $commercial_operation_date1 =$this-> getBetween($returned_content,"Commercial Operation Date","Fee Rule");
              $commercial_operation_date=strip_tags($commercial_operation_date1);
              $fee_rule =strip_tags($this-> getBetween($returned_content,$commercial_operation_date1."Fee Rule","Capital"));
              $project_capital_cost =strip_tags($this-> getBetween($returned_content,"Capital Cost of Project (in Rs. Cr.)","Cumulative "));
              

              $concessions_period =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Concessions Period","Design Capacity (PCU)")));
              $pcu =strip_tags($this-> getBetween($returned_content,"Design Capacity (PCU)","Traffic (PCU/day)"));
              $traffic =strip_tags($this-> getBetween($returned_content,"Traffic (PCU/day)","Target"));
              //$traffic1=strpos($traffic,' ');
              //echo $traffic1;
              $concessionaire_name =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"OMT Contractor","Name / Contact Details of Incharge")));
              $incharge_name =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Name / Contact Details of Incharge","Download")));
              
              //Facilities Available Near Toll Plaza
              $reset_area =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Rest Areas :","Truck")));
              $truck_lay =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Truck Lay byes :","Static Weigh ")));
              $byes =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Static Weigh","Bridge")));
              $static_weight_bridge =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Bridge :","Announcement")));
              
              $announcement_date =strip_tags($this-> getBetween($returned_content,"Announcement","Important"));
              
              //Important Information
              $helpline_no =strip_tags($this-> getBetween($returned_content,"Helpline No. :","Emergency "));
              $emergency_service =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Services :","Nearest ")));
              $nearest_police_station =strip_tags($this-> getBetween($returned_content,"Station:","Highway "));
              $project_director =strip_tags($this-> getBetween($returned_content,"Director):","Project"));
              $piu =strip_tags($this-> getBetween($returned_content,"Unit(PIU)","Regional"));
              $ro =strip_tags($this-> getBetween($returned_content,"Office(RO)","Representative"));
              $representative_of_consultant =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Consultant","Representative")));
              $representative_of_concessionaire =str_replace("&nbsp;", "",strip_tags($this-> getBetween($returned_content,"Representative of Concessionaire:","Nearest")));
              $nearest_hospital =strip_tags($this-> getBetween($returned_content,"Nearest Hospital(s):","Conceptualized"));
              $concessions =strip_tags($this-> getBetween($returned_content,"concessions","Facilities Available Near Toll Plaza"));


              DB::insert('insert into toll_plaza_list1 (url,state,seo_state,nh_no,toll_plaza_name,seo_toll_plaza_name,toll_plaza_location,stretch,tollable_len,fee_effective_date,due_date_toll_revision,date_fee_notification,commercial_operation_date,fee_rule,project_capital_cost,concessions_period,pcu,traffic,concessionaire_name,incharge_name,reset_area,truck_lay,byes,static_weight_bridge,announcement_date,helpline_no,emergency_service,nearest_police_station,project_director,piu,ro,representative_of_consultant,representative_of_concessionaire,nearest_hospital) 
              values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
              [$url,$state,$seo_state,$nh_no,$toll_plaza_name,$seo_toll_plaza_name,$toll_plaza_location,$stretch,$tollable_len,$fee_effective_date,$due_date_toll_revision,$date_fee_notification,$commercial_operation_date,$fee_rule,$project_capital_cost,$concessions_period,$pcu,$traffic,$concessionaire_name,$incharge_name,$reset_area,$truck_lay,$byes,$static_weight_bridge,$announcement_date,$helpline_no,$emergency_service,$nearest_police_station,$project_director,$piu,$ro,$representative_of_consultant,$representative_of_concessionaire,$nearest_hospital]);
          
          }endforeach;


        }

        private function format_uri( $string, $separator = '-' )
            {
              $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
              $special_cases = array( '&' => 'and', "'" => '');
              $string = mb_strtolower( trim( $string ), 'UTF-8' );
              $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
              $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
              $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
              $string = preg_replace("/[$separator]+/u", "$separator", $string);
              return $string;
            }

        

			    function get_data($url)
						{
						$ch = curl_init();
						$timeout = 5;
						curl_setopt($ch,CURLOPT_URL,$url);
						curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
						curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
						$data = curl_exec($ch);
						curl_close($ch);
						return $data;
						}

			public function curl_test(){
		    	$url='http://tis.nhai.gov.in/TollInformation?TollPlazaID=102';
		    	echo file_get_contents($url);
		    	
		 //    	$ch = curl_init();
			// $timeout = 5;
			// curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			// $result = curl_exec($ch);
			// //var_dump($data);
			// curl_close($ch);
			// $result_arr = json_decode($result, true);
			// print_r($result_arr);
		    	//return $data;

		//     	$data=file_get_contents($url);
		//     	$json_object = json_decode($data);
		//     	//var_dump(json_decode($json));           // Object
		// var_dump(json_decode($json, true));
			

		    }


		    public function getBetween($input,$start,$end){
                $r = explode($start, $input);
                if (isset($r[1])){
                    $r = explode($end, $r[1]);
                    return $r[0];
                }
                return '';
            }

            public function location(){


              // $position = Location::get();
              // return $position;

              //$ip= \Request::ip();
              $ip= '139.59.4.180';
              $data = \Location::get($ip);
              dd($data);



            }

            public function curl_qrcode_count(){

              $ch = curl_init('http://bit.ly/2jYM6i9');
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              if (curl_exec($ch) === false) {
                  echo 'Curl error: ' . curl_error($ch);
              }
              else
              {
                  echo 'Operation completed without any errors';
              }

              // Close handle
              curl_close($ch);
            }
}
