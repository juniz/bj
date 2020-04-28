
<?php
	include "koneksi.php";
	$modal_id=$_POST['modal_id'];
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
	$a=100;
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
	$modal=mysqli_query($koneksi,"UPDATE modal SET id_ruangan = '$ruangan', bulan = '$bulan', tahun = '$tahun', h_perawatan = '$h_perawatan', l_perawatan = '$l_dirawat', t_tidur = '$t_tidur', h_rawat = '$h_rawat', p_keluar = '$p_keluar', m_lebih = '$m_lebih', m_kurang = '$m_kurang', bor = '$bor', alos = '$alos', toi = '$toi', bto = '$bto', gdr = '$gdr', ndr = '$ndr'  WHERE modal_id = '$modal_id'");
	header('location:index.php');
?>