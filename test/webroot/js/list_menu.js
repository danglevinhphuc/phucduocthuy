/*** CHANGE WATCH ****/
$(document).ready(function(){
	$('.fa-th-list').addClass('active_change');
	$(".fa-th-list").click(function(){
		$(".tuy_chon_xem").removeClass('col-md-3').addClass('col-md-6');
		$(this).addClass('active_change');
		$('.fa-table').removeClass('active_change');
	});
	$(".fa-table").click(function(){
		$(".tuy_chon_xem").removeClass('col-md-6').addClass('col-md-3');
		$(this).addClass('active_change');
		$('.fa-th-list').removeClass('active_change');
	});
});/***END CHANGE WATCH ****/
/*** CHECKBOX WATCH ****/
$(document).ready(function(){
	var x = $(location).attr('pathname');
	var array = ["tatca_loai", "heo", "gia-suc-nhai-lai","gia-cam","thu-cung","loai-khac"
	,"tatca_nhomloai","khang-sinh","khang-nam","khang-viem-giam-dau-ha-sot","khang-sinh-ket-hop-giam-dau"
	,"probiotic","tri-cau-trung","tri-ky-sinh-trung","sat-trung","diet-con-trung","xu-ly-moi-truong"
	,"giai-doc-gan-than","tang-mien-dich-de-khang","cung-cap-chat-dien-giai","bo-sung-sat"
	,"bo-sung-calcium-phosphorus","bo-sung-dinh-duong","hooc-mon","an-than","cham-soc-da-long-tai-mat"
	,"thao-duoc","nhom-loai-khac","tatca_cach","dung-dich-tiem","hon-hop-tiem","bot-pha-tiem","dung-dich-hon-hop-uong"
	,"bot-tan","bot-premix","bot-tui","thuoc-vien","dang-gel-paste-mo-kem","phun-xit","bom-vu","bom-tu-cung"
	,"nho-mat-nho-tay","dung-ngoai","dang-khac","tatca_loai-benh","ho-hap","tieu-hoa","co-xuong-khop"
	,"viem-vu","da-long-mong","ky-sinh-trung","cau-trung","stress-giam-de-khang","loan-khuan-duong-ruot-gan-nhiem-doc"
	,"dinh-duong-roi-loan-chuyen-hoa","mat-nuoc","benh-khac"];
	for(var i = 0; i< array.length ; i++){
		var id = "#" + array[i];
		if(x.indexOf(array[i]) != -1){
			$(id).attr('checked',true);
		}else{
			$(id).removeAttr('checked');
		}
	}
});/****END CHECKBOX WATCH ****/
function chon_list($id){
	/** 
		** Nếu link liên kết có tồn tại xem nhieu thong tin thi thuc hien cat chuoi diem dau va diem cuoi 
		de bo~ xemnhieusp/view
		** Neu tim thay xemnhieusp va ton tại giá trị chọn khong lam gi hết
		** Neu tim thay xemnhieusp va khong ton tai gia tri chon 
	**/
	
	var x = $(location).attr('pathname');
	var id = "#"+$id; // gia tri id;

	/**
			** Neu gia tri tại điểm chọn khac voi gia tri chọn thi thuc hien sao chep link cu
		*/
	var diem_mac_dinh = x.search($id); //21
	var diem_cuoi_chon = x.length;
	var param_chon = x.substring(diem_mac_dinh,diem_cuoi_chon);
	if(param_chon != $id && x.indexOf("xemnhieusanpham") != -1 && x.indexOf($id) == -1){
		window.location.href  = param_chon + "/" + $id;
	}else if(x.indexOf($id) != -1 && param_chon == $id && x.indexOf("xemnhieusanpham") != -1){
		/** 
					** Neu san pham da ton tai 
					** Sp co check
					** Thi reset lai url va bo~ sp da~ chon ra
			**/
		var do_dai_gia_tri = $id.length;
		var do_dai_tim_thay_sp_url = x.indexOf($id);
		var do_dai_xoa_sp = do_dai_gia_tri + do_dai_tim_thay_sp_url;
		var url_truoc_sp = x.substring(0,do_dai_tim_thay_sp_url-1);
		var url_sau_sp = x.substring(do_dai_xoa_sp,x.length);
		var url_again = url_truoc_sp + url_sau_sp;
		//console.log(url_again);
		window.location.href = url_again;
	}else if(x.indexOf($id) != -1 && param_chon != $id && x.indexOf("xemnhieusanpham") != -1){
		var do_dai_gia_tri = $id.length;
		var do_dai_tim_thay_sp_url = x.indexOf($id);
		var do_dai_xoa_sp = do_dai_gia_tri + do_dai_tim_thay_sp_url;
		var url_truoc_sp = x.substring(0,do_dai_tim_thay_sp_url-1);
		var url_sau_sp = x.substring(do_dai_xoa_sp,x.length);
		var url_again = url_truoc_sp + url_sau_sp;
		//console.log(url_again);
		window.location.href = url_again;
		//console.log("abc");
	}else{
		/*** 
			*** Chuyen tu view sang xemnhieusp action
		***/
		window.location.href  = "/sanpham/xemnhieusanpham/"+$id;
	}

}
