<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?= base_url('images/users/'.$user->user_img)?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $user->username ?></span>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?php echo base_url('dashboard.html') ?>"><i class="icon-home4"></i> <span>Home</span></a></li>
								<li><a href="<?php echo base_url('diagnosa.html') ?>"><i class="fa fa-cogs"></i> <span>Diagnosa</span></a></li>
<?php if ($this->ion_auth->is_admin()): ?><li>
									<a href="<?php echo base_url('solusi.html') ?>"><i class="fa fa-code-fork"></i> <span>Solusi</span></a>
								</li>

								<li>
									<a href="<?php echo base_url('jenis_kerusakan.html') ?>"><i class="fa fa-sitemap"></i> <span>Jenis Kerusakan</span></a>
								</li>
								<li>
									<a href="<?php echo base_url('users.html') ?>"><i class="icon-users"></i> <span>Pengelolaan User</span></a>
								</li>
<?php else: ?>

<?php endif ?>
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