<?php
$CI =& get_instance();
$CI->load->view('header');
?>
<p>Please select a table from the left side, and also:</p>
<div class="well">
	<h1>Remember to <u><?=anchor('backup','backup')?></u> your database before starting!</h1>
</div>
<?php
$CI->load->view('footer');