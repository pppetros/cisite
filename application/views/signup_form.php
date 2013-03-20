<!--TODO Na to ftiakso sto validation error na min to deixnei kai pano apo
to login. Isos na valo form_error dipla se kathe field, na doso onomata
stis formes kai na allakso onomata sta fields p.x. username pou taytizontai
-->
<!--Sign Up Form-->							
<div class="12u">
	<?php echo form_open('login/create_member');?>	
	<div class="error"><?php echo validation_errors();?></div>								
	<h2>Create an Account!</h2>
	<fieldset>
		<legend>Login Info</legend>
		<?php
		echo form_input('user', set_value('user', 'Username'));
		echo form_password('pass', '');
		echo form_password('pass2', '');
		?>
	</fieldset>
	<fieldset>
		<legend>Personal Information</legend>
		<?php
		echo form_input('first_name', set_value('first_name', 'First Name'));
		echo form_input('last_name', set_value('last_name', 'Last Name'));
		echo form_input('email_address', set_value('email_address', 'Email Address'));
		echo form_input('group', set_value('group', 'Ειδικότητα'));
		echo form_input('years', set_value('years', 'Χρόνια Υπηρεσίας'));
		?>
	</fieldset>
	<?php
	echo form_submit('submit', 'Create Acccount', 'class="button"');
	echo form_close();
	?>
</div>