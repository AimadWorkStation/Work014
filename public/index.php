<?php 
require '../includes/header.php';
use Twilio\Rest\Client;

if(isset($_POST['send'])){
	if(!empty($_POST['phone']) && !empty($_POST['msg'])){

		$client = new Client($config['account_sid'],$config['auth_token']);

		$client->messages->create(
		    $_POST['phone'],
		    array(
		        'from' => $config['from'],
		        'body' => $_POST['msg']
		    )
		);
		echo "<h3 class='text-center bg-success'>Message sent successfuly</h3>";
	}
}
?>

<h1 class="mt-5 mb-3 w-100">Home Page</h1>
<form class="w-25 m-auto" method="POST" action="#">
	<label for='Phone number'>Phone number</label>
	<input type="text" name='phone' class="form-control mb-2">
	<textarea name="msg" class="form-control mb-2"></textarea>
	<input type="submit" name="send" class="btn btn-primary">
</form>


<?php
require '../includes/footer.php';

