<main class="container">
<section id="chi_tiet_sp">
		<div class="row">
			<div class="col-md-12">
<div >
		<?php foreach ($query as $product): ?>
				<hr>
				<p class="ten_sp"> <?= $product->ten_thuoc ?> </p>
				<div class="row">
					<div class="col-md-6">
						<div class="khung-img">
							<a href="#">
								<?= $this->Html->image($product->hinh_sp,['width'=>'100%','height'=>'350px']) ?>
							</a>
						</div>
						<div class="chu-img">
							<div class="content-chu-img">
								<span></span>
								<p>Giá: <?= $this->Number->format($product->gia_sp) ?> VNĐ</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 "  >
						<div class="thanh_phan">
							<p class="boil">THÀNH PHẦN:</p>
							<span> <?= $product->thanh_phan ?></span>
							</div>
							<div class="cong_dung">
								<p class="boil">CÔNG DỤNG:</p>
								<span> <?= $product->cong_dung ?></span>
								</div>
							</div>
						</div>
						<div class="cach_dung">
							<p class="boil">CÁCH DÙNG:</p>
							<span>
								 <?= $product->cach_dung ?>
							</span>
						</div>
						<div class="lieu_luong">
							<p class="boil">LIỀU LƯỢNG:</p>
							<span> <?= $product->lieu_luong ?></span>
						</div>
						<div class="bao_quan">
							<p><span>BẢO QUẢN:</span> <?= $product->bao_quan ?></p>
						</div>
						
						<?php endforeach; ?>
	
					</div><!-- ******END THONG TIN SP DUOC CHON **** -->
				</div> 
</div>
</section>
</main>