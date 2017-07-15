<?php

	
?>
<main class="container">
	<section id="thanh_dieu_huong">
		<h2><a href="#" class="mac_dinh">Trang chủ</a><span>>></span><a href="#" class="mac_dinh">Sản phẩm</a><span>>></span><a href="#" class="xac_dinh">Chi tiết sản phẩm</a></h2>
	</section>
	<!-- ***** MENU TUY CHON CAC SP ***** -->
	<section id="chi_tiet_sp">
		<div class="row">
			<div class="col-md-4">
				<!-- ****** CONTENT LOAI ****** -->
				<div class="loai">
					<h3><i class="fa fa-list" aria-hidden="true"></i> Loài</h3>
					<?php foreach ($query_loai as $loai) : ?>
					<?php if($loai->loai['ma_loai'] != null && $loai->loai['ma_loai'] != '0') :  ?>
					<input type="checkbox" name="" value="<?= h($loai->loai['ma_loai']) ?>" id="<?= h($loai->loai['ma_loai']) ?>" onclick="chon_list('<?= h($loai->loai['ma_loai']) ?>')" />
					<label><?= h($loai->loai['ten_loai']) ?></label> <span class="badge"><?php  echo $loai->tong_tung_loai ?></span><br>

					<?php endif; endforeach; ?>
				</div><!-- ******END CONTENT LOAI ****** -->

				<!-- ****** CONTEN NHOM LOAI -->
				<div class="nhom_loai">
					<h3><i class="fa fa-list" aria-hidden="true"></i> Nhóm loại sản phẩm</h3>
					<?php $i = 0; foreach ($query_nhomloaisanpham as $nhomloaisanpham) : $i++; ?>
						
					<?php if($nhomloaisanpham->nhomloaisanpham['ma_nhom_loai_san_pham'] != null && $nhomloaisanpham->nhomloaisanpham['ma_nhom_loai_san_pham'] != '0') :  ?>
					
					<input type="checkbox" name="" value="<?= h($nhomloaisanpham->nhomloaisanpham['ma_nhom_loai_san_pham']) ?>" id="<?= h($nhomloaisanpham->nhomloaisanpham['ma_nhom_loai_san_pham']) ?>" onclick="chon_list('<?= h($nhomloaisanpham->nhomloaisanpham['ma_nhom_loai_san_pham']) ?>')" />
					<label><?= h($nhomloaisanpham->nhomloaisanpham['ten_nhom_loai_san_pham']) ?></label> <span class="badge"><?php  echo $nhomloaisanpham->tong_tung_nhomloaisanpham ?></span><br>

					<?php endif; endforeach; ?>
				</div><!-- ******END CONTEN NHOM LOAI -->

				<!-- ****** CONTENT NHOM LOAI ****** -->
				<div class="cach_su_dung">
					<h3><i class="fa fa-list" aria-hidden="true"></i> Dạng thuốc / Cách sử dụng</h3>
					<?php foreach ($query_dangthuoc as $dangthuoc) : ?>
					<?php if($dangthuoc->dangthuoc['ma_dang_thuoc'] != null && $dangthuoc->dangthuoc['ma_dang_thuoc'] != '0') :  ?>
					<input type="checkbox" name="" value="<?= h($dangthuoc->dangthuoc['ma_dang_thuoc']) ?>" id="<?= h($dangthuoc->dangthuoc['ma_dang_thuoc']) ?>" onclick="chon_list('<?= h($dangthuoc->dangthuoc['ma_dang_thuoc']) ?>')" />
					<label><?= h($dangthuoc->dangthuoc['ten_dang_thuoc']) ?></label> <span class="badge"><?php  echo $dangthuoc->tong_tung_dangthuoc ?></span><br>

					<?php endif; endforeach; ?>
				</div><!-- ******END CONTENT NHOM LOAI ****** -->

				<!-- ****** CONTENT LOAIBENH ****** -->
				<div class="loai_benh">
					<h3><i class="fa fa-list" aria-hidden="true"></i> Loại bệnh</h3>
					<?php foreach ($query_loaibenh as $loaibenh) : ?>
					<?php if($loaibenh->loaibenh['ma_loai_benh'] != null && $loaibenh->loaibenh['ma_loai_benh'] != '0') :  ?>
					<input type="checkbox" name="" value="<?= h($loaibenh->loaibenh['ma_loai_benh']) ?>" id="<?= h($loaibenh->loaibenh['ma_loai_benh']) ?>" onclick="chon_list('<?= h($loaibenh->loaibenh['ma_loai_benh']) ?>')" />
					<label><?= h($loaibenh->loaibenh['ten_loai_benh']) ?></label> <span class="badge"><?php  echo $loaibenh->tong_tung_loaibenh ?></span><br>

					<?php endif; endforeach; ?>
				</div><!-- ******END CONTENT LOAIBENH ****** -->
			</div>
			<!-- **** CAC SAN PHAM LIEN QUAN KHI DUOC GOI DEN TREN URL**** -->
			<?php if(isset($query)) : ?>
			<div class="col-md-8" id="thong_tin_chi_tiet">
				<div class="row">
					<div class="col-md-12 ">
						<div id="thay_doi_xem">
							<i class="fa fa-th-list" aria-hidden="true"></i> <i class="fa fa-table" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				
				<div class="row">
					<?php foreach ($query as $query ) :?>
					<div class="tuy_chon_xem col-md-6 col-xs-6">
						<a href="/cake/test/sanpham/xemchitiet/<?= __($query->id_sp) ?>"><div class="thumbnail">
							<?= $this->Html->image($query->hinh_sp)?>
							<div class="caption text-center">
								<p><?= __($query->ten_thuoc)?></p>
							</div>
						</div></a>
					</div>
					<?php endforeach; ?>
				
				</div>
				
			
			</div><!-- ****END CAC SAN PHAM LIEN QUAN KHI DUOC GOI DEN TREN URL**** -->
			<?php endif; ?>
		</div>
	</section>
			
</main><!-- *******END Main **** -->
		<?=  $this->Html->script("list_menu.js") ?>