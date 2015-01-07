<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $email_body = "";

    if($name == "" OR $email == "" OR $message == "") {
        echo "You must specify a value for name, email, message";
        exit;
    }

    foreach($_POST as $value){
        if(stripos($value,'Content-Type:')!=FALSE){
            echo "There was a problem with information you entered.";
            exit;
        }
    }

    if($_POST["address"]!="") {
        echo "Your submission has an error.";
        exit;
    }

    require_once("includes/phpmailer/class.phpmailer.php");

    $mail = new PHPMailer();

    if(!$mail->validateAddress($email)){
        echo "You must specify a valid email address.";
        exit;
    }

    $email_body = $email_body . "Name: " . $name . "<br>";
    $email_body = $email_body . "Email: " . $email . "<br>";
    $email_body = $email_body . "Message: " . $message;

    $mail->setFrom($email,$name);
    $address = "sulmanpersonal@gmail.com";
    $mail->addAddress($address,"Shirts 4 Mike");
    $mail->Subject = "PHPMailer Test Subject via mail(), basic " . $name;
    $mail->msgHTML($email_body);

    if(!$mail->Send()) {
        echo "There was a problem sending email. ";
    }

    //echo $email_body;

    // TODO: Send Email

    header("Location: contact.php?status=done");
    exit;
    }
?>

<?php
$pageTitle = "Contact Mile";
$section = "contact";
include('includes/header.php');
?>

    <div class="section page">
        <div class="wrapper">
            <h1>Contact</h1>
            <?php if(isset($_GET["status"]) AND ($_GET["status"] == "done")){ ?>
                <p>Thanks for the email! I&rsquo;ll be in touch shortly.</p>
            <?php }else{ ?>
            <p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>
            <form method="post" action="contact.php">
                <table>
                    <tr>
                        <th>
                            <label for="name">Name</label>
                        </th>
                        <td>
                            <input type="text" name="name" id="name">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="email">Email</label>
                        </th>
                        <td>
                            <input type="text" name="email" id="email">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="message">Message</label>
                        </th>
                        <td>
                            <textarea name="message" id="message"></textarea>
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <th>
                            <label for="address">Address</label>
                        </th>
                        <td>
                            <input type="text" name="address" id="address">
                            <p>Humans (and frogs): please leave this field blank.</p>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Send">
            </form>
            <?php } ?>
        </div>
    </div>
<?php include('includes/footer.php'); ?>