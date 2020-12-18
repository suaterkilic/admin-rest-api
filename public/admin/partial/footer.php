<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.codlart.com">
									Codlart
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2020, made with by <a href="https://www.codlart.com">Codlart</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="selected changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="selected changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="selected changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
			<i class="fas fa-cog"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php admin_import('js/core/jquery.3.2.1.min.js'); ?>"></script>
	<script src="<?php admin_import('js/core/popper.min.js'); ?>"></script>
	<script src="<?php admin_import('js/core/bootstrap.min.js'); ?>"></script>

	<!-- jQuery UI -->
	<script src="<?php admin_import('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>"></script>
	<script src="<?php admin_import('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js'); ?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php admin_import('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>


	<!-- Chart JS -->
	<script src="<?php admin_import('js/plugin/chart.js/chart.min.js'); ?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php admin_import('js/plugin/jquery.sparkline/jquery.sparkline.min.js'); ?>"></script>

	<!-- Chart Circle -->
	<script src="<?php admin_import('js/plugin/chart-circle/circles.min.js'); ?>"></script>

	<!-- Datatables -->
	<script src="<?php admin_import('/js/plugin/datatables/datatables.min.js'); ?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php admin_import('/js/plugin/bootstrap-notify/bootstrap-notify.min.js'); ?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php admin_import('/js/plugin/jqvmap/jquery.vmap.min.js'); ?>"></script>
	<script src="<?php admin_import('/js/plugin/jqvmap/maps/jquery.vmap.world.js'); ?>"></script>

	<!-- Sweet Alert -->
	<script src="<?php admin_import('/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>

	<!-- Atlantis JS -->
	<script src="<?php admin_import('js/atlantis.min.js'); ?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php admin_import('js/setting-demo.js'); ?>"></script>
	<script src="<?php admin_import('js/demo.js'); ?>"></script>
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>
</body>
</html>

<script>
	$(document).ready(function(){
		$('#confirm_statu').click(function(){
			var appointmentId = $(this).attr('appointment-id');
			$.ajax({
				type: 'POST',
				url: 'appointment-confirm',
				data: {'appointmentId': appointmentId},
				success:function(res){
					$('#ajaxAlert').html(res);
				}
			});
		});

		$('#cancel_statu').click(function(){
			var appointmentId = $(this).attr('appointment-id');

			$('#addRowButton').click(function(){
				var commentVal = $('#comment').val();

				$.ajax({
					type: 'POST',
					url: 'appointment-cancel',
					data: {'appointmentId': appointmentId, 'commentVal': commentVal},
					success: function(res){
						$('#addRowModal').hide();
						$('#ajaxAlert').html(res);
						window.location.reload();
					}
				});
				 
			});
		});
	});
