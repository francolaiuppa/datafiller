var table = {};

table.clear_dynamic = function(that) {
	that.parent().next('.dynamic').html('');
}

table.set_dynamic = function(that,data) {
	table.clear_dynamic(that);
	that.parent().next('.dynamic').html(data);
}

table.random_data_item_select_change_handler = function(e){
	var that = $(this);
	var selected_option = that.children('option:selected');
	var selected_option_val = selected_option.val();
	var field_name = that.data('field_name');

	switch (selected_option_val) {
		case 'other_table_key':
			var dynamic = $('#tmpl_other_table_key').clone();
			dynamic.children('select').attr('name','other_table_for_field['+field_name+']');
			dynamic.children('input').attr('name','other_table_for_field_id['+field_name+']');
			table.set_dynamic(that,dynamic.html());
		break;

		case 'integer':
			var dynamic = $('#tmpl_integer').clone();
			dynamic.children('input').first().attr('name','integer_min['+field_name+']');
			dynamic.children('input').last().attr('name','integer_max['+field_name+']');
			table.set_dynamic(that,dynamic.html());
		break;

		case 'float':
			var dynamic = $('#tmpl_integer').clone();
			dynamic.children('input').first().attr('name','float_min['+field_name+']');
			dynamic.children('input').last().attr('name','float_max['+field_name+']');
			table.set_dynamic(that,dynamic.html());
		break;

		case 'fixed_value':
			var dynamic = $('#tmpl_fixed_value').clone();
			dynamic.children('input').first().attr('name','fixed_value['+field_name+']');
			table.set_dynamic(that,dynamic.html());
		break;		

		case 'fixed_value_multiple':
			var dynamic = $('#tmpl_fixed_value_multiple').clone();
			dynamic.children('input').first().attr('name','fixed_value_multiple['+field_name+']');
			table.set_dynamic(that,dynamic.html());
		break;

		case 'md5':
			var dynamic = $('#tmpl_md5').clone();
			dynamic.children('input').first().attr('name','md5['+field_name+']');
			table.set_dynamic(that,dynamic.html());
		break;	

		case 'between_dates_date':
			var dynamic = $('#tmpl_between_dates_date').clone();
			dynamic.children('input').first().attr('name','between_dates_date_start['+field_name+']');
			dynamic.children('input').last().attr('name','between_dates_date_end['+field_name+']');
			table.set_dynamic(that,dynamic.html());
			$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
		break;	

		case 'between_dates_datetime':
			var dynamic = $('#tmpl_between_dates_datetime').clone();
			dynamic.children('input').first().attr('name','between_dates_datetime_start['+field_name+']');
			dynamic.children('input').last().attr('name','between_dates_datetime_end['+field_name+']');
			table.set_dynamic(that,dynamic.html());
			$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
		break;	

		case 'between_dates_mktime':
			var dynamic = $('#tmpl_between_dates_mktime').clone();
			dynamic.children('input').first().attr('name','between_dates_mktime_start['+field_name+']');
			dynamic.children('input').last().attr('name','between_dates_mktime_end['+field_name+']');
			table.set_dynamic(that,dynamic.html());
			$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
		break;		

		default:
			table.clear_dynamic(that);
			return true;
	}
}

table.startup = function(){
	$('#random_data > div.random_data_item > select').change(table.random_data_item_select_change_handler);
};

$(document).ready(table.startup);