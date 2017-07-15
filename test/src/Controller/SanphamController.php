<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use App\Controller\LoaiController;
use App\Controller\LoaibenhController;
use App\Controller\DangthuocController;
use App\Controller\NhomloaisanphamController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class SanphamController extends AppController
{
    public $loai,$loaibenh,$dangthuoc,$nhomloaisanpham;
    //phan trang
    public $paginate;
    // tao file index dua dua lieu tat ca san pham ra trang index
    public function initialize()
    {
        parent::initialize();
        // API REST
        $this->loadComponent('RequestHandler');
        // phan trang co ban
        $this->loadComponent("Paginator");
    }
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }
    public function isAuthorized(){
        return true;
    }
    public function index(){
        
        //phan trang
        $this->paginate = [
            'contain' => ["Dangthuoc","Loai","Loaibenh","Nhomloaisanpham"],
            'limit' => 3,
            'order' => array('Sanpham.id_sp' => 'desc')
        ];
        $sanpham = $this->paginate($this->Sanpham);
        // chuan hoa du lieu ra ngoai
        $this->set(compact('sanpham'));
        $this->set("_serialize",['sanpham']);
    }
    // Show du lieu den trang view thong qa cac rang buoc 
    public function view($id = null){
        $sanpham = $this->Sanpham->get($id,[
            'contain' => ["Dangthuoc","Loai","Loaibenh","Nhomloaisanpham"]
            ]);
        $this->set(compact('sanpham'));
        $this->set("_serialize",['sanpham']);
    }
    // tao moi sanpham
    public function add(){
        $sanpham = $this->Sanpham->newEntity();
        //get du lieu tu loaicontroller
        $this->Sanpham->loai = new LoaiController();
        $this->Sanpham->loaibenh = new LoaibenhController();
        $this->Sanpham->dangthuoc = new DangthuocController();
        $this->Sanpham->nhomloaisanpham = new NhomloaisanphamController();
        if ($this->request->is('post')) {
                 /*** 
                     ** Upload hinh va kiem tra xem co phai la hinh hay khong
                 ***/
                 $file_image = $this->request->data['hinh_sp'];
                 $image = !empty($file_image["tmp_name"]) ? getimagesize($file_image['tmp_name']) : "";
                 /*** 
                      *** Kiem tra co phai la hinh hay khong
                 **/ 
                 if($image != ""){
                    if($image === FALSE){

                    }else{

                        move_uploaded_file($file_image['tmp_name'], WWW_ROOT . 'img' .DS. $file_image['name']);

                    }
                }
                //chuan bi lai cho luu ten hinh vao csdl
                $this->request->data['hinh_sp'] = $file_image['name'];
                
                $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->getData());
                if ($this->Sanpham->save($sanpham)) {
                    $this->Flash->success(__('Thêm sản phẩm thành công'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Thêm sản phẩm thất bại !!!'));
            }

            $loai = $this->Sanpham->loai->getDataloai();
            $loaibenh = $this->Sanpham->loaibenh->getDataloaibenh();
            $dangthuoc = $this->Sanpham->dangthuoc->getDatadangthuoc();
            $nhomloaisanpham = $this->Sanpham->nhomloaisanpham->getDataNhomloaisanpham();
            $this->set(compact('sanpham','loai','loaibenh','dangthuoc','nhomloaisanpham'));
            $this->set('_serialize', ['sanpham','loai','loaibenh','dangthuoc','nhomloaisanpham']);
        }
        public function edit($id = null)
        {
            $sanpham = $this->Sanpham->get($id, [
                'contain' => []
                ]);
        // loat tat ca sp de get option
            $this->Sanpham->loai = new LoaiController();
            $this->Sanpham->loaibenh = new LoaibenhController();
            $this->Sanpham->dangthuoc = new DangthuocController();
            $this->Sanpham->nhomloaisanpham = new NhomloaisanphamController();

            $loai = $this->Sanpham->loai->getDataloai();
            $loaibenh = $this->Sanpham->loaibenh->getDataloaibenh();
            $dangthuoc = $this->Sanpham->dangthuoc->getDatadangthuoc();
            $nhomloaisanpham = $this->Sanpham->nhomloaisanpham->getDataNhomloaisanpham();

            if ($this->request->is(['patch', 'post', 'put'])) {

        /*** 
            ** Upload hinh va kiem tra xem co phai la hinh hay khong
        ***/
        $file_image = $this->request->data['hinh_sp'];
        $image = !empty($file_image["tmp_name"]) ? getimagesize($file_image['tmp_name']) : "";
        /*** 
             **Kiem tra co phai la hinh hay khong
        **/ 
        if($image != ""){
            if($image === FALSE){

            }else{

                move_uploaded_file($file_image['tmp_name'], WWW_ROOT . 'img' .DS. $file_image['name']);

            }
                    //chuan bi lai cho luu ten hinh vao csdl
            $this->request->data['hinh_sp'] = $file_image['name'];
        }else{
            //chuan bi lai cho luu ten hinh vao csdl
            $this->request->data['hinh_sp'] =  $this->request->data['img_thuoc'];
            
        }

        $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->getData());
        if ($this->Sanpham->save($sanpham)) {
            $this->Flash->success(__('Sửa sản phẩm  thành công'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Sửa sản phẩm  không thành công vui lòng kiểm tra lại'));
    }


    $this->set(compact('sanpham','loai','loaibenh','dangthuoc','nhomloaisanpham'));
    $this->set('_serialize', ['sanpham','loai','loaibenh','dangthuoc','nhomloaisanpham']);
}
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $sanpham = $this->Sanpham->get($id);

    if ($this->Sanpham->delete($sanpham)) {
        $this->Flash->success(__('Xoá sản phẩm thành công'));
    } else {
        $this->Flash->error(__('Xoá không thành công . Vui lòng thử lại'));
    }

    return $this->redirect(['action' => 'index']);
}
    // Trang chu show du lieu nhieu phan 
    // du lieu random
    // du lieu slider
public function home(){
    
    $khacmotloai = 0;
    $khacbonloai =array("");
    $xuatsanpham_baloai = "";
        // san pham moi cap nhat
    $sanpham_motloai = $this->Sanpham->find("all",
        array(
          'order'=>'id_sp DESC',
          'limit'=>1

          )
        );
    $xuatsanpham_motloai = $sanpham_motloai;
        // lay gia tri san pham 1 loai
    foreach ($sanpham_motloai as $sanpham_motloai) {
        $khacmotloai = $sanpham_motloai->id_sp;
    }
        // san pham cap nhan nhung khac sanpham_motloai
    $sanpham_baloai = $this->Sanpham->find("all",
        array(
          'conditions' =>array('id_sp !=' => $khacmotloai),
          'order'=>'id_sp DESC',
          'limit'=>4,
          'page' =>1
          )
        );
        //lay du lieu 3 sp tren
    $xuatsanpham_baloai = $sanpham_baloai;
    foreach ($sanpham_baloai as $sanpham_baloai) {
            // them id sp vao cuoi mang trong khac 3 loai
        array_push($khacbonloai,$sanpham_baloai->id_sp);
    }
        // them 1 pt vao 3 loai tren thanh 4 loai can khac
        // dem mang 4 loai id de kiem tra neu co giong 4 loai nay thi k selects
    array_push($khacbonloai,$khacmotloai);


        // lay cac sp nhung khac 4 sp phia tren 
        // va phai tuy chon radom khi f5
    $sanpham_random = $this->Sanpham->find("all",
        array(
          'conditions' =>array('sanpham.id_sp NOT IN' => $khacbonloai),
          'limit'=>12,
          'order'=>'rand()'
          )
        );
    $this->set(compact('xuatsanpham_baloai','sanpham_motloai','sanpham_random'));
    $this->set("_serialize",['xuatsanpham_baloai','sanpham_motloai','sanpham_random']);
}
public function xemchitiet($id = null){
        // LAY DU LIEU SHOW RA VIEW
    if($id != null){
        $sanpham = $this->Sanpham->get($id,[
            'contain' => ["Dangthuoc","Loai","Loaibenh","Nhomloaisanpham"]
            ]);
        $sanpham_lienquan = $this->Sanpham->find("all",
            array(
              'conditions' =>array('sanpham.id_sp  !=' => $sanpham->id_sp),
              'limit'=>4,
              'order'=>'rand()'
              )
            );
    }


        // cau lenh count va group by
        // kiem tra neu co gia tri trong san pham ve loai
        // va dem so san pham co ma_loai giong vs loai
        // chi xuat nhung loai co ton tai 
    /****** LOAI va DU LIEU LOAI BEN SAN PHAM ****/
    $query_loai = $this->Sanpham->find();
    $query_loai
    ->select([
       'tong_tung_loai' => $query_loai->func()->count('id_sp')
       ])
    ->select(['loai.ten_loai','loai.ma_loai'])
    ->join([
        'loai'=>[
        'table' =>'loai',
        'type' => 'left',
        'conditions' => 'loai.ma_loai = sanpham.ma_loai and sanpham.ma_loai != "0" '
        ]
        ])->group('loai.ma_loai');/******END LOAI va DU LIEU LOAI BEN SAN PHAM ****/

    /****** LOAI BENH va DU LIEU BENH LOAI BEN SAN PHAM ****/
    $query_loaibenh = $this->Sanpham->find();
    $query_loaibenh
    ->select([
       'tong_tung_loaibenh' => $query_loaibenh->func()->count('id_sp')
       ])
    ->select(['loaibenh.ten_loai_benh','loaibenh.ma_loai_benh'])
    ->join([
        'loaibenh'=>[
        'table' =>'loaibenh',
        'type' => 'left',
        'conditions' => 'loaibenh.ma_loai_benh = sanpham.ma_loai_benh and sanpham.ma_loai_benh != "0" '
        ]
        ])->group('loaibenh.ma_loai_benh');/******END LOAI BENH va DU LIEU LOAI BENH BEN SAN PHAM ****/
    /****** DANGTHUOC va DU LIEU DANGTHUOC BEN SAN PHAM ****/
    $query_dangthuoc = $this->Sanpham->find();
    $query_dangthuoc
    ->select([
       'tong_tung_dangthuoc' => $query_dangthuoc->func()->count('id_sp')
       ])
    ->select(['dangthuoc.ten_dang_thuoc','dangthuoc.ma_dang_thuoc'])
    ->join([
        'dangthuoc'=>[
        'table' =>'dangthuoc',
        'type' => 'left',
        'conditions' => 'dangthuoc.ma_dang_thuoc = sanpham.ma_dang_thuoc and sanpham.ma_dang_thuoc != "0" '
        ]
        ])->group('dangthuoc.ma_dang_thuoc');/******END DANGTHUOC va DU LIEU DANGTHUOC BEN SAN PHAM ****/

    /****** DANGTHUOC va DU LIEU DANGTHUOC BEN SAN PHAM ****/
    $query_nhomloaisanpham = $this->Sanpham->find();
    $query_nhomloaisanpham
    ->select([
       'tong_tung_nhomloaisanpham' => $query_nhomloaisanpham->func()->count('id_sp')
       ])
    ->select(['nhomloaisanpham.ten_nhom_loai_san_pham','nhomloaisanpham.ma_nhom_loai_san_pham'])
    ->join([
        'nhomloaisanpham'=>[
        'table' =>'nhomloaisanpham',
        'type' => 'left',
        'conditions' => 'nhomloaisanpham.ma_nhom_loai_san_pham = sanpham.ma_nhom_loai_san_pham  '
        ]
        ])->group('nhomloaisanpham.ma_nhom_loai_san_pham');/******END DANGTHUOC va DU LIEU DANGTHUOC BEN SAN PHAM ****/


        // gan bien show ra giao dien
    $this->set(compact('sanpham','query_loai','query_loaibenh','query_dangthuoc','query_nhomloaisanpham','sanpham_lienquan'));
    $this->set("_serialize",['sanpham','query_loai','query_loaibenh','query_dangthuoc','query_nhomloaisanpham','sanpham_lienquan']);
}
public function xemnhieusanpham(){
        //Tao bien theo tung muc den gan;
        //Tao gia tri mac dinh 999999 de tranh bi select vao muc 0
    $loai = array('99999999');
    $dangthuoc = array('99999999');
    $loaibenh = array('99999999');
    $nhomloaisanpham = array('99999999');
        // lay du lieu cu xem chi tiet khi k co du lieu id dau vao
    $this->xemchitiet();
        // lay du lieu phia sau xemnhieusanpham dua vao mang
        // su dung cau lenh mysql select lay du lieu dau ra
    $param = $this->request->getParam("pass");


    if(!empty($param)){
            // neu co du lieu thi thuc hien cau lenh
        for ($i=0; $i <count($param) ; $i++) { 
            if($this->checkArray('ma_loai',$param[$i])){   
                // Gan vao bien loai cho csdl bang loai
                array_push($loai,$param[$i]);
            }
            if($this->checkArray('ma_nhom_loai_san_pham',$param[$i])){   
                // Gan vao bien nhom loai san pham cho csdl bang nhom loai san pham
                array_push($nhomloaisanpham,$param[$i]);
            }
            if($this->checkArray('ma_dang_thuoc',$param[$i])){   
                // Gan vao bien dang thuoc cho csdl bang dang thuoc
                array_push($dangthuoc,$param[$i]);
            }
            if($this->checkArray('ma_loai_benh',$param[$i])){   
                // Gan vao bien loai benh cho csdl bang loai benh
                array_push($loaibenh,$param[$i]);
            }
        }
        // GAN LENH THEO TUNG LOAI OR 
        // CO THE GIONG HOAC KHAC NHAU CHI CAN TON TAI
        $query = $this->Sanpham->find()
        ->where([
            'OR' => [
                        'ma_loai IN' => $loai,
                        'ma_loai_benh IN' => $loaibenh,
                        'ma_dang_thuoc IN' => $dangthuoc,
                        'ma_nhom_loai_san_pham IN' => $nhomloaisanpham
                    ]
        ]) ;
        // kiem tra neu du lieu ton tai thi gan tiep 
        // show du lieu ra ngoai
        // khong thi cho chay ve trang chu
        if($query->count()){
            $this->set(compact('query'));
            $this->set("_serialize",['query']);    
        }else{
            return $this->redirect(['action' => 'home']);
        }
        
    }else{
        return $this->redirect(['action' => 'home']);
    }
}
    // KIem tra tra ve true va false 
    // khi co noi dung ton tai trong 1 csdl cua bang
    // 4 bang : loai , loaibenh, nhomloaisanpham,dangthuoc
public function checkArray($cot,$noidung){
    $query = $this->Sanpham->find('all',[
        "conditions" => [ $cot.' = ' =>$noidung]
        ]);
    if($query->count() > 0){
        return true;
    }else{
        return false;
    }
}
    //Tim kiem san pham gia tri dau vao la ten san pham
    //Dung cau lenh like de tim kiem show du lieu ra ngoai
public function tim(){
    if(isset($_GET['tim'])){
        if($_GET['tim'] != null){
            $tim = $_GET['tim'];
            // truy van du lieu
            $query = $this->Sanpham->find('all',[
                "conditions" => ['ten_thuoc LIKE ' => '%'.$tim.'%']
            ]);
            // kiem tra noi dung co ton tai hay k co ton tai thi gan tiep
            // k thi quay ve trang chu va thong bao den nguoi dung
            if($query->count()){
                $this->set(compact('query'));
                $this->set("_serialize",['query']);     
            }else{
                $this->Flash->success(__('Không tìm thấy tên này hãy thay đỗi'));
                return $this->redirect(['action' => 'home']);
            }
            
        }else{
            return $this->redirect(['action' => 'home']);
        }
    }else{
        return $this->redirect(['action' => 'home']);
    }
}
// tim kiem bang ajax 
// tuong tu search google dich
public function timajax(){  
    if($this->request->is("ajax")){
        $tim = $_POST['item'];
        // cau lenh select gioi han la 4 phan tu xuat ra
        // cau lenh truc tiep khong dung qa mang conditions
        if($tim != null){
            $query = $this->Sanpham->find()
            ->where(['ten_thuoc LIKE ' => '%'.$tim.'%'])
            ->limit(4)
            ->page(1);
            // xuat noi dung
            foreach ($query as $q ) {
                echo "<option value='".$q->ten_thuoc."'></option>";
            }
        }
        // code khong cho chuyen trang
        $this->autoRender = false;
    }
}
//DELETE multi san pham qua ajax
public function deleteajax(){
    if($this->request->is('ajax')){
        $delete = $_POST['xoa'];
        foreach ($delete as $key => $value) {
            $sanpham = $this->Sanpham->get($delete[$key]);
            if($this->Sanpham->delete($sanpham)){
                echo "ok";
            }else{
                echo "non ok";
            }
        }
        $this->autoRender = false;
    }

}
}
