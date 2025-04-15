<?php
echo "jk";
die;
$yourname= $_POST['contact_name'];
$email= $_POST['contact_email'];
echo $message1=$_POST['contact_description'];
echo $mobile=$_POST['contact_mobile'];
die;
function sendBasicMail($to,$from,$fromname,$subject,$msg)
{
 if(empty($fromname))
 {

  $fromname = "The bing story";

   }

 if(empty($from))

   {

      $from = 'ruchi@dkd.co.in';

   }

try

    {

      $post = array('from' => $from,

      'fromName' => $fromname,

       'subject' => $subject,

        'bodyHtml' => $msg,

		'isTransactional' => true,

         'to'=>$to,

           );

                 $curl = curl_init();
                 curl_setopt_array($curl, array(

                  CURLOPT_URL => "https://thebingestory.com/EmailService/send2.php",

                 CURLOPT_RETURNTRANSFER => true,

                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                 CURLOPT_CUSTOMREQUEST => "POST",

                 CURLOPT_POSTFIELDS => $post,

               ));

             $response = curl_exec($curl);

     $err = curl_error($curl);
               curl_close($curl);
            if($err)

               {

                 //echo "cURL Error #:" . $err;

                 return false;

               }

               else

               {

                 //echo $response;

                 return true;

               }

                return true;      
       }

       catch(Exception $ex){

                  echo $ex->getMessage();

       }

   }

$msg='
<table border="1" width="80%">
         <tbody>
          <tr>
            <td scope="col">Name</td>
            <td>'.$yourname.'</td>
          </tr>

           <tr>
            <td scope="col">Email</td>
            <td>'.$email.'</td>
          </tr>
          <tr>
            <td scope="col">Mobile</td>
            <td>'.$mobile.'</td>
          </tr>
         <tr>
             <td scope="col">Message</td>
             <td>'.$message1.'</td>
          </tr>
         </tbody>
      </table>
'; 
$retval=sendBasicMail('ruchi@dkd.co.in','ruchi@dkd.co.in','Marketingstroke','Contact us enquiry',$msg);

 if( $retval==1) {
           echo "1";
        }else {
           echo "0";
        }
?>