<?php $this->load->view($path_template.'/library/javascript/dashboard_table2'); ?>
<script type="text/javascript">
// Fungsi resize yang lebih kuat
 function forceResizeGrid() {
    var $grid = $("#tabel_<?php $methodid ?>");
    // Ambil lebar dari div col-12 atau container
    var parentWidth = $grid.closest(".col-12").width() || $(".container-fluid").width();
    
    if (parentWidth) {
        $grid.jqGrid('setGridWidth', parentWidth, true);
    }
  }

       // Jalankan saat resize window
       $(window).on('resize', forceResizeGrid);
            // KHUSUS TABLET: Jalankan saat orientasi berubah (Portrait <-> Landscape)
			   
		   
          $(window).on("orientationchange", function() {
              setTimeout(forceResizeGrid, 200); // Beri jeda 200ms agar browser selesai render
           });
            // Jalankan saat pertama kali load
       $(document).ready(function() {
           forceResizeGrid();
       });

//function forceResizeGrid() {
//    var $grid = $("#tabel_<?php $methodid ?>");
//    var parentWidth = $grid.closest(".col-12").width() || $(".container-fluid").width();
//    
//    if (parentWidth) {
//        // Parameter kedua 'true' akan memaksa pager ikut menyusut
//        $grid.jqGrid('setGridWidth', parentWidth, true);
//    }
//}
</script>