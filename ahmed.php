<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 


            $user = $_POST['username'];
            $email = $_POST['email'];
            $phon = $_POST['phon'];
            $masge = $_POST['masge'];

            //eror
            $formEror = array();

                if (strlen($user)<=3) {
                    $formEror[] ='Characters must be at least 4 characters long '; 
                }

                if (strlen($phon)<11)  //فى حالة لو المدخل نص وريس رقم
                {
                    $formEror[] ='Characters must be at least 11 characters long '; 
                }

                $headers ='from:' .$email . '\r\n'; //from اميل المرسل
                $myemail ='bookfhmto22@gmail.com';//الى اميلك
                $subject = 'contact form';//طباعة الجملة +نص ال texteare
               if(empty($formEror)) {
                echo "$myemail <br>";
                echo "$subject  <br>";
                echo "$masge <br>";
                echo "$headers <br>";
                mail('$myemail','$subject' , $masge ,$headers) ;
               }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1> conect with ME</h1>

    <div class="errors">
               <!-- Check if there are errors and send it to client -->
              <?php
            if (isset($formEror)){ // نشرط التكرار فى حالة ظهور خطا
                //

                 foreach($formEror as $error){
                    echo $error . '<br/>';
                }
            } 
             ?>
 </div>



    </div>
            <form class="contact-from"  action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <input class="form-control" 
            type="text" 
            name="username"
            placeholder="writ user name" />

            <br>
            <input class="form-control" 
            type="email"
            name="email"
            placeholder="wriy your eamil" />

            <br>
            <input class="form-control" 
            
            type="number"
            name="phon"
            maxlength =11
            placeholder="write phone" />
            
            <br>
            <textarea placeholder="your massage"
            name="masge" >
            </textarea>
            <br>
            
        <input class="btn -success" 
        type="submit" 
        value="sen message"/>
            </form>
    </div>
    
</body>
</html>