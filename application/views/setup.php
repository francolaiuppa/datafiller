<?php
$CI =& get_instance();
$CI->load->view('header');
?>
<h1>Setup Database Details</h1>
<?=form_open('setup')?>
<?php if ($error != '') { ?>
<div class="alert alert-error">
	<?=$error?>
</div>
<?php } ?>
<?=validation_errors('<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>','</div>')?>
<label>Protocol</label>
<select name="protocol">
	<option value="mysql" selected="selected">MySQL</option>
	<option value="mysqli">MySQLi</option>
	<option value="postgre">Postgre</option>
	<option value="odbc">ODBC</option>
	<option value="mssql">MSSQL</option>
	<option value="sqlite">SQLite</option>
	<option value="oci8">OCI8</option>
</select>
<label>Hostname</label>
<input type="text" name="hostname" value="localhost" />
<label>Username</label>
<input type="text" name="username" />
<label>Password</label>
<input type="text" name="password" />
<label>Database</label>
<input type="text" name="database" />
<br/>
<input type="submit" value="Connect" class="btn btn-primary btn-large" />
<?=form_close()?>