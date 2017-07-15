<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
// chong clickjacking
header('X-Frame-Options: DENY');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        DUOC THU Y CHI NHANH DUOC UY TIN TAI VIET NAM
    </title>
    <meta name="description" content=""/>
    <meta name="keywords" content="" />
    <meta name="copyright" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="" />
    <meta name="geo.region" content="VN-CT" />
    <meta name="geo.placename" content="Cần Thơ" />
    <meta name="geo.position" content="10.028089;105.770886" />
    <meta name="ICBM" content="10.028089, 105.770886" />
    <meta name="dc.description" content="">
    <meta name="dc.keywords" content="">
    <meta name="dc.subject" content="">
    <meta name="dc.created" content="2016-11-01">
    <meta name="dc.publisher" content="">
    <meta name="dc.creator.name" content="">
    <meta name="dc.identifier" content="">
    <meta name="dc.rights.copyright" content="">
    <meta name="dc.language" content="vi-VN">
    <link rel="icon" href="./img/vemedim.icon">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <?= $this->Html->css('w3') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') ?>
  
     
      <?php
        $link = $_SERVER['REQUEST_URI'];
        $view = "xemchitiet";
        $xemnhieusanpham = "xemnhieusanpham";
        $tim = "tim?";
        if(strpos($link, $view) >0 || strpos($link, $xemnhieusanpham) >0 || strpos($link, $tim) >0){
            echo $this->Html->css('xemthongtin.css');
        }else{
            echo $this->Html->css('style.css');
        }
    ?>
     
     <?= $this->Html->script('ckeditor/ckeditor.js') ?>
    <script type="text/javascript">
    // get cookie chấp nhận cho việc xoá
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
        // ajax thông báo cho người dung tồn tại hoặc k 
        // xet theo keyup bang time

            $(document).ready(function(){
                var time = null;
                $("#search").keyup(function(){
                    clearTimeout(time);
                    timeout = setTimeout(function ()
                    {
            // Lấy nội dung search
            var data = {
                item : $('#search').val()
            };

            // Gửi ajax search
            $.ajax({
                type : 'post',
                dataType : 'text',
                data : data,
                url : '<?php echo $this->url->build(['controller'=>'Sanpham','action'=>'timajax']) ?>',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', getCookie('csrfToken'));
                },
                success : function (result){
                    $("#browsers").html(result);
                }
            });
            
        }, 1000);
                });
            });

    </script>
</head>
<body id="main">
<!-- *****HEADER ***** -->
        <header >
            <div class="container top_title" >
                <div class="row" >
                    <div class="col-md-8 " >
                        <!--<img src="img/vemedim.png" class="img-responsive"><h1>NHÀ THUỐC THÚ Y BS.VĨNH KHOA</h1> -->
                        <?= $this->Html->image('vemedim.png',['class'=>'img-responsive']) ?><h1>NHÀ THUỐC THÚ Y BS.VĨNH KHOA</h1>
                    </div>
                    <div class="col-md-4 ">
                        <!-- ***Search input-group*** -->
                        <form action="/cake/test/sanpham/tim" method="GET" >
                            <div class="input-group">
                                <input list="browsers" class="search" id="search" name="tim" placeholder="Nhập từ khoá cần tìm ..."  value="" >
                                    <datalist id="browsers">
                                    </datalist>

                            </div>
                        </form><!-- ***End Search  input-group*** -->
                    </div>
                </div>
            </div>
            
            
            <nav class="navbar navbar-inverse " >
                <div class="container-fluid container">
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="/cake/test/"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">HEO<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">CÁM</a></li>
                                    <li><a href="#">THUỐC</a></li>
                                </ul>
                            </li>
                            <li><a href="/cake/test/sanpham/xemnhieusanpham/gia-cam">GIA CẦM</a></li>
                            <li><a href="/cake/test/sanpham/xemnhieusanpham/thuy-san">THUỶ SẢN</a></li>
                            <li><a href="/cake/test/sanpham/xemnhieusanpham/gia-suc-nhai-lai">GIA SÚC NHAI LẠI</a></li>
                            <li><a href="/cake/test/sanpham/xemnhieusanpham/thu-cung">THÚ CƯNG</a></li>
                            <li><a href="/cake/test/sanpham/xemnhieusanpham/loai-khac">LOÀI KHÁC</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                           
                           <?php if($loggedIn) : ?>
                           

                                
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">SẢN PHẨM CỦA BẠN<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><?= $this->Html->link("XEM TẤT CẢ THUỐC",['controller'=>'Sanpham','action'=>'index']) ?></li>
                                    <li><?= $this->Html->link("XEM TẤT CẢ CÁM",['controller'=>'Sanpham','action'=>'index']) ?></li>
                                    
                                </ul>
                            </li>
                                <li><?= $this->Html->link("ĐĂNG XUẤT",['controller'=>'Users','action'=>'Logout']) ?></li>
                            <?php else:  ?>
                                <li><?= $this->Html->link("ĐĂNG NHẬP",['controller'=>'users','action'=>'Login']) ?></li>
                          <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header><!-- *****END HEADER ***** -->
        <div class="row flash">
            <div class="col-md-12 text-center ">
                
                <strong><?= $this->Flash->render() ?></strong>
            </div>
        </div>
        
         <?= $this->fetch('content') ?>
<footer ><!-- footer-->
            <div id="footer_1" class="container">
                <div class="container text-center page" id="huongdan" >
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 about">
                            <h4 class="footer_h4">
                                <?= $this->Html->image('vemedim.png',['class'=>'img-responsive']) ?>
                            </h4>
                            
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 about">
                            <h4 class="footer_h4">Thông tin nhà thuốt BS.VĨNH KHOA</h4>
                            <p>SĐT: 0902822XXXXX</p>
                            <p>Địa chỉ: Châu thành A Hậu Giang</p>

                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 contact">
                            <h4 class="footer_h4">Liên hệ với chúng tôi</h4>
                            <a href="#"><i class="fa fa-facebook " aria-hidden="true"></i> <span>Facebook</span></a>
                            <a href="#"><i class="fa fa-google" aria-hidden="true"></i> <span>Gmail</span
                            ></a>
                            <a href="#"><i class="fa fa-skype" aria-hidden="true"></i> <span>Skype</span></a>
                        </div>
                    </div>
                </div>
            </div><!-- end footer-->
            <div id="footer_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                            <div id="copy">Copyright @<a href="#">http://</a><br/>
                                Product of student CANTHO UNIVERSITY
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- ***END FOOTER AND BODY ***-->
</body>
</html>
