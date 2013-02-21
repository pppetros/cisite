<div class="in_form">
	<h1>Login</h1>
	<?php 
	echo validation_errors();
	echo form_open('login/validate_login');
	echo form_label('What is your Name', 'username');
	echo form_input('username', set_value('username'));
	echo form_label('Password', 'password');
	echo form_password('password', '');

	echo form_submit('submit', 'Submit');
	echo anchor('login/signup', 'Sign Up');
	echo form_close();
	?>
</div>

