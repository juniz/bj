
<!doctype html>
<html lang="en">
<head>
<title>Aplikasi Grafik Barber Jhonson</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="" name="author"/>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.dataTables.min.css"/>

<link href="css/bootstrap.css" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<style>
  .highcharts-figure, .highcharts-data-table table {
  min-width: 360px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>

</head>
<body>
 
<div class="container">
  <h2></h2>
  <p></p>
  <p>
    <a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a>
    <a href="#" class="btn btn-success" data-target="#myTambahRuangan" data-toggle="modal">Ruangan</a>
    <a href="test.php" class="btn btn-success">Grafik</a>
  </p>      

<table id="tabel-data" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <th>No</th>
      <th>RUANGAN</th>
      <th>PERIODE</th>
      <th>HARI PERAWATAN</th>
      <th>LAMA PERAWATAN</th>
      <th>TEMPAT TIDUR</th>
      <th>HARI RAWAT</th>
      <th>PASIEN KELUAR</th>
      <th>MATI > 48 JAM</th>
      <th>MATI < 48 JAM</th>
      <th>BOR (%)</th>
      <th>ALOS (Hari)</th>
      <th>TOI (Hari)</th>
      <th>BTO (Pasien)</th>
      <th>GDR (%)</th>
      <th>NDR (%)</th>
      <th>AKSI</th>
    </thead>

<tbody>
  <?php 
  //menampilkan data mysqli
  include "koneksi.php";
  $toth_perawatan = 0;
  $totl_perawatan = 0;
  $tot_t_tidur = 0;
  $toth_rawat = 0;
  $totp_keluar = 0;
  $totm_lebih = 0;
  $totm_kurang = 0;
  $totbor = 0;
  $totalos = 0;
  $tottoi = 0;
  $totbto = 0;
  $totgdr = 0;
  $totndr = 0;
  $no = 0;
  $modal=mysqli_query($koneksi,"SELECT * FROM modal INNER JOIN ruangan ON modal.id_ruangan = ruangan.id_ruangan ORDER BY ruangan.nama_ruangan ASC");
  while($r=mysqli_fetch_array($modal)){
  $no++;
  $toth_perawatan += $r['h_perawatan'];
  $totl_perawatan += $r['l_perawatan'];
  $tot_t_tidur += $r['t_tidur'];
  $toth_rawat += $r['h_rawat'];
  $totp_keluar += $r['p_keluar'];
  $totm_lebih += $r['m_lebih'];
  $totm_kurang += $r['m_kurang'];
  $totbor += $r['bor'];
  $totalos += $r['alos'];
  $tottoi += $r['toi'];
  $totbto += $r['bto'];
  $totgdr += $r['gdr'];
  $totndr += $r['ndr'];
       
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['nama_ruangan']; ?></td>
      <td><?php 

        $bulan = $r['bulan'].' - ';
        $tahun = $r['tahun'];
        $bulan .=$tahun;
        echo  $bulan; 

        ?>
          
      </td>
      <td><?php echo  $r['h_perawatan']; ?></td>
      <td><?php echo  $r['l_perawatan']; ?></td>
      <td><?php echo  $r['t_tidur']; ?></td>
      <td><?php echo  $r['h_rawat']; ?></td>
      <td><?php echo  $r['p_keluar']; ?></td>
      <td><?php echo  $r['m_lebih']; ?></td>
      <td><?php echo  $r['m_kurang']; ?></td>
      <td><?php echo  $r['bor']; ?></td>
      <td><?php echo  $r['alos']; ?></td>
      <td><?php echo  $r['toi']; ?></td>
      <td><?php echo  $r['bto']; ?></td>
      <td><?php echo  $r['gdr']; ?></td>
      <td><?php echo  $r['ndr']; ?></td>
      <td>
         <a href="#" class='open_modal btn btn-warning' id='<?php echo  $r['modal_id']; ?>'>Edit</a>
         <a href="#" class="btn btn-danger" data-target="#modal_delete" onclick="confirm_modal('proses_delete.php?&modal_id=<?php echo  $r['modal_id']; ?>');">Delete</a>
         <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success" onclick="displayDate('<?php echo  $r['bor']; ?>', '<?php echo  $r['alos']; ?>', '<?php echo  $r['toi']; ?>', '<?php echo  $r['bto']; ?>', '<?php echo  $r['h_rawat']; ?>', '<?php echo $r['nama_ruangan']; ?>');">Grafik</a>
      </td>
  </tr>
  <?php } ?>
 </tbody>
 <tfoot align="right">
    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
  </tfoot>
</table>
</div>

<!-- Modal Popup untuk Add--> 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myRuangan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <p>
            <a href="#" class="btn btn-success" data-target="#myTambahRuangan" data-toggle="modal">Tambah Ruangan</a>
          </p>   
        <table id="tabel-data" class="table table-bordered" style="width:100%">
          <thead>
            <th>No</th>
            <th>RUANGAN</th>
          </thead>
          <tbody>
            <?php 
                      //menampilkan data mysqli
              include "koneksi.php";
              $no = 0;
              $modal=mysqli_query($koneksi,"SELECT * FROM ruangan ORDER BY nama_ruangan ASC");
              while($r=mysqli_fetch_array($modal)){
                $no++;
                ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo  $r['nama_ruangan']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="myTambahRuangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="tambah_ruangan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="NDR">Ruangan</label>
                   <input type="text" name="nama_ruangan"  class="form-control" placeholder="" required/>
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
            </div>  
        </div>
    </div>
</div>

<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Ruangan">Ruangan</label>
                  <select name="ruangan" class="ruangan form-control" id="ruangan">
                    <?php 
                      //menampilkan data mysqli
                      include "koneksi.php";
                      $no = 0;
                      $modal=mysqli_query($koneksi,"SELECT * FROM ruangan");
                      while($r=mysqli_fetch_array($modal)){
                        echo '<option value="'.$r['id_ruangan'].'">'.$r['nama_ruangan'].'</option>';
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
                                  if ($i == $selected)
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
                  $month = date("n");
                  $date = $month - 1;

                  echo monthDropdown($name, $date);

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

                      print '<select class="form-control" name="tahun">';
                      // Loops over each int[year] from current year, back to the $earliest_year [1950]
                      foreach ( range( $latest_year, $earliest_year ) as $i ) {
                        // Prints the option with the next year in range.
                        print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                      }
                      print '</select>';
                  ?>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Perawatan">Hari Perawatan</label>
                  <input type="text" name="h_perawatan"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lama Dirawat">Lama Dirawat</label>
                   <input type="text" name="l_dirawat"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Tempat Tidur">Tempat Tidur</label>
                   <input type="text" name="t_tidur"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Rawat">Hari Rawat</label>
                   <input type="text" name="h_rawat"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Pasien Keluar">Pasien Keluar</label>
                   <input type="text" name="p_keluar"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Mati > 48 Jam">Mati > 48 Jam</label>
                   <input type="text" name="m_lebih"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Mati < 48 Jam">Mati < 48 Jam</label>
                   <input type="text" name="m_kurang"  class="form-control" placeholder="" required/>
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
            </div>

           
        </div>
    </div>
</div>

<div id="myGrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Perawatan">Hari Perawatan</label>
                  <input type="text" name="h_perawatan"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lama Dirawat">Lama Dirawat</label>
                   <input type="text" name="l_dirawat"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Tempat Tidur">Tempat Tidur</label>
                   <input type="text" name="t_tidur"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Rawat">Hari Rawat</label>
                   <input type="text" name="h_rawat"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Pasien Keluar">Pasien Keluar</label>
                   <input type="text" name="p_keluar"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Mati > 48 Jam">Mati > 48 Jam</label>
                   <input type="text" name="m_lebih"  class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Mati < 48 Jam">Mati < 48 Jam</label>
                   <input type="text" name="m_kurang"  class="form-control" placeholder="" required/>
                </div>
              <div class="modal-footer">
                  <button class="btn btn-success" type="submit onclick="onclick="">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>
              </form>
            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div id="modal_delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>  
<!-- optional -->  
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>  
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>



<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "modal_edit.php",
    			   type: "GET",
    			   data : {modal_id: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<script>

  $(document).ready( function () {

    var myTable = $('#tabel-data').DataTable({
        "paging": false,
        dom: 'Bfrtip',
        rowReorder: true,
        "ordering": true,
        select: true,
        buttons: [
            'csv', {
              extend:'excel',
              exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            }, {
            extend: "print",
            customize: function(win)
            {
 
                var last = null;
                var current = null;
                var bod = [];
 
                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');
 
                style.type = 'text/css';
                style.media = 'print';
 
                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }
 
                head.appendChild(style);
         },
         exportOptions: {
                    columns: ':visible'
                }
      },'colvis','selectAll', 'selectNone'
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over this page
            pageTotal4 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            pageTotal10 = api
                .column( 15, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(pageTotal4);
            $( api.column( 15 ).footer() ).html(pageTotal10);
        }
        
    } );
    
    myTable.select.style( 'os' );
    myTable.select.items( 'row' );
} );
  </script>


  <script>
    $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});
  </script>

  <!--<script>
  document.getElementById("myBtn").addEventListener("click", displayDate);

  function displayDate(bor, alos, toi, bto, periode, ruangan) {
    
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    exportEnabled: true,
    title:{
      text: "Grafik BJ "+ruangan
    },
      axisX:{
        minimum:0,
        title:"TOI"
      },
    axisY:{
      includeZero: true,
      title:"ALOS"
    },
    data: [{        
      type: "line",
      showInLegend: true, 
      name: "BOR",
      legendText: "BOR",       
      dataPoints: [
        { x:0, y: 0},
        { x:10-alos, y: bor/10}
      ]
    },
      {        
      type: "line",
      showInLegend: true, 
      name: "BTO",
      legendText: "BTO",       
      dataPoints: [
        { x:0, y: periode/bto },
        { x: periode/bto, y:0}
        
      ]
    },
      {        
      type: "line",       
      dataPoints: [
        { x:toi, y: alos }
         
      ]
    },
    {        
      type: "area",
      color: "gold",
      showInLegend: true,
      name: "Daerah Efisien",       
      dataPoints: [
        { x:3, y: 75/10 },
        { x:1, y: 3 },
        { x:1, y: 12 },
        { x:3, y:12 },
      ]
    }]
});
chart.render();
  }

</script>-->

<script>
   
  function displayDate(bor, alos, toi, bto, periode, ruangan) {

        var myChart = Highcharts.chart('chartContainer', {
            title: {
                text: "Grafik BJ "+ruangan
            },
            yAxis: {
                title: {
                    text: "ALOS"
                }
            },
            xAxis: {
                title: {
                    text: "TOI"
                }
            },
            series: [{
                type: "line",
                name: 'BOR = '+bor,
                data: [
                  { x:0, y: 0},
                  { x:10-alos, y: bor/10}
                ]
            }, {
                type: "line",
                name: 'BTO = '+bto,
                data: [
                  { x:0, y: periode/bto },
                  { x: periode/bto, y:0}  
                ]
            },{
                type: "area",
                color: 'gold',
                name: 'Daerah Efisien',
                data: [
                  { x:3, y:7.5 },
                  { x:1, y:3 },
                  { x:1, y:12 },
                  { x:3, y:12 }
                ]
            }

            ]
        });
    };


</script>

<!-- Javascript untuk popup modal Delete--> 
<script>
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>



</body>
</html>

  