</script>
<script type="text/javascript">

			function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("exampleFormControlFile1").files[0]);
				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview").src = oFREvent.target.result;
				};       
			}

			function PreviewImage1() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("mFile1").files[0]);
				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview1").src = oFREvent.target.result;
				};       
			}

			function PreviewImage2() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("mFile2").files[0]);
				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview2").src = oFREvent.target.result;
				};       
			}

			function PreviewImage3() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("mFile3").files[0]);
				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview3").src = oFREvent.target.result;
				};       
			}

			function PreviewImage4() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("mFile4").files[0]);
				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview4").src = oFREvent.target.result;
				};       
			}

			$(document).ready(function(){
				$('.alert-info').remove();

				$('.view-app-modal').click(function(){
					var app_req_id = $(this).attr('app-id');
					$.ajax({
						type: 'POST',
						url: 'appointment-tattoo-view',
						data: {'app_req_id': app_req_id},
						dataType: 'json',
						success: function(res){
							$('.view-img').attr('src','../storage/uploads/'+res.img);
							console.log(res.img);
						}
					});
				});

				var app_id;
				var artist_id;

				$('.okay').click(function(){
					app_id = $(this).attr('data-app-id');
					
					$('#app-end-confirm').click(function(){
						artist_id = $(this).attr('artist-id');
						var amount = $('.amount').val();

						$.ajax({
							'type': 'POST',
							'url': 'app-okay-amount',
							'data': {
								'app_id': app_id, 
								'artist_id': artist_id, 
								'amount': amount
								},
							success: function(res){
								window.location = "<?php url('admin/appointment_confirmed'); ?>"
							}
						});

					});
				});

				$('.choose-artist').on('change', function(){
					var artistId = $(this).val();

					$.ajax({
						type: 'POST',
						url: 'appstatu-of-artist',
						data: {'artistId': artistId},
						success: function(res){
							$('.app-statu').html(res);
						}
					});
				});

				$('.app-statu').on('change', function(){
					var artistId = $(this).val();
					var option = $('option:selected', this).attr('statu');
					
					$.ajax({
						type: 'POST',
						url: 'applist-of-artist',
						data: {
							'artistId': artistId,
							'option': option
						},

						success: function(res){
							$('.selectAppListOfArtist').html(res);
						}
					});
					
				});

				$('.choose-artist-gallery').on('change', function(){

					var artistId = $(this).val();

					$.ajax({
						type: 'POST',
						url: 'get-all-gallery',
						data: {'artistId': artistId},
						success: function(res){
							$('#all-gallery').html(res);
						}
					});

				});
				
			});
		var iFileSize = 0;
		function readURL(fileInput){
		     var files = fileInput.files;
		     for (var i = 0; i < files.length; i++) {
		         var file = files[i];
		         iFileSize = file.size;
		         var imageType = /image.*/;
		         if (!file.type.match(imageType)) {
		             continue;
		         }
		     }
		}
		function bytesToSize(bytes) {
		   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		   if (bytes == 0) return '0 Byte';
		   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
		};
		function updIndvDocs(){
		  $(".upload-img").change(function(e){
		    readURL(this);
		    var $this = $(this);
		    var file = $this[0].files[0];
		    var fileName = e.target.files[0].name;
		    var ext = $this.val().split('.').pop().toLowerCase();
		    var $par = $(this).parents('li');
		    var $msg = $par.find('.msg');
		    var $fn = $par.find('.fileName');
		    var $dt = $par.find('.docType');
		    var $ds = $par.find('.fileSize');
		    $msg.hide();
		    $dt.hide();
		    $par.removeClass('uploaded');
		    $(this).parents('.user-files').find('.error').hide();
		    if(iFileSize >= 10485760) { // 10 mb
		      $msg.show().text('File is too large. Max 10 MB');
		      $this.val('');
		    }else if($.inArray(ext, ['png', 'jpg', 'gif', 'pdf','jpeg']) == -1 && ext != ''){
		      $msg.show().text('Invalid file format.');
		      $this.val('');
		    }else{
		      $par.addClass('uploaded');
		      $dt.show();
		      $ds.text(bytesToSize(iFileSize));
		      if(fileName.length > 18){
		        $fn.html(fileName.substr(0, 9)+'...'+fileName.substr(fileName.length-6, fileName.length));
		      }else{
		        $fn.html(fileName);
		      }
		    }
		  });
		    
		 $(document).on('click', '.removeFile1', function(){
		    var $par = $(this).parents('li');
		    $par.find('.msg, .docType').hide();
		    $par.find('input').val('');
		    $par.removeClass('uploaded');
		    $('#uploadPreview1').attr("src","<?php admin_import('img/examples/product3.jpg'); ?>");
		  });

		 $(document).on('click', '.removeFile2', function(){
		    var $par = $(this).parents('li');
		    $par.find('.msg, .docType').hide();
		    $par.find('input').val('');
		    $par.removeClass('uploaded');
		    $('#uploadPreview2').attr("src","<?php admin_import('img/examples/product3.jpg'); ?>");
		  });
		  $(document).on('click', '.removeFile3', function(){
		    var $par = $(this).parents('li');
		    $par.find('.msg, .docType').hide();
		    $par.find('input').val('');
		    $par.removeClass('uploaded');
		    $('#uploadPreview3').attr("src","<?php admin_import('img/examples/product3.jpg'); ?>");
		  });
		  $(document).on('click', '.removeFile4', function(){
		    var $par = $(this).parents('li');
		    $par.find('.msg, .docType').hide();
		    $par.find('input').val('');
		    $par.removeClass('uploaded');
		    $('#uploadPreview4').attr("src","<?php admin_import('img/examples/product3.jpg'); ?>");
		  });
		}

		//val
		function sideForm5(){
		    var valid = true,
		        indvUploads = [],
		        allCheck1;
		        $('.user-files1 input').each(function(){
		            indvUploads.push($(this).val());
		        });
		        allCheck1 = $.inArray('', indvUploads);
		        if(allCheck1 != -1){
		            $('.user-files1 .error').show();
		            valid = false;
		        }
		    return valid;
		}


		$(document).ready(function(){
		  updIndvDocs();
		  
		  $('.js-submit').click(function(){
		    if(sideForm5()){
		      consol.log('Done')
		    }
		  });
		  
		  var countApp = $('.notification').text();
		  $('.badge-success').text(countApp);

		}); 


		
	

</script>
