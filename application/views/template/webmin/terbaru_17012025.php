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
	
	   #rotasigambarid {
		  margin-left: 50px;
		   box-shadow: 1px 1px 1px rgba(0,0,0,0.8);
         -webkit-transform: rotate(-90deg);
         -moz-transform: rotate(-90deg);
         -ms-transform: rotate(-90deg);
         -o-transform: rotate(-90deg);
         transform: rotate(-90deg);
       }
	   
	    #rotasigambarid_coba {
		  margin-left: 50px;
          box-shadow: 2px 2px 2px rgba(0,0,0,0.8);
       }
	   
	   	   
	   .container2 {
			font-size: 12px;
			font-family: sans-serif;
			margin-top:5px;
				
          }
		.gambardepan{
		   width :360px ;
		   height :250px;
		  /* background:url(<?php echo site_url('assets/img/id_card/bg/depan/depan_terbaru_1.png'); ?>); */
		   background:url(<?php echo site_url('assets/img/id_card/bg/depan/depan_new1.png'); ?>);
		   position:relative;
		   background-repeat: no-repeat;
		   background-size: 360px 250px;
		  -webkit-print-color-adjust: exact;
		  		  
		}
		
	   .satu{
		   width :230px ;
		   height :200px;
		   position:relative;
		  }
		  
	     .depan_barcode{
		   background-color: red;
		   position:absolute;
		   width :250px ;
		   height :40px;
		   top:0px;
		   left:0px;
		   margin-left:85px;
		   margin-top:105px;
		    -webkit-transform: rotate(-90deg);
           -moz-transform: rotate(-90deg);
           -ms-transform: rotate(-90deg);
           -o-transform: rotate(-90deg);
           transform: rotate(-90deg);
		  }
		  
		 .depan_text1{
		   position:absolute;
		   width :230px ; 
		   height :50px;
		   top:15px;
		   left:0px;
		   margin-left:140px;
		    margin-top:90px;
		    -webkit-transform: rotate(-90deg);
           -moz-transform: rotate(-90deg);
           -ms-transform: rotate(-90deg);
           -o-transform: rotate(-90deg);
           transform: rotate(-90deg);
		   font-weight: bold;
		  }
		  
		  .depan_text1_nama {
		     font-size:12px; 
		     font-family:sans-serif;
			 width :60px ;
			 position:absolute;
			 margin-left:15px;
	       }
		   
		   .depan_text1_titik1 {
		     font-size:12px; 
		     font-family:sans-serif;
			 width :10px ;
			
			  position:absolute;
			   margin-left:80px;
			  
	       }
		   
		   .depan_text1_nama2{
			   font-size:12px; 
		     font-family:sans-serif;
			 width :150px ;
			
			  position:absolute;
			  margin-left:90px;
		   }
		  
		 .depan_text1_dept{
		   position:absolute;
		   width :230px ; 
		   height :50px;
		   top:15px;
		   left:0px;
		   margin-left:160px;
		    margin-top:90px;
		    -webkit-transform: rotate(-90deg);
           -moz-transform: rotate(-90deg);
           -ms-transform: rotate(-90deg);
           -o-transform: rotate(-90deg);
           transform: rotate(-90deg);
		   font-weight: bold;
		 }
		 
		 .depan_text1_nik{
		   position:absolute;
		   width :230px ; 
		   height :50px;
		   top:15px;
		   left:0px;
		   margin-left:180px;
		    margin-top:90px;
		    -webkit-transform: rotate(-90deg);
           -moz-transform: rotate(-90deg);
           -ms-transform: rotate(-90deg);
           -o-transform: rotate(-90deg);
           transform: rotate(-90deg);
		   font-weight: bold;
		 }
		 
		   .depan_dept {
		     font-size:12px; 
		     font-family:sans-serif;
			 width :60px ;
			 position:absolute;
			 margin-left:15px;
	       }
		   
		   .depan_titik_dept {
		     font-size:12px; 
		     font-family:sans-serif;
			 width :10px ;
			 position:absolute;
			 margin-left:80px;
			  
	       }
		   
		   .depan_text1_dept2{
			   font-size:12px; 
		     font-family:sans-serif;
			 width :150px ;
			
			  position:absolute;
			  margin-left:90px;
		   }
		  
			  
	
		.gambarbelakang{
		   background-image: url(<?php echo site_url('assets/img/id_card/bg/belakang/belakang_terbaru1.png'); ?>);
		   width :360px ;
		   height :250px;
		   background-repeat: no-repeat;
		   background-size: 360px 250px;
		  -webkit-print-color-adjust: exact;
		   position:absolute;
		   margin-left:365px;
		   margin-top:-250px;
	     }
		
		 .belakang1{
		   position:absolute;
		   width :220px ;
		   height :50px;
		   top:10px;
		   left:0px;
		   margin-left:-90px;
		   margin-top:85px;
		   -webkit-transform: rotate(90deg);
           -moz-transform: rotate(90deg);
           -ms-transform: rotate(90deg);
           -o-transform: rotate(90deg);
           transform: rotate(90deg);
		   padding: 5px 0px;
		  
		  }
		   .belakang1_alamat {
		     font-size:8px; 
		     font-family:sans-serif;
			 text-align: center;
		   }
		  
		 .qr_map{
		   position:absolute;
		   width :100px ;
		   height :100px;
		   top:0px;
		   left:0px;
		   margin-left:210px;
		   margin-top:30px;
		    -webkit-transform: rotate(90deg);
           -moz-transform: rotate(90deg);
           -ms-transform: rotate(90deg);
           -o-transform: rotate(90deg);
           transform: rotate(90deg);
		 
		  }
		  
		  .belakang2{
		     position:absolute;
		     width :220px ;
		     height :50px;
		     top:10px;
		     left:0px;
		     margin-left:30px;
		     margin-top:85px;
		     -webkit-transform: rotate(90deg);
             -moz-transform: rotate(90deg);
             -ms-transform: rotate(90deg);
             -o-transform: rotate(90deg);
             transform: rotate(90deg);
		     padding: 5px 0px;
			 font-size:10px; 
		     font-family:sans-serif;
			 text-align: left;
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
   
   <?php 
      foreach ($pecah_kode as $x => $y) {
   	  //$this->db_pop->query('SELECT karyawan_id FROM dbo.dt_karyawan_id_card WHERE karyawan_id= '. $y .' ');
	    $this->db_pop->select('*');
		//$this->db_pop->from('dbo.dt_karyawan_id_card');
		$this->db_pop->from('dbo.view_id_card');
		$this->db_pop->where('karyawan_id',$y);
	    $q = $this->db_pop->get()->result_array();
		
	?>
	
	 <?php 
	       foreach($q as $kode){
			$nama = $kode['karyawan_name'];
			$link = $kode['photo'];
			$nik = $kode['karyawan_nik'];
			//echo $link;
	 ?>
   
   <div class="container2">
     <div class="gambardepan">
	   <div class='satu'>
	      <img id="rotasigambarid" src=<?php echo site_url($link); ?> width='115px' height='120px' alt='' style='border: 2px solid grey;border-radius:50%;position: absolute; margin-top:30%; margin-left:25%;'> 
	    </div>
	   <div class='depan_barcode'>
	    asap
	   </div>
	   <div class='depan_text1'>
		 <p  class='depan_text1_nama' > NAMA </p>
		 <p class='depan_text1_titik1' > :</p>
		 <p class='depan_text1_nama2' ><?php echo strtoupper($nama);?></p>
	   </div>
	  
	    <div class='depan_text1_dept'>
		 <p class="depan_text1_nama"> Dept. </p>
		 <p class="depan_text1_titik1"> :</p>
		 <p class="depan_text1_nama2"> ......</p>
	   </div>
	   <div class='depan_text1_nik'>
		 <p class="depan_text1_nama"> NIK. </p>
		 <p class="depan_text1_titik1" > :</p>
		 <p class="depan_text1_nama2" ><?php echo strtoupper($nik);?></p>
	   </div>
	 </div>
	 
	  <div class="gambarbelakang">
	     <div class='belakang1'>
		   <p class="belakang1_alamat" style=''>JL. NANJUNG KM.3 NO.99 DESA LAGADAR KEC.MARGAASIH KAB.BANDUNG - INDONESIA Telp. (022) 6677272 Fax: (022) 6677273</p>
		 </div>
		 <div class='belakang2'>
		  <p style="margin:auto">1.Kartu pengenal ini adalah identitas dan berlaku untuk pegawai PT.POPSTAR.</p>
		  <p style="margin:auto;color:red;">This ID Card is an identity and valid only for employee PT.POPSTAR.</p>
					<br />
		   <p style="margin:auto">2. Kartu pengenal ini milik PT.POPSTAR. Jika ditemukan, mohon dikembalikan ke alamat yang tercantum dibawah ini.</p>
		   <p style="margin:auto;color:red;">This ID Card belongs to PT.POPSTAR. if found please return to the address indecated below.</p>
		  
		 </div>
		  <div class='qr_map'>
	       <img src=<?php echo site_url('./assets/img/id_card/bg/QR_POPSTAR.png'); ?>  alt='Avatar' alt='' style='width:80px;height:80px;' >
	      </div>
		
	  </div>
  </div>
  
  
  <?php
		   }
     }
   ?>

</body>
</html>

