<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?php echo base_url('dashboard.html') ?>"><i class="icon-home4"></i> <span>Home</span></a></li>
								<li><a href="<?php echo base_url('diagnosa.html') ?>"><i class="fa fa-cogs"></i> <span>Diagnosa</span></a></li>
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<script type="text/javascript">
				var url = window.location;
				// Will only work if string in href matches with location
				$('ul.navigation a[href="'+ url +'"]').parent().addClass('active');

				// Will also work for relative and absolute hrefs
				$('ul.navigation a').filter(function() {
				    return this.href == url;
				}).parent().addClass('active');
			</script>