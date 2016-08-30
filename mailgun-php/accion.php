<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$name= $_POST['nombre'];
$email=$_POST['email'];
$message=$_POST['message'];

# Instantiate the client.
$mgClient = new Mailgun('key-5aa6341f80ec0a6c1e2671b7444a7b2b');
$domain = "sandbox599ad3c4a39e45c7968462a161ee26f7.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandbox599ad3c4a39e45c7968462a161ee26f7.mailgun.org>',
                        'to'      => $_POST['email'],
                        'subject' => 'Hello'.' '.$_POST['nombre'],
                        'text'    => $_POST['message']));

header('Location:' . getenv('HTTP_REFERER'));
?>
    