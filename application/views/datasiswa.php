<html>
<head>
	<link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 	<link href="<?php echo base_url(); ?>public/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>public/toastr/toastr.css" rel="stylesheet" type="text/css" />
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/DataTables/media/css/jquery.dataTables.min.css">
 	<script src= "<?php echo base_url(); ?>public/jquery-3.1.1.min.js"></script>
	<link rel ="icon" type ="image/png" href ="content2/img/1641.jpg">
<title> Data Siswa </title>

<style>

body{
	background-color: #bdc3c7;
	padding		: 0;
	margin		: 0;
}
header{
	background	: #34495c;
	padding		: 20px;	
	color		: white;
	overflow	: hidden;
	margin		: auto;
}

.judul{
	font-family	: Bellota;
	font-size	: 20pt;
	margin		: 5px;
	letter-spacing: 5px;
}

.kotak {
	text-decoration	: none;
	position		: relative;
	border-collapse	: collapse;
	border-radius	: 5px;	
	padding-top		: 10px;
	padding-bottom	: -100px;
	padding-left	: 15px;
	padding-right	: -20px;
	width			: 70px;
	height			: 35px;
	background-color: #34495c;
	color			: white;
	cursor			: pointer;
	margin-left		: 1620px;
	margin-top		: -54px;
	align			: center;
	font-family		: Bellota;
}
.kotak:hover {
	color			: white;
	background-color: #e67e22;
	transition		: 1s;
}
#footer{
	background-color: #34495c;	
	background-size	: cover;
	position		: fixed;
	left			: 0;
	bottom			: 0;	
	width			: 100%;
	height			: 50px;
	border-collapse	: collapse; 
	font-family		: Bellota;
	color			: white;
	align			: center;
	font-size		: 14px;
}
.main{
	background-color: #e5e4d7;
	margin-left		: 10px;
	margin-right	: 320px;
	margin-top		: 38px;
	margin-bottom	: 10px;
	border-radius   : 5px;
	padding			: 20 20 166 20px;
	font-size 		: 110%;
}
h1{
	font-size		: 200%;
	font-family		: magnolia script;
	color			: white;
}
h2{
	font-size		: 200%;
	font-family		: magnolia script;
	color			: darkblue;
}
#navbar ul{
	padding			: 20px;
	list-style-type : none;
	text-align      : center;
	background-color: #34495c;
	margin			: auto;
}
#navbar ul li{
	display			: inline;
}
#navbar ul li a{
	text-decoration : none;
	font-family		: bellota;
	padding			: .2em 1em;
	color			: #fff;
	background-color: #34495c;
}

</style>
	
	<header>
	<h1 class="judul">Data Siswa</h1>
</header>
	<body>
		<div id="navbar">  
	
        	<ul>
			
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/dashboard"> Dashboard</a></li>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/datasiswa"> Data Siswa</a></li>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/grafikal"> Grafikal Siswa</a></li>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/tentang"> Tentang</a></li>
		
			
		</ul>
        </div>

	
<button style="	margin-top			: 30px; 
				margin-left			: 25px; 
				background-color	: #1abc9c;
				border				: 1px solid #1abc9c;
				border-collapse		: collapse;
				border-radius		: 12%;
				padding				: 10px;
				font-family			: Bellota;
				font-size			: 12pt;"
		class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_modal">
<span  aria-hidden="true"></span> Tambah</button>
	<div class="pull-right">
 		<a href="cetak_pdf">
		<button style="	
				margin-top			: 30px; 
				margin-left			: 25px; 
				background-color	: #e74c3c;
				border				: 1px solid #e74c3c;
				border-collapse		: collapse;
				border-radius		: 12%;
				padding				: 10px;
				font-family			: Bellota;
				font-size			: 12pt;"
		type="button" class="btn btn-danger btn-sm">
			<span class="glyphicon glyphicon-print" aria-hidden="true">
		</span> PDF</button></a>
 		
		<a href="cetak_excel"><button
		style="	margin-top			: 30px; 
				margin-left			: 25px; 
				background-color	: #2ecc71;
				border				: 1px solid #2ecc71;
				border-collapse		: collapse;
				border-radius		: 12%;
				padding				: 10px;
				font-family			: Bellota;
				font-size			: 12pt;"
		type="button" class="btn btn-success btn-sm">
			<span class="glyphicon glyphicon-print" aria-hidden="true">
		</span> Excel</button></a>

		</div> 	
  <br><br>
  <input type="text" name="cari" onkeyup="cariajax(this)" 
  placeholder="Cari . . ." id="cari" class="form-control" 
  style="	width				: 30%;
			background-color	: white;
			margin-left			: 25px;
			padding				: 20px;
			border-collapse		: collapse;
			border				: 1px solid silver;
			font-family			: Bellota;
			font-size			: 12pt;
			">
 <div id="table_data">
