<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 ">
			<div class="panel panel-default pjAsContainer pjAsAside">
				<div class="panel-heading pjAsHead">
					<h2 class="pjAsHeadTitle">Wählen Sie die gewünschten Ankunftszeiten</h2><!-- /.pjAsHeadTitle -->
				</div><!-- /.panel-heading pjAsHead -->

				<div class="panel-body pjAsCalendarInline">
					<?php include PJ_VIEWS_PATH . 'pjFrontEnd/elements/calendar.php'; ?>
				</div><!-- /.panel-body pjAsCalendarInline -->

				<ul class="list-group pjAsAsideServices">
					<?php
					$cart = $controller->cart->getAll();
					$cart_arr = $tpl['cart_arr'];
					include PJ_VIEWS_PATH . 'pjFrontPublic/elements/cart_layout2.php';
					?>
				</ul><!-- /.list-group pjAsAsideServices -->
			</div><!-- /.panel panel-default pjAsContainer pjAsAside -->
		</div><!-- /.col-lg-4 col-md-4 col-sm-4 col-xs-12 -->

		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="panel panel-default pjAsContainer">
				<?php include PJ_VIEWS_PATH . 'pjFrontPublic/elements/header.php';?>
				
				<ul class="list-group pjAsListElements pjAsServices">
                    
					<?php
					if(!empty($tpl['service_arr']))
					{
						list($year, $month, $day) = explode("-", $_GET['date']);
						foreach($tpl['service_arr'] as $service)
						{
							if ((int) $tpl['option_arr']['o_seo_url'] === 1)
							{
								$slug = sprintf("%s/%s/%s/%s/%s-%u.html", 'Service', $year, $month, $day, pjAppController::friendlyURL($service['name']), $service['id']);
							} else {
								$slug = NULL;
							}
							
							?>
							<li class="list-group-item pjAsListElement pjAsService">
								<div class="row">
									
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

			

										<?php
										if(isset($tpl['service_id_arr'][$service['id']]) && !isset($tpl['unavailable']))
										{
											?><a href="#" class="btn btn-default pjAsBtn pjAsBtnPrimary pjAsServiceAppointment" data-iso="<?php echo $_GET['date']; ?>" data-id="<?php echo $service['id'];?>" data-slug="<?php echo $slug;?>">Uhrzeit wählen</a><?php
										} 
										?>
									</div><!-- /.col-lg-12 col-md-12 col-sm-12 col-xs-12 -->
								</div><!-- /.row -->
							</li><!-- /.list-group-item pjAsListElement pjAsService -->
							<?php
						}
					} else {
						?>
						<li class="list-group-item pjAsListElement pjAsService">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php __('front_no_services_found');?></div>
							</div>
						</li>
						<?php
					}
					?>
				</ul><!-- /.list-group pjAsListElements pjAsEmployees -->
						
			</div><!-- /.panel panel-default pjAsContainer -->
		</div><!-- /.col-lg-8 col-md-8 col-sm-8 col-xs-12 -->
	</div><!-- /.row -->
</div><!-- /.container-fluid -->