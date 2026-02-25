<!DOCTYPE HTML>  
<html>

<body>  

<?php
class sinhvien {
  public $mssv;
  public $hoten;

  public $ngaysinh;



  function set_name($MSSV,$name,$ngaysinh) {
    $this->mssv = $MSSV;
    $this->hoten = $name;
    $this->ngaysinh = $ngaysinh;
  }
  function get_name() {
    return $this->hoten;
  }

  function __destruct() {
    echo "Ma so sinh vien: {$this->mssv}. <br>"; 
    echo "Ten sinh vien: {$this->hoten}.<br>";
    echo "Ngay sinh cua sinh vien: {$this->ngaysinh}.<br>";
    echo "Tuoi sinh vien : " .$this->tinhTuoi();

  }
function __construct($MSSV,$name,$ngaysinh) {
  $this->mssv = $MSSV;
	$this->hoten = $name;
  $this->ngaysinh = $ngaysinh;
  }


  public function tinhTuoi(): int {
    $birthDate = new DateTime($this->ngaysinh);
    $today = new DateTime("today");
    return $birthDate->diff($today)->y;
}
}


$SVienA = new sinhvien(MSSV: "B2303739",name: "Nguyen Van A",ngaysinh: "2005-01-12");


// echo $SVienA->get_name();
echo "<br>";
?>


</body>
</html>

