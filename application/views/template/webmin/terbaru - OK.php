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

			margin: 0px;
			float: left;

		}
		#depanxx {
			opacity: 0.88;
			font-family: sans-serif;
			transition: 0.4s;
			border-radius: 2%;
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
		
		#depanxx {
			width: 250px;
			height: 400px;
			position: absolute;
			opacity: 0.88;
			font-family: sans-serif;

			transition: 0.4s;
			border-radius: 2%;
		}
		
		#depanxx::before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
		    background:url(<?php echo site_url('assets/img/id_card/bg/depan_new.png'); ?>);
			background-repeat: repeat-x;
			background-size: 50px 400px;
			border-radius: 2%;
			z-index: -1;
			text-align: center;
			-webkit-print-color-adjust: exact;
			background-repeat: no-repeat;
			background-size: cover;

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
		
		#id imgx{
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
		
		.table1 {
            font-family: sans-serif;
           color: #232323;
           border-collapse: collapse;
		   font-size:12px;
      }
	  
	   .table1, th, td {
            padding: 20px 20px;
		    vertical-align: text-top;	
		 }
	   
	   .depan{
           background:url(<?php echo site_url('assets/img/id_card/bg/depan_new.png'); ?>);
		   background-repeat: no-repeat;
		   background-size: 250px 450px;
		  -webkit-print-color-adjust: exact;
		 	
       }
	   .belakang{
		   background-image: url(<?php echo site_url('assets/img/id_card/bg/belakang_new2.png'); ?>);
		   background-repeat: repeat-x;
		   background-size: 250px 450px;
		  -webkit-print-color-adjust: exact;
	   }
	   
	   
	</style>
</head>
<body onload='window.print();'>
  
 <!--  <h2>ID Card <?php //echo $page_title; ?> </h2> -->
   <?php
    $this->db_pop = $this->load->database('pop',TRUE);
    $this->load->model('main');
    $kode=$_GET['kode'];
    $pecah_kode = explode(",", $kode);
  //  $nama=$_GET['nama'];
 //  $nik=$_GET['nik'];
 //  $link='./'.$_GET['link'];
  
   //<img src="./assets/img/profile/ekonomi Bulolo/dokumen/072917_Dokumen Lain_20220221-020355.jpg" class="img-fluid">
   //<img src='../assets/img/id_card/bg/bkg-2.jpg'  width='70px' height='70px' alt=''>
   ?>
   <div id="bg">
   <?php 
      foreach ($pecah_kode as $x => $y) {
   	  //$this->db_pop->query('SELECT karyawan_id FROM dbo.dt_karyawan_id_card WHERE karyawan_id= '. $y .' ');
	    $this->db_pop->select('*');
		//$this->db_pop->from('dbo.dt_karyawan_id_card');
		$this->db_pop->from('dbo.view_id_card');
		$this->db_pop->where('karyawan_id',$y);
	    $q = $this->db_pop->get()->result_array();
		
	?>
	<div style='font-size:16px;font-family:sans-serif;'>
	<br />
	 <table border="1"  height="450px" class="table1" width="50%">
	 <?php 
	       foreach($q as $kode){
			$nama = $kode['karyawan_name'];
			$link = $kode['photo'];
			$nik = $kode['karyawan_nik'];
			//echo $link;
	 ?>
		<tr>
		<td width="50%" class="depan">
		<center>
		<img src=<?php echo site_url('./assets/img/id_card/bg/logo_4.png'); ?>  alt='Avatar' alt='' >
		<br />
		<br />
		<br />
		<img src=<?php echo site_url($link); ?> width='120px' height='160px' alt='' style='border: 2px solid black;border-radius:5%;'> 
		</center>
		<div class="container">
		<br />
		<br />
		<table border="0" width="100%" style="margin-top:10%; font-size:12px; font-family:sans-serif; margin-left:0px;font-weight: bold; 	">
		 <tr >
	       <td width='50px' style='padding:5px 5px; vertical-align: left;'>Name </td>
	       <td width='3px' style='padding:5px 5px; vertical-align: left;'>: </td>
	       <td style='padding:5px 5px; vertical-align: left;'><?php echo strtoupper($nama);?></td>
	      </tr>
		   <tr >
	       <td width='50px' style='padding:5px 5px; vertical-align: left;'>Dept </td>
	       <td width='3px' style='padding:5px 5px; vertical-align: left;'>: </td>
	       <td style='padding:5px 5px; vertical-align: left;'>..................</td>
	      </tr>
		   <tr >
	       <td width='50px' style='padding:5px 5px; vertical-align: left;'>NIK </td>
	       <td width='3px' style='padding:5px 5px; vertical-align: left;'>: </td>
	       <td style='padding:5px 5px; vertical-align: left;'><?php echo strtoupper($nik);?></td>
	      </tr>
		  </table>
		</div>
		<br />
	    <br />
	     <div class="container" align="center">
	      <p style="margin:auto;font-size:10px;color:#FFF">JL. NANJUNG KM.3 NO.99 DESA LAGADAR KEC.MARGAASIH</p>
         </div>
		</td>
		
		<td  width="50%" class="belakang">
		 <div class="container">
		  <p style="margin:auto">1.Kartu pengenal ini adalah identitas dan berlaku untuk pegawai PT.POPSTAR.</p>
		  <p style="margin:auto;color:red;">This ID Card is an identity and valid only for employee PT.POPSTAR.</p>
		  <br />
		  <p style="margin:auto">2. Kartu pengenal ini milik PT.POPSTAR. Jika ditemukan, mohon dikembalikan ke alamat yang tercantum dibawah ini.</p>
		  <p style="margin:auto;color:red;">This ID Card belongs to PT.POPSTAR. if found please return to the address indecated below.</p>
		   <img src=<?php echo site_url('./assets/img/id_card/bg/QR_POPSTAR.png'); ?>  alt='Avatar' alt='' style='width:80px;height:90px;' >
		   <br />
		   <br />
		   <br />
		   <br />
		   <br />
		   <center>
		   <p style="margin-top:10px;font-size:10px;">JL. NANJUNG KM.3 NO.99 DESA LAGADAR KEC.MARGAASIH KAB.BANDUNG - INDONESIA Telp. (022) 6677272 Fax: (022) 6677273</p>
		   </center>
		 </div>
		</td>
		
		 </tr>		
			<?php
			}
             ?>			
	  </table>
	 
	
	</div>
	<?php
			// var_dump($kode['karyawan_name']);
	 
		
     }
   ?>
 
  </div>
</body>
</html>