</div>

	
<!-- Modal Hapus -->
<div class="modal fade" id="hapus_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Apakah Anda Yakin Menghapus Data Ini??</h4></center>
      </div>
      <div class="modal-body">
      <input type="hidden" name="id_delete" id="id_delete">
        <center>
        	<button onclick="hapusajax()" class="btn btn-success">Ya</button>
        	<button class="btn btn-danger" data-dismiss="modal">Tidak</button>
        </center>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Tambah Data</h4></center>
      </div>
      <div class="modal-body">
          
            <div class="form-group">
              <label>Nama :</label>
              <input type="text" name="nama" id="nama" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Kelas :</label>
              <select name="kelas" class="select2" id="kelas" style="width: 100%" required="">
                <option value=""> -Pilihan- </option>
                <option value="XRPA">XRPA</option>
                <option value="XRPB">XRPB</option>
              </select>
            </div>    
           
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="tambahajax()" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Edit Data</h4></center>
      </div>
      <div class="modal-body">
        <form action="update" method="post">
           <div id="form-edit">
             
           </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editajax()" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>
<div id ="footer">
	<center style ="margin-top: 15px;font-weight: none;"> 
	Copyright &#174; 2017 by Alexandria Christina Natalia. All right reserved 
	</center>
</div> 

 </body>
 </html>
 <script src="<?php echo base_url(); ?>public/select2/dist/js/select2.min.js"></script>
 <script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url(); ?>public/toastr/toastr.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>public/DataTables/media/js/jquery.dataTables.js"></script>
	 
 <script type="text/javascript">
function reload_table(){
          $('#table_data').load('isi_table'); 
}

function cariajax(ini){
  var cari = ini.value;
    $.ajax({
                url:"cari",
                method:'post',
                data:'cari='+cari,
                dataType:'html',
                success: function(data) {  
                    $('#table_data').html(data);                 
                }
      });
}

function hapusajax(){
  var id = $('#id_delete').val();

  $.ajax({
                url:"hapus",
                method:'post',
                data:'id='+id,
                dataType:'html',
                success: function(data) {
                    reload_table();  
                    
                    toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.options.timeOut = 1500; // 1.5s
                    toastr.warning('Data Berhasil Dihapus!');
                    
                    $('#hapus_modal').modal('hide');                 
                }
            });
}

function tambahajax(){
  var nama = $('#nama').val();
  var kelas = $('#kelas').val();

  $.ajax({
                url:"tambah",
                method:'post',
                data:'nama='+nama+'&kelas='+kelas,
                dataType:'html',
                success: function(data) {
                    reload_table();

                     toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.options.timeOut = 1500; // 1.5s
                    toastr.success('Data Berhasil Ditambah!');
                    
                    $('#hapus_modal').modal('hide');  
                    $('#tambah_modal').modal('hide');                 
                }
            });
}

function editajax(){
  var nama = $('#nama_edit').val();
  var kelas = $('#kelas_edit').val();
  var id = $('#id_edit').val();
  $.ajax({
                url:"update",
                method:'post',
                data:'nama='+nama+'&kelas='+kelas+'&id='+id,
                dataType:'html',
                success: function(data) {
                    reload_table();  

                     toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.options.timeOut = 1500; // 1.5s
                    toastr.success('Data Berhasil Diedit!');
                    
                    $('#hapus_modal').modal('hide');  
                    $('#edit_modal').modal('hide');                 
                }
            });
}

 $('.select2').select2();

$(document).ready(function() {
    reload_table();
    $('#table_data').hide();
    $('#table_data').fadeIn(500);

    $('#edit_modal').on('show.bs.modal', function(e) {

           var $modal = $(this),
           esseyId = e.relatedTarget.id;
                
            
           $.ajax({
                url:"dataedit",
                method:'post',
                data:'id='+esseyId,
                dataType:'html',
                success: function(data) {
                    $('#form-edit').html(data);                   
                }
            });

       });

    $('#hapus_modal').on('show.bs.modal', function(e) {

           var $modal = $(this),
           esseyId = e.relatedTarget.id;
               
           $('#id_delete').val(esseyId);

       });
    
});
</script>
