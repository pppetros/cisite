<div class="in_form">
	<!-- <h1>Login</h1> -->
	<?php 
	echo validation_errors();
	echo form_open('login/validate_login');
		echo form_label('Username', 'username');
		echo form_input('username', set_value('username'));

		echo "&nbsp;";

		echo form_label('Password', 'password');
		echo form_password('password', '');

		echo form_submit('submit', 'Submit', 'class="button button-small"');
		echo anchor('site/signup', 'Sign Up', 'class="button button-small"');
	echo form_close();
	?>
</div>

