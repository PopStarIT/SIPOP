<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>ID Card POPSTAR </title>
   <!-- 
   $('#IDcard').css(
		 { 'background-image': 'url(' + image + ')',
		 '-webkit-print-color-adjust': 'exact', 
		 'background-repeat': 'no-repeat', 
		 'background-size': 'cover' });
	-->
   <style>
		body {
			background: #008080;
		}

		#bg {
			width: 1000px;
			height: 450px;

			margin: 60px;
			float: left;

		}

		#id {
			width: 250px;
			height: 400px;
			position: absolute;
			opacity: 0.88;
			font-family: sans-serif;

			transition: 0.4s;
			/* background-color: #FFFFFF; */
			border-radius: 2%;
		}

		#id::before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
		    background:url(<?php echo site_url('assets/img/id_card/bg/depan_new.png'); ?>);
			/*if you want to change the background image replace logo.png*/
			background-repeat: repeat-x;
			background-size: 250px 400px;
			border-radius: 2%;
			/* opacity: 0.2; */
			z-index: -1;
			text-align: center;
			-webkit-print-color-adjust: exact;
			background-repeat: no-repeat;
			background-size: cover;

		}

		.container {
			font-size: 12px;
			font-family: sans-serif;

		}
		
		.id-1 {
			transition: 0.4s;
			width: 250px;
			height: 450px;
			background: #FFFFFF;
			text-align: center;
			font-size: 16px;
			font-family: sans-serif;
			float: left;
			margin: auto;
			margin-left: 270px;
			border-radius: 2%;


		}

		.id-2 {
			transition: 0.4s;
			position: absolute;
			width: 250px;
			height: 400px;
			background-image: url(<?php echo site_url('assets/img/id_card/bg/belakang_new2.png'); ?>);
			/*if you want to change the background image replace logo.png*/
		    margin-left: 255px;
			background-size: 240px 400px;
			border-radius: 2%;
			/* opacity: 0.2; */
			z-index: -1;
			text-align: center;
			-webkit-print-color-adjust: exact;
			background-repeat: no-repeat;
			background-size: cover;
	
		}
		
		#id img{
			border-radius:5%;
			position: relative;
			width: 120px;
		}
		
		#id imgold{
			border-radius:50%;
			position: relative;
			width: 150px;
			transform: translate(-5%,-10%);
			
		}
	</style>
</head>
<body onload='window.print();'>
  
 <!--  <h2>ID Card <?php //echo $page_title; ?> </h2> -->
   <?php
  // print_r($_GET);
 //  echo 'nik= '.$_GET['nik'];
 //  echo 'link= '.$_GET['link'];
   $nama=$_GET['nama'];
   $nik=$_GET['nik'];
   $link='./'.$_GET['link'];
  
   //<img src="./assets/img/profile/ekonomi Bulolo/dokumen/072917_Dokumen Lain_20220221-020355.jpg" class="img-fluid">
   //<img src='../assets/img/id_card/bg/bkg-2.jpg'  width='70px' height='70px' alt=''>
   ?>
   <div id="bg">
   
	<div id="id" style='font-size:16px;font-family:sans-serif;'>
	<br />
	 <table border="0" width="245px">
		<tr>
		<td>
		<center>
		<img src=<?php echo site_url('./assets/img/id_card/img/logo-popstar.png'); ?>  alt='Avatar' alt='' style='width: 160px;height:30px;' >
		</center>
		</td>
		
		</tr>
	  </table>
	 
	<br />
	
	<center>
	 <?php 
	 if ($link ==''){
		 $photo='';
	 }else{
		  $photo=$link;
	 }
	  	 ?>
	<!-- <img src=<?php //echo site_url('./assets/img/id_card/img/photo/rosidi_072847_ROSIDI.JPG'); ?> height='170px' width='125px' alt='' style='border: 2px solid black;'> -->
	<img src=<?php echo site_url($photo); ?> height='150px' alt='' style='border: 2px solid black;'> 
	</center>
	<div class="container" align="center">
	 <br />
	 <table border="0" width="245px" style="margin-top:10%; font-size:14px; font-family:sans-serif;margin-left: 20px;font-weight: bold;">
	<tr >
	<td width='50px' >Name </td>
	<td width='10px' >: </td>
	<td ><?php echo strtoupper($nama);?></td>
	</tr>
	<tr >
	<td width='50px' >Dept. </td>
	<td width='10px' >: </td>
	<td >.................</td>
	</tr>
	<tr >
	<td width='50px' >NIK </td>
	<td width='10px' >: </td>
	<td ><?php echo $nik;?></td>
	</tr>
	</table>
	
    </div>
	<br />
	<br />
	 <div class="container" align="center">
	 <p style="margin:auto;font-size:10px;color:#FFF">JL. NANJUNG KM.3 NO.99 DESA LAGADAR KEC.MARGAASIH</p>
     </div>
  </div>
  <div class="id-2">
   <center>
   <!-- <img src=<?php //echo site_url('./assets/img/id_card/bg/icon.png'); ?> alt="Avatar" width="200px" height="175px"> -->
				<div class="container" align="left"  style="margin:20px;">
					<p style="margin:auto">1.Kartu pengenal ini adalah identitas dan berlaku untuk pegawai PT.POPSTAR.</p>
					<p style="margin:auto;color:red;">This ID Card is an identity and valid only for employee PT.POPSTAR.</p>
					<br />
					<p style="margin:auto">2. Kartu pengenal ini milik PT.POPSTAR. Jika ditemukan, mohon dikembalikan ke alamat yang tercantum dibawah ini.</p>
					<p style="margin:auto;color:red;">This ID Card belongs to PT.POPSTAR. if found please return to the address indecated below.</p>
			   </div>
			   <img src=<?php echo site_url('./assets/img/id_card/bg/QR_POPSTAR.png'); ?>  alt='Avatar' alt='' style='width:80px;height:90px;' >
			   <div class="container" align="center"  style="margin:20px;">
					<p style="margin-top:10px;font-size:10px;">JL. NANJUNG KM.3 NO.99 DESA LAGADAR KEC.MARGAASIH KAB.BANDUNG - INDONESIA Telp. (022) 6677272 Fax: (022) 6677273</p>
			   </div>
			</center>
  </div>
  </div>
</body>
</html>

