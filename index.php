<!doctype = HTML>
<html>
  <head>
    <title>Learning PHP</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">


  <style>

    .emailForm {

      border: 1px solid grey;
      border-radius: 10px;
      margin-top: 20px;

    }

  </style>


  </head>
 
  <body>


    <div>

      <?php


        
        if($_POST["submit"]) {

          $name=$_POST["name"];
          $email=$_POST["email"];
          $subject=$_POST["subject"];
          $message=$_POST["message"];


          if(!$_POST["name"]) {

              $error.="<br>Please enter your name";

          }

           if(!$_POST["email"]) {

              $error.="<br>Please enter your email";

          }

          if ($_POST["email"]!="" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
          
              $error.="<br>Please enter a valid email adddress";

          }

           if(!$_POST["subject"]) {

              $error.="<br>Please enter your subject";

          }

           if(!$_POST["message"]) {

              $error.="<br>Please enter your message";

          }

        

          if ($error) {

          $result=
          '<div class="alert alert-danger alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>There were errors in your form:'.$error.'</div>';
          
          $saveName = $_POST['name'];
          $saveEmail = $_POST['email'];
          $saveSubject = $_POST['subject'];
          $saveMessage = $_POST['message'];

          }

          else {

        

            //Sends to the submitter; for real use change to your email
            $emailTo="$email";
            $subject=$subject;
            $body=$message;
            $headers="From: mail@mail.com\n";
            $headers.="Reply-to: $email";

            if(mail($emailTo, $subject, $body, $headers)) {
              $result=
                '<div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Form submitted!</div>';

            }

            else {

              $result=
                '<div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Sorry, there was an error sending your message.  Please try again later.</div>';
            }


          }

        }

      

            

      ?>

    </div>

    <div class="container">

    <div class="row">

    <div class="col-md-6 col-md-offset-3 emailForm">

    <h1>Contact Form</h1>

    <?php echo $result; ?>

      <form method="post">

        <div class="form-group">

          <label for="name">Name</label>
          <input type="text" class="form-control" placeholder="Please enter name" name="name" value="<?php echo $saveName; ?>">

        </div>

        <div class="form-group">

          <label for="email">Email</label>
          <input type="email" class="form-control" placeholder="Please enter email" name="email" value="<?php echo $saveEmail; ?>">

        </div>

        <div class="form-group">

          <label for="subject">Subject</label>
          <input type="text" class="form-control" placeholder="Please enter subject" name="subject" value="<?php echo $saveSubject; ?>">

        </div>

        <div class="form-group">

          <label for"message">Message</label>
          <textarea class="form-control" rows="3" name="message" placeholder="Please enter message"><?php echo $saveMessage; ?></textarea>

        </div>

        <div class="form-group">

            <input class="btn btn-default" type="submit" name="submit" value="Send">

        </div>
      
      </form>

    </div>
    </div>
    </div>



    <!-- jQuery CDN -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
