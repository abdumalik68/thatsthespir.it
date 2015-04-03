
<?php
$errors = (isset($_SESSION['errors'])) ? $_SESSION['errors']  : array();
?>

<form method="post" class="pure-form pure-form-stacked">
	<h1>Come to the bright side.</h1>
	<label for="username">What user name hast thou ?</label>
	<input type="text" id="username" name="username" value="<?php echo (isset($_SESSION['post']['username'])) ? $_SESSION['post']['username']: ''; ?>" class="pure-input-1-4">
		<?php echo display_error($errors, 'username'); ?>

	<label for="password">And thou password is ?</label>
	<input type="password" id="password" name="password" value="<?php echo (isset($_SESSION['post']['password'])) ? $_SESSION['post']['password']: ''; ?>" class="pure-input-1-4">
		<?php echo display_error($errors, 'password'); ?>
	<input type="submit" value="Sign in" class="pure-button pure-button-primary">
</form>
<?php
unset($_SESSION['errors']);
unset($_SESSION['post']);