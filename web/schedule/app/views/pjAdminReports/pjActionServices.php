<?php
if (isset($tpl['status']))
{
	$status = __('status', true);
	switch ($tpl['status'])
	{
		case 2:
			pjUtil::printNotice(NULL, $status[2]);
			break;
	}
} else {
	$titles = __('error_titles', true);
	$bodies = __('error_bodies', true);
	if (isset($_GET['err']))
	{
		pjUtil::printNotice(@$titles[$_GET['err']], @$bodies[$_GET['err']]);
	}
	$week_start = isset($tpl['option_arr']['o_week_start']) && in_array((int) $tpl['option_arr']['o_week_start'], range(0,6)) ? (int) $tpl['option_arr']['o_week_start'] : 0;
	$jqDateFormat = pjUtil::jqDateFormat($tpl['option_arr']['o_date_format']);
	?>
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all b10">
		<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
			<li class="ui-state-default ui-corner-top"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=pjAdminReports&amp;action=pjActionEmployees"><?php __('report_menu_employees'); ?></a></li>
			<li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=pjAdminReports&amp;action=pjActionServices"><?php __('report_menu_services'); ?></a></li>
		</ul>
	</div>
	
	<?php pjUtil::printNotice(@$titles['AR02'], @$bodies['AR02']); ?>
	
	<fieldset class="fieldset white">
		<legend><?php __('report_menu_services'); ?></legend>
		<form action="" method="get" class="form pj-form frm-filter-advanced" data-view="services">
			<div class="overflow">
				<label class="float_left w170"><?php __('booking_employee'); ?></label>
				<label class="float_left w120"><?php __('booking_index'); ?></label>
				<label class="float_left w130"><?php __('booking_from'); ?></label>
				<label class="float_left w130"><?php __('booking_to'); ?></label>
				<br class="clear_left" />
			</div>
			<div class="overflow t5">
				<div class="float_left w170">
					<select name="employee_id" class="pj-form-field w150">
					<option value="">-- <?php __('lblChoose'); ?> --</option>
					<?php
					foreach ($tpl['employee_arr'] as $employee)
					{
						?><option value="<?php echo $employee['id']; ?>"<?php echo isset($_GET['employee_id']) && $_GET['employee_id'] == $employee['id'] ? ' selected="selected"' : NULL; ?>><?php echo pjSanitize::html($employee['name']); ?></option><?php
					}
					?>
					</select>
				</div>
				<div class="float_left w120">
					<select name="index" class="pj-form-field w100">
						<option value="cnt"><?php __('report_cnt'); ?></option>
						<option value="amount"><?php echo pjUtil::getCurrencySign($tpl['option_arr']['o_currency']);?> <?php __('report_amount'); ?></option>
					</select>
				</div>
				<div class="float_left w130">
					<span class="pj-form-field-custom pj-form-field-custom-after">
						<input type="text" name="date_from" class="pj-form-field w80 datepick pointer required" readonly="readonly" rel="<?php echo $week_start; ?>" rev="<?php echo $jqDateFormat; ?>" />
						<span class="pj-form-field-after"><abbr class="pj-form-field-icon-date"></abbr></span>
					</span>
				</div>
				<div class="float_left w130">
					<span class="pj-form-field-custom pj-form-field-custom-after">
						<input type="text" name="date_to" class="pj-form-field w80 datepick pointer required" readonly="readonly" rel="<?php echo $week_start; ?>" rev="<?php echo $jqDateFormat; ?>" />
						<span class="pj-form-field-after"><abbr class="pj-form-field-icon-date"></abbr></span>
					</span>
				</div>
				<div class="float_left">
					<input type="submit" value="<?php __('btnGenerate', false, true); ?>" class="pj-button" />
				</div>
				<br class="clear_left" />
			</div>
		</form>
	</fieldset>
	
    <div id="chart" style="height: 450px; display: none"></div>

	<div id="grid_services" class="t20"></div>
	<?php
	$day_names = __('day_names', true);
	$months = __('months', true);
	ksort($day_names);
	ksort($months);
	?>
	<script type="text/javascript">
	var pjGrid = pjGrid || {};
	var myLabel = myLabel || {};
	myLabel.name = "<?php __('service_name', false, true); ?>";
	myLabel.sign = "<?php echo html_entity_decode(pjUtil::getCurrencySign($tpl['option_arr']['o_currency'], false), ENT_QUOTES, 'utf-8'); ?>";

	myLabel.total_bookings = "<?php __('report_total_bookings', false, true); ?>";
	myLabel.confirmed_bookings = "<?php __('report_confirmed_bookings', false, true); ?>";
	myLabel.pending_bookings = "<?php __('report_pending_bookings', false, true); ?>";
	myLabel.cancelled_bookings = "<?php __('report_cancelled_bookings', false, true); ?>";

	myLabel.monthNames = ["<?php echo join('","', $months); ?>"];
	myLabel.dayNamesMin = ["<?php echo join('","', $day_names); ?>"];
	</script>
	<?php
}
?>