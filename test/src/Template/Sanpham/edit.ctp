<style type="text/css">
    label{
        display: block;
    }
</style>
<?php
    $hinhsp = $sanpham->hinh_sp;
    $han_sd = $sanpham->han_sd->format('Y-m-d');

?>

<main class="container">
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create($sanpham,['type' => 'file']) ?>
            <fieldset>
                <?php
                echo $this->Form->control('ten_thuoc',['class'=>'form-control']);
                
                ?>
                
               <label>Chọn loài ví dụ: Heo</label><br>
                    <select class="form-control" name="ma_loai">
                    <?php foreach ($loai as $loai): ?>
                        <?php
                            if($sanpham->ma_loai == $loai->ma_loai){
                                echo "<option value='$loai->ma_loai' selected>".$loai->ten_loai."</option>";
                            }else{
                                echo "<option value='$loai->ma_loai' >".$loai->ten_loai."</option>";
                            }
                        ?>
                    <?php endforeach; ?>                        
                    </select> 
                
                <?php
               // echo $this->Form->control('ma_nhom_loai_san_pham',['class'=>'form-control']);
                ?>
                   <label>Chọn nhóm loại sản phẩm ví dụ: Kháng sinh</label><br>
                   
                    <select class="form-control" name="ma_nhom_loai_san_pham">
                           <?php foreach ($nhomloaisanpham as $nhomloaisanpham): ?>
                        <?php
                            if($sanpham->ma_nhom_loai_san_pham == $nhomloaisanpham->ma_nhom_loai_san_pham){
                                echo "<option value='$nhomloaisanpham->ma_nhom_loai_san_pham' selected>".$nhomloaisanpham->ten_nhom_loai_san_pham."</option>";
                            }else{
                                echo "<option value='$nhomloaisanpham->ma_nhom_loai_san_pham' >".$nhomloaisanpham->ten_nhom_loai_san_pham."</option>";
                            }
                        ?>
                    <?php endforeach; ?>  
                    </select>
                <?php 
              //  echo $this->Form->control('ma_dang_thuoc',['class'=>'form-control']);
                ?>
                  <label>Chọn dạng thuốc/ cách sử dụng ví dụ: Dung dịch tiêm</label><br>
                  
                        <select class="form-control" name="ma_dang_thuoc">
                            <?php foreach ($dangthuoc as $dangthuoc): ?>
                        <?php
                            if($sanpham->ma_dang_thuoc == $dangthuoc->ma_dang_thuoc){
                                echo "<option value='$dangthuoc->ma_dang_thuoc' selected>".$dangthuoc->ten_dang_thuoc."</option>";
                            }else{
                                echo "<option value='$dangthuoc->ma_dang_thuoc' >".$dangthuoc->ten_dang_thuoc."</option>";
                            }
                        ?>
                    <?php endforeach; ?>   
                        </select>
                <?php
              //  echo $this->Form->control('ma_loai_benh',['class'=>'form-control']);
                ?>
                  <label>Chọn loại bệnh ví dụ: Hô hấp</label><br>
                        <select class="form-control" name="ma_loai_benh">
                            <?php foreach ($loaibenh as $loaibenh): ?>
                        <?php
                            if($sanpham->ma_loai_benh == $loaibenh->ma_loai_benh){
                                echo "<option value='$loaibenh->ma_loai_benh' selected>".$loaibenh->ten_loai_benh."</option>";
                            }else{
                                echo "<option value='$loaibenh->ma_loai_benh' >".$loaibenh->ten_loai_benh."</option>";
                            }
                        ?>
                    <?php endforeach; ?>  
                        </select> 
                <?php 
                echo $this->Form->file('hinh_sp',['id'=>'hinh_sp','class'=>'form-control','accept'=>'image/*']);
                echo $this->Form->hidden('img_thuoc',['value'=>$hinhsp]);
                echo "<img src='/exduocthuy/img/$hinhsp' id='output1' width='300px' name='img_thuoc' height='300px' alt='hình sản phẩm'>";
                echo $this->Form->control('gia_sp',['class'=>'form-control']);
                //echo $this->Form->control('han_sd', ['empty' => true]);
                echo "<input type='date' class='form-control' name ='han_sd' id='han_sd' placeholder='Nhập tên thuốc...' value='$han_sd'>";
                echo "<label for='cong_dung'>Công dụng:</label>";
                echo $this->Form->textarea('cong_dung',['id'=>'cong_dung']);
                echo "<label for='cong_dung'>Thành phần:</label>";
                echo $this->Form->textarea('thanh_phan',['id'=>'thanh_phan']);
                echo "<label for='cong_dung'>Cách dùng:</label>";
                echo $this->Form->textarea('cach_dung',['id'=>'cach_dung']);
                echo "<label for='cong_dung'>Liều lượng</label>";
                echo $this->Form->textarea('lieu_luong',['id'=>'lieu_luong']);
                echo "<label for='cong_dung'>Bảo quản</label>";
                echo $this->Form->textarea('bao_quan',['id'=>'bao_quan']);
                
                ?>
            </fieldset>
            <?= $this->Form->button(__('SỬA SẢN PHẨM'),['class'=>'btn btn-primary']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</main><!-- *******END Main **** -->
<script type="text/javascript">
    var openFile = function(event,name) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById(name);
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    };
    $("#hinh_sp").change(function(e){
        openFile(event,'output1');
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace( 'cong_dung' );
</script>
<script type="text/javascript">
    CKEDITOR.replace( 'thanh_phan' );
</script>
<script type="text/javascript">
    CKEDITOR.replace( 'cach_dung' );
</script>
<script type="text/javascript">
    CKEDITOR.replace( 'lieu_luong' );
</script>
<script type="text/javascript">
    CKEDITOR.replace( 'bao_quan' );
</script>
