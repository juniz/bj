
<?php
include "koneksi.php";
$ruangan = $_POST['ruangan'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$arr =array($bulan,$tahun);
$date = implode("-", $arr);
$h_perawatan = $_POST['h_perawatan'];
$l_dirawat = $_POST['l_dirawat'];
$t_tidur = $_POST['t_tidur'];
$h_rawat = $_POST['h_rawat'];
$p_keluar = $_POST['p_keluar'];
$m_lebih = $_POST['m_lebih'];
$m_kurang = $_POST['m_kurang'];
$b = ($h_perawatan/($t_tidur*$h_rawat)*100);
$bor = number_format($b,2);
$a = $l_dirawat/$p_keluar;
$alos = number_format($a,2);
$t = (($t_tidur*$h_rawat)-$h_perawatan)/$p_keluar;
$toi = number_format($t,2);
$b = $p_keluar/$t_tidur;
$bto = number_format($b,2);
$g = (($m_lebih+$m_kurang)/$p_keluar)*100;
$gdr = number_format($g);
$n = ($m_lebih/$p_keluar)*100;
$ndr = number_format($n);
mysqli_query($koneksi,"INSERT INTO modal (id_ruangan,bulan,tahun,h_perawatan,l_perawatan,t_tidur,h_rawat,p_keluar,m_lebih,m_kurang,bor,alos,toi,bto,gdr,ndr) VALUES ('$ruangan','$bulan','$tahun','$h_perawatan','$l_dirawat','$t_tidur','$h_rawat','$p_keluar','$m_lebih','$m_kurang','$bor','$alos','$toi','$bto','$gdr','$ndr')");
header('location:index.php');
?>