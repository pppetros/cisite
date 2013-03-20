<div class="12u">
	<style>
		* {
			font-family: Arial;
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
		}
		td, th {
			border: 1px solid #666666;
			padding:  4px;
		}
		div {
			margin: 4px;
		}
		.sort_asc:after {
			content: "▲";
		}
		.sort_desc:after {
			content: "▼";
		}
	</style>
</head>
<body>
	<?php $attributes = array('method' => 'get', 'id' => 'filters');
		  echo form_open('site', $attributes); ?>
		<div>
			<?php echo form_label('Email:', 'email'); ?>
			<?php echo form_input('email', set_value('email'), 'id="email"'); ?>
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
	
	<!---------------------------------------->

	<div>
		Found <?php echo $num_results; ?> members searching only for
		<ul>
			<li>Email: <?php echo $this->session->userdata('f_email');?></li>
		</ul>
	</div>
	
	<!--Save session's userdata as vars for links
		TODO na prostheso asc h desc kai poia column itane-->
	<?php $f_email = $this->session->userdata('f_email');?>

	<table>
		<thead>
			<?php foreach($fields as $field_name => $field_display): ?>
			<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
				<?php echo anchor("site/index/$field_name/" .
					(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc')  . 
					"?f_email=$f_email",
					$field_display); ?>
			</th>
			<?php endforeach; ?>
		</thead>
		
		<tbody>
			<?php foreach($members as $member): ?>
			<tr>
				<?php foreach($fields as $field_name => $field_display): ?>
				<td>					
					<?php 
					//TODO na to ftiakso na deixnei mono date oxi timestamp. 
					echo ($member->$field_name != 'date_ref') ? $member->$field_name : strftime('%B %d, %y', $member->$field_name);
					?>
				</td>
				<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>			
		</tbody>
		
	</table>
	
	<?php if (strlen($pagination)): ?>
	<div>
		Pages: <?php echo $pagination; ?>
	</div>
	<?php endif; ?>
	<!--<h2> hello - banner intro</h2>
	<!--<div class="7u">
		<h2>Χαίρετε!</h2>
		<p>Αν θέλετε Αμοιβαία Μετάθεση, είστε στο σωστό μέρος!</p>
	</div>
	<div class="5u">
		<ul>
			<li><a href="#" class="button button-big button-icon button-icon-rarrow">Αναζήτηση</a></li>
			<li><a href="#" class="button button-alt button-big button-icon button-icon-question">Βοήθεια</a></li>
		</ul>
	</div> -->
</div>