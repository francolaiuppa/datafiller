<?php
$CI =& get_instance();
$CI->load->view('header',array('current_table'=>$table));
?>
<h2>Description for table <?=$table?></h2>
<table class="table table-hover table-stripped table-condensed table-bordered">
  <thead>
    <tr>
      <th>Field</th>
      <th>Type</th>
      <th>Default</th>
      <th>Max Length</th>
      <th>Primary Key</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach ($table_info as $item) { ?>
     <tr>
      <td><?=$item->name?></td>
      <td><?=$item->type?></td>
      <td><?=$item->default?></td>
      <td><?=$item->max_length?></td>
      <td><?=$item->primary_key?></td>
    </tr>
 <?php } ?>
</tbody></table>
<hr/>
<p>This table currently has <span class="badge"><?=$current_row_count?></span> rows.</p> 
<?php if ($current_row_count > 0) { ?>
<h2>Last 10 rows</h2>
<?=$last_10_rows?>
<p>Would you like to <?=anchor('truncate/'.$table,'<strong>truncate</strong>')?> (empty) the table?</p>
<?php } ?>

<hr/>
<h2>Fill with random data</h2>
<h3>Setup fields</h3>
<?=form_open('main/fill_with_random_data/'.$table)?>
<div id="random_data">
	<?php 
	foreach ($table_info as $item) {
		if ($item->primary_key) { continue; } ?>

		 <div class="random_data_item">
		 	<span class="label label-inverse"><?=$item->name?></span> needs to be filled with <?=get_data_filler_types_dropdown($item->name)?>
		 </div>
		 <div class="dynamic"></div>
		 <div class="clear"></div>

<?php } ?>
</div>
<h3>How many records?</h3>
<p>Insert <?=get_insert_rows_dropdown()?> rows. </p> 

<input type="submit" class="btn btn-primary btn-large" value="Fill" />
<?=form_close()?>

<div id="templates_container" style="display: none">
	<div id="tmpl_other_table_key">
		and the other table ID is <select name="">
		<?php 
			$tables = get_tables_array();
			foreach ($tables as $table) {
				echo '<option value="'.$table.'">'.$table.'</option>';
			}
		?>
		</select>.<input type="text" name="" value="id" />
	</div>	

	<div id="tmpl_integer">
		between <input type="number" name="" value="0" class="input-small"> and <input type="number" name="" value="1000"  class="input-small"/>
	</div>

	<div id="tmpl_float">
		between <input type="number" name="" value="0" class="input-small"> and <input type="number" name="" value="1000"  class="input-small"/>
	</div>

	<div id="tmpl_fixed_value">
		which is <input type="text" name="" value="" class="input">
	</div>
	
	<div id="tmpl_fixed_value_multiple">
		which are <input type="text" name="" value="" class="input" placeholder="'RC Helicopter','Airplanes','Terodactyls'" />
	</div>

	<div id="tmpl_md5">
		which is <input type="text" name="" value="" class="input">
	</div>

	<div id="tmpl_between_dates_date">
		which are <input type="text" name="" value="" class="input datepicker"> and  <input type="text" name="" value="" class="input datepicker">
	</div>

	<div id="tmpl_between_dates_datetime">
		which are <input type="text" name="" value="" class="input datepicker"> and  <input type="text" name="" value="" class="input datepicker">
	</div>

	<div id="tmpl_between_dates_mktime">
		which are <input type="text" name="" value="" class="input datepicker"> and  <input type="text" name="" value="" class="input datepicker">
	</div>


</div>
<?php
$CI->load->view('footer',array(
  'scripts'=>array(
		base_url('assets/js/view_table.js')
	)
));