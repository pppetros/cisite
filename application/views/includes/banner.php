<!-- Banner Wrapper -->
<div id="banner-wrapper">
	<div class="5grid-layout">
		<div class="row">
			<div class="12u">
			
				<!-- Banner -->
					<div id="banner" class="box">
						<div class="5grid">
							<div class="row">
								<div class="12u">
									<?php 
										if (strlen($banner_head))
										{
											echo $this->load->view( $banner_head );	
										}
										if (strlen($banner_content))
										{
											echo $this->load->view( $banner_content ); 	
										}								
									?>
								</div>
							</div>
						</div>	
					</div>

			</div>
		</div>
	</div>
</div>
		