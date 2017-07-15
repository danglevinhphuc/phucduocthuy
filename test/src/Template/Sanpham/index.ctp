<script type="text/javascript">
// get cookie chấp nhận cho việc xoá
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
    $(document).ready(function(){

        $("#delete").click(function(){
            // hoi xac nhan truc khi xoa
            const xacnhan = confirm("Bạn chắc chắn muốn xoá không??");
            const xoa = [];
            $(':checkbox:checked').each(function(i){
                xoa[i] = $(this).val();
            });
            if(xacnhan){
            // kiem tra co ton tai hay k . 
            if(xoa.length > 0){
               $.ajax({
                    type:"POST",
                    data: {xoa:xoa},
                    url:"<?php echo $this->url->build(['controller'=>'Sanpham','action'=>'deleteajax']) ?>",
                // check tooken 
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', getCookie('csrfToken'));
                },
                success: function(data) {
                    alert("Xoá thành công");
                }
            });
             window.location.reload();
            }
        }
            /**/
        });
    });
</script>
<main class="container">
    <h3><?= __('Sản Phẩm Của Bạn') ?></h3>
    <span class="pull-right">
        <i class="fa fa-cart-plus" aria-hidden="true"></i> <?= $this->Html->link(__('Thêm thuốc'), ['action' => 'add']) ?>
    </span>
    <div style="width: 100% ; overflow-x: auto;">
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th><input type="button" name="delete" id="delete" value="DELETE" class="btn btn-danger" ></th>
                    <th scope="col"><?= $this->Paginator->sort('STT') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ten_thuoc') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ma_loai') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ma_nhom_loai_san_pham') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ma_dang_thuoc') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ma_loai_benh') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('hinh_sp') ?></th>

                    <th scope="col"><?= $this->Paginator->sort('gia_sp') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('han_sd') ?></th>
                    <th scope="col" class="actions"><?= __('Tác động') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i =0; foreach ($sanpham as $sanpham): $i++;?>
                <tr>
                    <td><input type="checkbox" name="select[]" id="delete_muiti" value="<?= $sanpham->id_sp ?>"></td>
                    <td><?= $this->Number->format($i) ?></td>
                    <?php 
                    if(h($sanpham->ten_thuoc)){


                        ?>
                        <td><?= h($sanpham->ten_thuoc) ?></td>
                        <?php
                    }else{
                        echo "<td><u><strong>Không có tên thuốc</strong></u></td>";
                    }
                    ?>
                    <td><?= h($sanpham->loai['ten_loai']) ?></td>
                    <td><?= h($sanpham->nhomloaisanpham['ten_nhom_loai_san_pham']) ?></td>
                    <td><?= h($sanpham->dangthuoc['ten_dang_thuoc']) ?></td>
                    <td><?= h($sanpham->loaibenh['ten_loai_benh']) ?></td>
                    <td>
                        <?php if(h($sanpham->hinh_sp)){ ?>
                        <?= 
                        $this->Html->image(h($sanpham->hinh_sp),['class'=>'img-responsive','width'=>'100px','height'=>'100px'])
                        ?>
                        <?php
                    }else{
                        echo "<u><strong>Không có hình thuốc</strong></u>";
                    }
                    ?>
                </td>

                <td><?= $this->Number->format($sanpham->gia_sp) ?> VNĐ</td>
                <?php
                if(h($sanpham->han_sd)){
                    ?>
                    <td><?= h($sanpham->han_sd) ?></td>
                    <?php
                }else{
                    echo "<td><u><strong>Không có hạn sử dụng thuốc</strong></u></td>";
                }
                ?>
                <td >
                    <?= $this->Html->link(__('Xem '), ['action' => 'view', $sanpham->id_sp]) ?>
                    <?= $this->Html->link(__('Sửa '), ['action' => 'edit', $sanpham->id_sp]) ?>
                    
                    <?= $this->Form->postLink(__('Xoá'), ['action' => 'delete', $sanpham->id_sp], ['confirm' => __('Are you sure you want to delete # {0}?', $sanpham->id_sp)]) ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>
</main>
