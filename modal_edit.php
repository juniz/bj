
<?php
    include "koneksi.php";
	$modal_id=$_GET['modal_id'];
	$modal=mysqli_query($koneksi,"SELECT * FROM modal INNER JOIN ruangan ON modal.id_ruangan = ruangan.id_ruangan WHERE modal.modal_id='$modal_id'");
	while($r=mysqli_fetch_array($modal)){
    $data = $r['id_ruangan'];
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Ruangan">Ruangan</label>
                    <input type="hidden" name="modal_id"  class="form-control" value="<?php echo $r['modal_id']; ?>" />
     				         <select name="ruangan" class="form-control" >
                    <?php 
                      //menampilkan data mysqli
                      include "koneksi.php";
                      $no = 0;
                      $query=mysqli_query($koneksi,"SELECT * FROM ruangan");
                      while($sql=mysqli_fetch_array($query)){
                        if($sql['id_ruangan']==$data){
                        echo '<option selected="selected" value="'.$sql['id_ruangan'].'">'.$sql['nama_ruangan'].'</option>';
                      }else{
                        echo '<option value="'.$sql['id_ruangan'].'">'.$sql['nama_ruangan'].'</option>';
                      }
                      }
                      ?>
                      </select>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Bulan</label>
                  <?php
                  function monthDropdown($name="month", $selected=null)
                  {
                          $dd = '<select class="form-control" name="'.$name.'" id="'.$name.'">';

                          $months = array(
                                  'Januari',
                                  'Februari',
                                  'Maret',
                                  'April',
                                  'Mei',
                                  'Juni',
                                  'Juli',
                                  'Agustus',
                                  'September',
                                  'Oktober',
                                  'November',
                                  'Desember');
                          /*** the current month ***/
                          $selected = is_null($selected) ? date('n', time()) : $selected;

                          for ($i = 0; $i < 12; $i++)
                          {
                                  $dd .= '<option value="'.$months[$i].'"';
                                  if ($months[$i] == $selected)
                                  {
                                          $dd .= ' selected';
                                  }
                                  /*** get the month ***/
                                  $dd .= '>'.$months[$i].'</option>';
                          }
                          $dd .= '</select>';
                          return $dd;
                  }


                  /*** example usage ***/
                  $name = 'bulan';
                  $month = $r['bulan'];
                  

                  echo monthDropdown($name, $month);

              ?>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Tahun</label>
                  <?php
                      // Sets the top option to be the current year. (IE. the option that is chosen by default).
                      $currently_selected = date('Y'); 
                      // Year to start available options at
                      $earliest_year = 2000; 
                      // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                      $latest_year = date('Y'); 
                      $year = $r['tahun'];
                      

                      print '<select class="form-control" name="tahun">';
                      // Loops over each int[year] from current year, back to the $earliest_year [1950]
                      foreach ( range( $latest_year, $earliest_year ) as $i ) {
                        // Prints the option with the next year in range.

                        print '<option value="'.$i.'"'.($i === $year ? ' selected="selected"' : '').'>'.$i.'</option>';
                      }
                      print '</select>';
                  ?>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Perawatan">Hari Perawatan</label>
                  <input type="text" name="h_perawatan"  class="form-control" placeholder="" value="<?php echo  $r['h_perawatan']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lama Dirawat">Lama Dirawat</label>
                   <input type="text" name="l_dirawat"  class="form-control" placeholder="" value="<?php echo  $r['l_perawatan']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Tempat Tidur">Tempat Tidur</label>
                   <input type="text" name="t_tidur"  class="form-control" placeholder="" value="<?php echo  $r['t_tidur']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Rawat">Hari Rawat</label>
                   <input type="text" name="h_rawat"  class="form-control" placeholder="" value="<?php echo  $r['h_rawat']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Pasien Keluar">Pasien Keluar</label>
                   <input type="text" name="p_keluar"  class="form-control" placeholder="" value="<?php echo  $r['p_keluar']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Mati > 48 Jam">Mati > 48 Jam</label>
                   <input type="text" name="m_lebih"  class="form-control" placeholder="" value="<?php echo  $r['m_lebih']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Mati < 48 Jam">Mati < 48 Jam</label>
                   <input type="text" name="m_kurang"  class="form-control" placeholder="" value="<?php echo  $r['m_kurang']; ?>" required/>
                </div>

                

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>