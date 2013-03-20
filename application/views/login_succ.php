<?php 
echo "<div class='in_form'>Hello <span class='highlight-txt'>". $this->session->userdata('username') . "</span>! ";
echo anchor('login/logout', 'Logout', 'class="button button-small"');
echo "</div>";
 ?>