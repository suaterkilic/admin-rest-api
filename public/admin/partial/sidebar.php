<?php 
	$reqList = QB::table('AppointmentRequest')->where('artist_id', $_SESSION['artist_id'])->get();
	$count = count($reqList);
?>
<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<?php 
								$userList = DB::getProfilePicture();
							?>
							<img style="object-fit:fill" src="<?php url('storage/uploads/'); echo $userList['img']; ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $userList['name'] . ' ' .$userList['surname']; ?>
									<span class="user-level"><?php echo $userList['statu']; ?></span>
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#analys" class="collapsed" aria-expanded="false">
								<i class="far fa-chart-bar"></i>
								<p style="margin-left:10px">Randevu Yönetimi</p>
								<span style="color:#fff !important; background:#31ce36 !important; width:19px; text-align:center; border-radius:14px;" class=""><?php echo $count; ?></span>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="analys">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/appointment/request'); ?>">
											<span class="sub-item">Randevu Talepleri</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/appointment/confirm'); ?>">
											<span class="sub-item">Onaylanan Randevular</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/appointment/cancel/all'); ?>">
											<span class="sub-item">İptal Edilen Randevular</span>
										</a>
									</li>
									<?php if(@$_SESSION['rank'] == 1): ?>
									<li>
										<a href="<?php url('admin/appointment/view/artist'); ?>">
											<span class="sub-item">Sanatçıların Randevuları</span>
										</a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
						</li>

						<!-- Private List -->
						<?php if(@$_SESSION['rank'] == 1): ?>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Site Yönetim</h4>
						</li>
						<!--
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-align-left"></i>
								<p style="margin-left:10px">Analiz</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin'); ?>">
											<span class="sub-item">Görüntüle</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						-->
						<li class="nav-item">
							<a data-toggle="collapse" href="#settings">
								<i class="fas fa-cogs"></i>
								<p style="margin-left:10px">Site Ayarları</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="settings">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/site-settings'); ?>">
											<span class="sub-item">Genel Ayarlar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						

						<li class="nav-item">
							<a data-toggle="collapse" href="#about">
								<i class="fas fa-cube"></i>
								<p style="margin-left:10px">Kurumsal Yönetim</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="about">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/about'); ?>">
											<span class="sub-item">Hakkımızda</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
							
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-image"></i>
								<p style="margin-left:10px">Slider Yönetimi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/slider-add'); ?>">
											<span class="sub-item">Slider Ekle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/slider-list'); ?>">
											<span class="sub-item">Slider Düzenle</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-paint-brush"></i>
								<p style="margin-left:10px">Tatto Sayfası</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
								<!--
									<li>
										<a href="<?php url('admin/tattoo-edit'); ?>">
											<span class="sub-item">Güncelle</span>
										</a>
									</li> -->
									<li>
										<a href="<?php url('admin/tattoo/insert'); ?>">
											<span class="sub-item">Tattoo Ekle (Public)</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/tattoo/general/list'); ?>">
											<span class="sub-item">Tattoo Düzenle (Public)</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!--
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p style="margin-left:10px">Sanatçı Yönetimi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/artist-add'); ?>">
											<span class="sub-item">Sanatçı Ekle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/artist-list'); ?>">
											<span class="sub-item">Sanatçı Listele</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/profile-gallery-list'); ?>">
											<span class="sub-item">Sanatçı Galerisi Düzenle</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<!--
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-user-friends"></i>
								<p style="margin-left:10px">Partner Yönetimi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/partner-add'); ?>">
											<span class="sub-item">Partner Ekle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/partner-list'); ?>">
											<span class="sub-item">Partner Listele</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<!-- 
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="fas fa-users"></i>
								<p style="margin-left:10px">Referans Yönetimi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/reference-add'); ?>">
											<span class="sub-item">Referans Ekle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/reference-list'); ?>">
											<span class="sub-item">Referans Listele</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<!--
						<li class="nav-item">
							<a data-toggle="collapse" href="#shop">
								<i class="fas fa-store"></i>
								<p style="margin-left:10px">Shop Yönetimi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="shop">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/shop-page-edit'); ?>">
											<span class="sub-item">Shop Sayfası Düzenle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/product-add'); ?>">
											<span class="sub-item">Ürün Ekle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/product-list'); ?>">
											<span class="sub-item">Ürün Listele</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#blog">
								<i class="fas fa-edit"></i>
								<p style="margin-left:10px">Blog</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="blog">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/blog/article/add'); ?>">
											<span class="sub-item">Makale Ekle</span>
										</a>
									</li>
									<li>
										<a href="<?php url('admin/blog/article/list'); ?>">
											<span class="sub-item">Makale Düzenle</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#video">
								<i class="fas fa-video"></i>
								<p style="margin-left:10px">Video</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="video">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php url('admin/video/edit'); ?>">
											<span class="sub-item">Video Düzenle</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a  href="<?php url('admin/logout'); ?>">
								<i class="fas fa-logout"></i>
								<p style="margin-left:10px">Çıkış Yap</p>
							</a>
						</li>
						<?php endif; ?>
						<!-- Private List Bitiş -->

					</ul>
				</div>
			</div>
		</div>