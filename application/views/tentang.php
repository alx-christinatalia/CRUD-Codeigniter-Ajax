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

.menu{
	font-family		: Bellota;
	position		: fixed;	
	background		: #7f8c8d;
	color			: white;			
	height			: 90%;
	width			: 210px;
	top				: 77;
	left			: -300px;
-webkit-transition  : left 0.2s;
	transition		: left 0.2s;
	padding			: 20px;
	border-collapse	: collapse;
}
.menu :hover{
	background-color: ;
	color			: black;

}
.menu ul{
	padding			: 0;
}

.menu li{
	list-style-type	: none;
	padding			: 10px 0px;
}

.menu a{
	color			: #232323;
	text-decoration	: none;
	font-size		: 10pt;
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
.slide-menu-tampil{
	left			: 0 !important;
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
	margin			: 40 10 0 10px;
	border-radius   : 5px;
	padding			: 20px;
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
table,tr,td{
font-family: Bellota;
color: green;
border: 1px solid aqua;
padding: 5px;
border-collapse: collapse;
}


.posisi{
position: absolute;
margin-left: auto;
margin-right: auto;
margin-bottom: auto;
margin-top: auto;
left: 0;
right: 0;
top: 100px;
bottom: 0;
}



	</style>

<header>
	<h1 class="judul"> Tentang</h1>
</header>
	<body>
			<div class="kotak" style ="font-face:Bellota; font-weight: bold;  ">Menu</div>
	<nav class="menu">    
	<center><h4 style="font-size:17pt;"> Menu </h4></center><br>
	<hr>
	
        	<ul>
				<center>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/dashboard"> Dashboard</a></li><br>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/datasiswa"> Data Siswa</a></li><br>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/grafikal"> Grafikal Siswa</a></li><br>
		<li><a style="font-size:13pt; color:white;" href="<?php echo base_url();?>index.php/Ctrl_home/tentang"> Tentang</a></li><br>
		<hr>
				</center>
		</ul>
        </nav>
	
<div class="main">
	<h2>
		<font face="Magnolia Script">Author . . . </font>
	</h2>
	<hr>
			<div align="center" id="wrapper">
<div id="header">

</font>
</div>
<div id="content">

<font  size="+1" face="Tw cen MT" color="darkblue">
Penulis dilahirkan di Batu, pada tanggal 31 Desember 2000. Penulis yang biasa dipanggil dengan nama “Christ” atau “John” ini memiliki nama lengkap yaitu Christina Natalia, dan merupakan anak pertama dari tiga bersaudara.<br>
Penulis telah menempuh pendidikan formal yaitu, TK Sang Timur Batu, SDK Sang Timur Batu, dan SMPK Widyatama Batu. Setelah lulus dari SMPK Widyatama Batu pada tahun 2016, penulis meneruskan pendidikan ke SMK PGRI 3 Malang di Bidang Keahlian Teknik Informasi dan Komunikasi, Kompetensi Keahlian Rekayasa Perangkat Lunak pada tahun 2016 dan terdaftar dengan Nomor Induk Siswa 18173/1660.063.<br> Penulis memiliki beberapa prestasi akademik dan non akademik selama menempuh pendidikan formalnya antara lain, Juara VI Lomba Mewarnai di Hotel Orchids TKK SANG TIMUR, Juara III Kelas 1 SDK SANG TIMUR BATU, Juara IV Kelas 2 SDK SANG TIMUR BATU, Juara V Kelas 3 SDK SANG TIMUR BATU, Juara V Kelas 4 SDK SANG TIMUR BATU, Juara V Kelas 5 SDK SANG TIMUR BATU, Juara X Kelas 6 SDK SANG TIMUR BATU, Juara III Kelas 7 SMPK WIDYATAMA BATU, Juara VIII Kelas 8 SMPK WIDYATAMA BATU, Juara I Kelas 9 SMPK WIDYATAMA BATU, Harapan III Lomba Membaca Puisi SDK SANG TIMUR, dan pernah mengikuti Seleksi Olimpiade IPA di SMA Hua Ind Malang.
<br> Berikut  ini adalah email 
penulis yang bisa dihubungi, cn31259@gmail.com dan juga nomor Handphone yang dapat dihubungi yaitu, 0888 5568 137
</font>
</div>
<div id ="footer">
<a href="http://facebook.com" title="menuju halaman facebook">
	<img src="4.png" width="50px"/>
<a href="http://instagram.com" title="menuju halaman instagram">
	<img src="3.png" width="50px"/>
</a>	
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
	 
 <script>
 $(document).ready(function(){
	$('.kotak').click(function(){
		$('.menu').toggleClass("slide-menu-tampil");
	});
});
</script>
