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

</head>
<body>		
				<div class="container">
            <form>
                <div class="form-group" style="padding-bottom: 20px">
                  <label for="Hari Perawatan">Hari Perawatan</label>
                  <input type="text" name="h_perawatan" id="h_perawatan" class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lama Dirawat">Lama Dirawat</label>
                   <input type="text" name="l_dirawat" id="l_dirawat" class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Tempat Tidur">Tempat Tidur</label>
                   <input type="text" name="t_tidur" id="t_tidur" class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hari Rawat">Hari Rawat</label>
                   <input type="text" name="h_rawat" id="h_rawat" class="form-control" placeholder="" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Pasien Keluar">Pasien Keluar</label>
                   <input type="text" name="p_keluar" id="p_keluar" class="form-control" placeholder="" required/>
                </div>

                
              
                  <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success" onclick="displayDate();">Grafik</a>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
                  </form>
                </div>
              
              
              <div id="myModal" class="modal fade bd-example-modal-lg" role="dialog">
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

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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

<script>
  

  function displayDate() {

  	var h_perawatan = document.getElementById("h_perawatan").value; 
    var l_dirawat = document.getElementById("l_dirawat").value; 
    var t_tidur = document.getElementById("t_tidur").value; 
    var h_rawat = document.getElementById("h_rawat").value; 
	var p_keluar = document.getElementById("p_keluar").value; 
	var b = (h_perawatan/(t_tidur*h_rawat))*100;
	//$bor = number_format($b,2);
	var a = l_dirawat/p_keluar;
	//$alos = number_format($a,2);
	var t = ((t_tidur*h_rawat)-h_perawatan)/p_keluar;
	//$toi = number_format($t,2);
	var bto = p_keluar/t_tidur;
	//$bto = number_format($b,2);

    var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    exportEnabled: true,
    title:{
      text: "Grafik BJ RSI Aisyiyah Nganjuk"
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
        { x:10-a, y: b/10}
      ]
    },
      {        
      type: "line",
      showInLegend: true, 
      name: "BTO",
      legendText: "BTO",       
      dataPoints: [
        { x:0, y: h_rawat/bto },
        { x: h_rawat/bto, y:0}
        
      ]
    },
      {        
      type: "line",       
      dataPoints: [
        { x:t, y: a }
         
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
//window.onload = function () {
    

//}
</script>
</body>
</html>
