	<!--TODO Na to kano ston controller
	Save session's userdata as vars for links-->
	<?php $f_email = $this->session->userdata('f_email');
		  $f_edu_exper = $this->session->userdata('f_edu_exper');?>

<table>
	<thead>
		<?php foreach($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			
			<!--TODO Na to kano pio aytomato-->
			<?php echo anchor("site/index/$field_name/" .
				(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc')  . 
				"?f_email=$f_email&amp;f_edu_exper=$f_edu_exper",
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
