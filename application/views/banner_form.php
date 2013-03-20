<?php
	$attributes = array('method' => 'get', 'id' => 'filters');
	//Otan ginetai xrisi filters na epistrefei stin idia taksinomisi
	//poy eixe prin kai oxi na arxizei pali apo to ID
	$site_uri = uri_string();
	//Otan einai me alli taksinomisi se alli selida p.x. site/index/edu_years/20
	//na kovei to 20 oste sta nea filtra na arxizei apo ti selida 1 pali
	$site_uri = (substr($site_uri, -1) == '/') ? substr($site_uri, 0, -1) : $site_uri; // remove trailing slash if present
	$urlparts = explode('/', $site_uri); // explode on slash
	array_pop($urlparts); // remove last part
	$site_uri = implode($urlparts, '/'); // put it back together

	echo form_open($site_uri, $attributes); 
?>
	<div>
		<?php 
			echo form_label('Email:', 'f_email');
			//TODO exo na emfanizei tin eisodo tou xristi an yparxei lathos, allios tin timi apto to session
			//pou einai i teleftaia kataxorisi. An yparxei pio kalos tropos px. xoris set_value i xoris
			//$this->session na to do 
			echo form_input('f_email', set_value('f_email', $this->session->userdata('f_email')), 'id="f_email"');
			echo form_label('Years:', 'f_edu_exper'); 
			echo form_input('f_edu_exper', set_value('f_edu_exper', $this->session->userdata('f_edu_exper')), 'id="f_edu_exper"');  
		?>
	</div>

	<!-- <div>
		<?php echo form_label('Category:', 'category'); ?>
		<?php echo form_dropdown('category', $category_options, 
			set_value('category'), 'id="category"'); ?>
	</div>

	<div>
		<?php echo form_label('Length:', 'length'); ?>
		<?php echo form_dropdown('length_comparison', 
			array('gt' => '>', 'gte' => '>=', 'eq' => '=', 'lte' => '<=', 'lt' => '<') , 
			set_value('length_comparison'), 'id="length_comparison"'); ?>
		<?php echo form_input('length', set_value('length'), 'id="length"'); ?>
	</div> -->

	<div>
		<?php echo form_submit('action', 'Αναζήτηση'); ?>
	</div>
<?php echo form_close(); ?>

<div>
	Found <?php echo $num_results; ?> members searching only for
	<ul>
		<!--TODO NA to vgalo apo edo-->
		<li>Email: <?php echo $this->session->userdata('f_email');?></li>
	</ul>
</div>
