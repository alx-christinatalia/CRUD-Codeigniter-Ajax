<html>
<head>
	<link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 	<link href="<?php echo base_url(); ?>public/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>public/toastr/toastr.css" rel="stylesheet" type="text/css" />
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/DataTables/media/css/jquery.dataTables.min.css">
 	<script src= "<?php echo base_url(); ?>public/jquery-3.1.1.min.js"></script>
	<link rel ="icon" type ="image/png" href ="content2/img/1641.jpg">
<title> Dashboard </title>
	<style>

body{
	background-color: #9c9f84;
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
	-webkit-transition: left 0.2s;
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
	margin-left		: 1520px;
	margin-top		: -34px;
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
.sideright{
	background-color: #e5e4d7;
	margin-top		: -669px;
	margin-right	: 10px;
	border-radius	: 5px;
	padding			: 20 0 151 20px;
	font-size		: 105%;
	float			: right;
	width			: 300px;
}
	</style>

<header>
	<h1 class="judul">Dashboard</h1>
</header>
	<body>
		<div class="container" style="margin-top:-75px; margin-left:530px; font-family:Bellota;">
		<br>
			<div class="dropdown pull-right">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
				<?php echo $this->session->userdata('username'); ?>
			<span class="caret"></span>
			</button>
				<ul class="dropdown-menu">
					<li><a href="logout">Logout</a></li>
				</ul>
			</div>
		</div>
		
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
		<font face="Magnolia Script">Selamat datang di Aplikasi Data Siswa . . . </font>
	</h2>
	<hr>
	<p style ="font-size:26px;">  
	   <font face="Tw Cen MT">
			Aplikasi berbasis web ini memiliki tujuan yaitu, untuk memudahkan para penggunanya untuk melakukan
			proses pendataan siswa yang sangat rumit. <br><hr></p>
	<p 	style ="font-size:26px;">  
   <font face="Tw Cen MT">
			Pengguna hanya perlu memasukkan data siswa yang diinginkan. Selain itu pengguna juga dapat melakukan proses
			CRUD <b><i> Create Read Update Delete </i></b> terhadap data yang dipilih dan juga pengguna juga dapat melihat 
			grafik banyaknya siswa sesuai data yang dimasukkan sebelumnya.<hr></p>
	<p style ="font-size:26px;">  
	   <font face="Tw Cen MT">			
			Dengan adanya aplikasi berbasis web ini diharapkan dapat memudahkan
			penggunanya untuk melakukan proses data siswa yang rumit.
	</p><hr>		
	   </font>
	</p>
</div>
	

<div class="sideright">	
	<h2> Panduan </h2><hr>
	<p style="font-family:TW Cen MT; font-size:16pt;"> 
		Untuk pengguna yang ingin melakukan pendataan siswa, silahkan memilih 
		<i> button </i> Menu yang ada disamping <i> toogle username</i>.
		Untuk melakukan pendataan siswa maka, pilih menu <b>Datasiswa</b>.
		Untuk melihat berapa grafik siswa yang didata, dapat dilihat di menu <b>Grafikal Siswa</b>.
	Untuk melihat profil <i>Author</i> dapat dilihat di menu <b>Tentang</b>.<hr>
	</p>
</div>
	
<div id ="footer">
	<center style ="margin-top: 15px;font-weight: none;"> 
	Copyright &#174; 2017 by Alexandria Christina Natalia. All right reserved 
	</center>
</div>


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
</body>
</html>
