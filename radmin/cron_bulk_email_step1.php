<?php


      error_reporting(0);

      include __DIR__ . '/../config.php';
      require_once(__DIR__ . "/../db_connect.php");

        echo 'Starting Process';



      $select_sql = "SELECT  * FROM  url_mail_schedule WHERE status = '0' LIMIT 0,1 ";


      $result_sql = mysqli_query($GLOBALS["___mysqli_ston"], $select_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$select_sql);


      $number_res = mysqli_num_rows($result_sql);


      echo '$number_res => ' . $number_res ."<br/>";


      


      if($number_res == 0){

         print('No records in Queue 1');
         die("No records in Queue");


      }

      print('Moving from Queue 1');


      


      #-------------------------------------------------------------------------------------------------------


      #=======================================================================================================


      #-------------------------------------------------------------------------------------------------------





      if($number_res > 0){


   


         


            $schedule_row = mysqli_fetch_array($result_sql);


         if($schedule_row['user_status'] == "all"){


            $sql = "";


         }


         if($schedule_row['user_status'] == "L"){


            $sql = "AND status = 'L'";


         }


         if($schedule_row['user_status'] == "W"){


            $sql = "AND status = 'W'";


         }


        


         #-------------------------------------------------------------------------------------------------------


         #=======================================================================================================


         #-------------------------------------------------------------------------------------------------------


      	 $sel_sql = "SELECT * FROM users WHERE id > '0' $sql  ORDER BY id ASC";





         #echo '$sel_sql => ' . $sel_sql ."<br/>";





	     $res_sql = mysqli_query($GLOBALS["___mysqli_ston"], $sel_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_sql);


         $num_res = mysqli_num_rows($res_sql);





         #echo '$num_res => ' . $num_res ."<br/>";





         if($num_res == 0){


            echo 'No records in Queue 2';
            die("No records in Queue");


         }





         #-------------------------------------------------------------------------------------------------------


         #=======================================================================================================


         #-------------------------------------------------------------------------------------------------------


         if($num_res > 0){


            


            while($user_row = mysqli_fetch_array($res_sql)){


                  


                  #echo  "{$user_row['user_id']} : {$user_row['email']} <br/>";


            


                  $time     = time();


                  $ins_sql  = "INSERT INTO      url_mail_process

                               SET 
                                     sid      = '{$schedule_row['id']}',

                                     uid      = '{$user_row['id']}',

                                     token_id = '$time'


                              ";


                  


                  #echo $ins_sql ."<br>"; 


                             


                  mysqli_query($GLOBALS["___mysqli_ston"], $ins_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ins_sql);


                  echo mysqli_error($GLOBALS["___mysqli_ston"]);


               


            }//end-while    





         }//end-if


         #-------------------------------------------------------------------------------------------------------


         #=======================================================================================================


         #-------------------------------------------------------------------------------------------------------


         


   


              $ups_sql  = "UPDATE   url_mail_schedule    SET   status    = '1'

                           WHERE  id = '{$schedule_row['id']}'       ";


              
              // $ups_sql;  
                   


              mysqli_query($GLOBALS["___mysqli_ston"], $ups_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_sql);
         


      }//endif  


      #-------------------------------------------------------------------------------------------------------


      #=======================================================================================================


      #-------------------------------------------------------------------------------------------------------


      


      


?>