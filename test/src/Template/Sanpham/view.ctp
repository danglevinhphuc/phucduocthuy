
<main class="container">
    <section class="row">
    <div class="col-md-4">
        <table class="table">
            <tr>
                <th scope="row"><?= __('Tên thuốc') ?></th>
                <td><?= h($sanpham->ten_thuoc) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Loài') ?></th>
                <td><?= h($sanpham->loai['ten_loai']) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nhóm sản phẩm') ?></th>
                <td><?= h($sanpham->nhomloaisanpham['ten_nhom_loai_san_pham']) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dạng thuốc') ?></th>
                <td><?= h($sanpham->dangthuoc['ten_dang_thuoc']) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Loại bệnh') ?></th>
                <td><?= h($sanpham->loaibenh['ten_loai_benh']) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Hình thuốc') ?></th>
                <td>
                <?php if(h($sanpham->hinh_sp)){ ?>
                   <?= 
                        $this->Html->image(h($sanpham->hinh_sp),['class'=>'img-responsive','width'=>'100px','height'=>'100px'])
                     ?>
                     <?php
                        }else{
                            echo "Không có hình thuốc";
                        }
                     ?>
                    </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Giá thuốc') ?></th>
                <td><?= $this->Number->format($sanpham->gia_sp) ?> VNĐ</td>
            </tr>
            <tr>
                <th scope="row"><?= __('Hạn sử dụng') ?></th>
                <td><?= h($sanpham->han_sd) ?></td>
            </tr>
            <tr>
            	<th></th>
            	<td><a href="/cake/test/sanpham" class="btn btn-danger">QUAY VỀ</a></td>
            </tr>
        </table>
    </div>
        
        <div class="col-md-8" >
            <div >
                <h4><?= __('Công Dụng') ?></h4>
                <?= $sanpham->cong_dung ?>
            </div>
            <div >
                <h4><?= __('Thành Phần') ?></h4>
                <?= $sanpham->thanh_phan ?>
            </div>
            <div >
                <h4><?= __('Cách Dùng') ?></h4>
                <?= $sanpham->cach_dung ?>
            </div>
            <div >
                <h4><?= __('Liều Lượng') ?></h4>
                <?= $sanpham->lieu_luong ?>
            </div>
            <div >
                <h4><?= __('Bảo Quản') ?></h4>
                <?= $sanpham->bao_quan ?>
            </div>    
        </div>

    </section>
</main>
