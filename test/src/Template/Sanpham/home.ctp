
<main class="container">
			<!--******TOP PRODUCT NOI BAT**** -->
			<section id="san_pham_noi_bat">
				<div class="row">
					<div class="col-md-6  img_left img_left_sp">
						<div class="khung-img">
								<a href="/cake/test/sanpham/xemchitiet/<?= $sanpham_motloai->id_sp ?>">
							
								<!--<img src="img/Clomectin.png" alt="" title=""  width="100%" height="462px"> -->
								<?= $this->Html->image($sanpham_motloai->hinh_sp,['width'=>'100%','height'=>'480px'])  ?>
								</a>
						
						</div>
						<div class="chu-img">
							<div class="content-chu-img">
								<h2><?= h($sanpham_motloai->ten_thuoc) ?></h2>
								<p>-Hạn sử dụng: <?= h($sanpham_motloai->han_sd) ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 scoll_x" >
						<div class="row" >

						<?php foreach ($xuatsanpham_baloai as $xuatsanpham_baloai): ?>
							<div class="col-md-6 img_right img_left_sp" >
								<div class="khung-img">
									<a href="/cake/test/sanpham/xemchitiet/<?= $xuatsanpham_baloai->id_sp ?>">
										<?= $this->Html->image($xuatsanpham_baloai->hinh_sp,['width'=>'100%','height'=>'240px']) ?>
									</a>
								</div>
								<div class="chu-img">
									<div class="content-chu-img response_text">
										<h3><?= h($xuatsanpham_baloai->ten_thuoc) ?></h3>
										<p>-Hạn sử dụng: <?= h($xuatsanpham_baloai->han_sd) ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section><!--***** END TOP PRODUCT NOI BAT **** -->
			<section id="san_pham_moi">
				<p class="name_title_sp_moi"><i class="fa fa-eercast" aria-hidden="true"></i> Thuốc mới nhập</p>
				<div class="row" id="border_new_pro">
					<?php foreach ($sanpham_random as $sanpham_random) :?>
					<div class="col-xs-4 col-md-2">
						<a href="/cake/test/sanpham/xemchitiet/<?= $sanpham_random->id_sp ?>"><div class="thumbnail">
							<?= $this->Html->image($sanpham_random->hinh_sp) ?>
							<div class="caption text-center">
								<p><?= h($sanpham_random->ten_thuoc) ?></p>
							</div>
						</div></a>
					</div>
					<?php endforeach; ?>
				</div>
			</section>
			<section id="trang_trai_tham_gia">
				<h4><i class="fa fa-eercast" aria-hidden="true"></i> Từng tham gia các trang trại lớn ở các khu vực khác nhau</h4>
				<div class="row border_left_trang_trai">
					<div class="col-md-6">
						<figure>
							<img src="img/trang_trai_1.jpg" alt="..." height="330px;">
							<figcaption>Trang Trại Đồng Tháp</figcaption>
						</figure>
					</div>
					<div class="col-md-6 slider_img ">
						<img class="mySlides w3-animate-fading" src="img/trang_trai_1.jpg" width="100%" height="290px;" alt="..." title="">
						<img class="mySlides w3-animate-fading" src="img/trang_trai_2.jpg" width="100%" height="290px;" alt="..." title="">
						<img class="mySlides w3-animate-fading" src="img/trang_trai_3.jpg" width="100%" height="290px;" alt="..." title="">
						<img class="mySlides w3-animate-fading" src="img/trang_trai_4.jpg" width="100%" height="290px;" alt="..." title="">
						<hr class="">
					</div>
				</div>
			</section>
		</main><!-- *******END Main **** -->
		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
					x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 8000);    
			}
		</script>