<!-- START PLUGINS -->
<script type="text/javascript">
	var baseurl = "<?php echo base_url() ?>";
	var full_path_template = "<?php echo BASEDIR . "assets/" . $path_template . "/" ?>";
	var plugin_path = "<?php echo BASEDIR . "assets/" . $path_template . "/js/" ?>";
	var check_submit = 0;

	let html5QrcodeScanner;
	const beepSound = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
	let isProcessing = false;
	//let isProcessing_<?php echo $methodid ?> = false; 

	function page_loading(action, message, message2) {
		action = typeof action !== 'undefined' ? action : 'show';
		message = typeof message !== 'undefined' ? message : 'Loading';
		message2 = typeof message2 !== 'undefined' ? message2 : 'Please wait...';

		if (action == 'show') {
			swal({
				title: message,
				text: message2,
				backdrop: true,
				allowOutsideClick: false,
				onOpen: () => {
					swal.showLoading();
				}
			});
		} else {
			swal.closeModal();
		}
	}

	function download_file_copy(form_id, filename, address, token_name, token_val) {
		var dialog = jQuery('<form hidden id="frmDownload' + form_id + '"   method="POST" action="' + baseurl + 'loader/download_file_copy" />')
		dialog.appendTo('body');
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": address,
			"name": 'saveAs'
		}));
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": filename,
			"name": 'filename'
		}));
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": token_val,
			"name": token_name
		}));
		$("#frmDownload" + form_id).submit();
		dialog.remove();
	}

	function download_file(form_id, filename, address, token_name, token_val) {
		var dialog = jQuery('<form hidden id="frmDownload' + form_id + '"   method="POST" action="' + baseurl + 'loader/download_file" />')
		dialog.appendTo('body');
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": address,
			"name": 'saveAs'
		}));
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": filename,
			"name": 'filename'
		}));
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": token_val,
			"name": token_name
		}));
		$("#frmDownload" + form_id).submit();
		dialog.remove();
	}

	function download_file_2(form_id, filename2, address2, token_name, token_val) {
		var dialog = jQuery('<form hidden id="frmDownload' + form_id + '"   method="POST" action="' + baseurl + 'loader/download_file" />')
		dialog.appendTo('body');
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": address2,
			"name": 'saveAs'
		}));
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": filename2,
			"name": 'filename'
		}));
		$("#frmDownload" + form_id).append($("<input>").attr({
			"value": token_val,
			"name": token_name
		}));
		$("#frmDownload" + form_id).submit();
		dialog.remove();
	}

	function show_error(action, message, message2, confirm, url) {
		//alert(message2);
		action = typeof action !== 'undefined' ? action : 'show';
		message = typeof message !== 'undefined' ? message : 'Error';
		message2 = typeof message2 !== 'undefined' ? message2 : '500 Internal Server Error';
		confirm = typeof confirm !== 'undefined' ? confirm : '-1';
		url = typeof url !== 'undefined' ? url : baseurl;

		if (action == 'show') {
			swal({
				type: 'error',
				title: message,
				html: message2,
				backdrop: true,
				allowOutsideClick: false,
				preConfirm: () => {
					if (confirm == 'redirect') {
						window.location.href = url;
					} else if (confirm != '-1') {
						setTimeout(function() {
							confirm();
						}, 100);
					}
				}
			});
		} else {
			swal.closeModal();
		}
	}

	function show_success(action, message, message2, confirm, url) {
		action = typeof action !== 'undefined' ? action : 'show';
		message = typeof message !== 'undefined' ? message : 'Error';
		message2 = typeof message2 !== 'undefined' ? message2 : '500 Internal Server Error';
		confirm = typeof confirm !== 'undefined' ? confirm : '-1';
		url = typeof url !== 'undefined' ? url : baseurl;

		if (action == 'show') {
			swal({
				type: 'success',
				title: message,
				html: message2,
				backdrop: true,
				allowOutsideClick: false,
				timer: 3000,
				timerProgressBar: true,
			}).then(function() {
				if (confirm == 'redirect') {
					window.location.href = url;
				} else if (confirm !== '-1') {
					setTimeout(function() {
						confirm();
					}, 100);
				}
			});

		} else {
			swal.closeModal();
		}
	}

	function show_info(action, message, message2, confirm, url) {
		action = typeof action !== 'undefined' ? action : 'show';
		message = typeof message !== 'undefined' ? message : 'Error';
		message2 = typeof message2 !== 'undefined' ? message2 : '500 Internal Server Error';
		confirm = typeof confirm !== 'undefined' ? confirm : '-1';
		url = typeof url !== 'undefined' ? url : baseurl;

		if (action == 'show') {
			swal({
				type: 'success',
				title: info,
				html: message2,
				backdrop: true,
				allowOutsideClick: false,
				preConfirm: () => {
					if (confirm == 'redirect') {
						window.location.href = url;
					} else if (confirm !== '-1') {
						setTimeout(function() {
							confirm();
						}, 100);
					}
				}
			});
		} else {
			swal.closeModal();
		}
	}

	function confirm() {

	}
</script>

<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/plugins-jquery.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/calendar.init.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/sparkline.init.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/datepicker.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/sweetalert2.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/toastr.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/validation.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/lobilist.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/nicescroll/jquery.nicescroll.js"></script>

<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>js/custom.js"></script>

<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/datatables/js/jquery.dataTables.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/datatables/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/datatables/js/dataTables.select.min.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/datatables/js/dataTables.rowsGroup.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/bootstrap-select/js/ajax-bootstrap-select.min.js"></script>

<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/select2/js/select2.full.min.js"></script>

<script src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>plugins/jqgrid/js/jquery.jqgrid.min.js"></script>
<script src="<?php echo BASEDIR . "assets/" ?>js/html5-qrcode.min.js"></script>

<!-- <script src="<?php //echo BASEDIR . "assets/" . $path_template ."/" 
					?>plugins/jqgrid/js/js_dynamicLink.js"></script> -->

<!-- SEMENTARA DIMATIKAN DAHULU UNTUK CHART-->
<!--<script src="<?php //echo BASEDIR . "assets/" . $path_template ."/" 
					?>js/chart/Chart.js"></script> -->



<script type="text/javascript">
	function tab_auto_resize() {
		var window_height = $(window).height();
		var wrapper_height = $('.wrapper').height();
		var navbar_height = $('.main-navbar').height();
		var maintab_height = $('.maintab').height();
		var newsticker_main = $('.newsticker-main').height();
		// var test2 = $('.heding-content').height();
		// var test3 = $('.x-navigation-horizontal').height();

		$('.tab_scrollbar').css('max-height', (window_height - navbar_height - maintab_height - newsticker_main) + 'px');
		$('.tab_scrollbar').css('min-height', (window_height - navbar_height - maintab_height - newsticker_main) + 'px');

		$('.tab_scrollbar').getNiceScroll().resize();
	}

	$('.form_date').datepicker({
		startView: 2,
		format: 'yyyy-mm-dd',
		autoclose: true
	});

	//Additional Validator
	$.validator.addMethod("alphanumeric", function(value, element) {
		return this.optional(element) || /^[a-z0-9\-\_]+$/i.test(value);
	}, "must contain only letters, numbers");

	$('.select2').selectpicker();

	(function($) {
		$.fn.serializeFormJSON = function() {

			var o = {};
			var a = this.serializeArray();
			$.each(a, function() {
				if (o[this.name]) {
					if (!o[this.name].push) {
						o[this.name] = [o[this.name]];
					}
					o[this.name].push(this.value || '');
				} else {
					o[this.name] = this.value || '';
				}
			});
			return o;
		};
	})(jQuery);

	$(document).ready(function() {
		tab_auto_resize();
		//alert(baseurl +'home/dashboard');
		//console.log(baseurl + 'home/dashboard');
		$.ajax({
			url: baseurl + 'home/dashboard',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
			},
			dataType: 'html',
			method: 'post',
			success: function(data) {
				$('#dashboard').html(data);
				// alert(data);
			},
			error: function(xhr, error) {
				show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
				$('.maintab li:nth-child(' + id + ') a').remove();
			}
		});
	});

	function logout() {
		swal({
			title: "Confirm sign out?",
			type: "question",
			dangerMode: true,
			showCancelButton: !0,
			confirmButtonClass: "btn btn-danger m-1",
			cancelButtonClass: "btn btn-secondary m-1",
			confirmButtonText: "Confirm",
			cancelButtonText: "No",
			backdrop: true,
			allowOutsideClick: false,
		}).then((result) => {
			if (result.value) {

				page_loading("show");
				window.location.href = baseurl + 'users/logout';

			} else if (
				// Read more about handling dismissals
				result.dismiss === swal.DismissReason.cancel
			) {
				swal.closeModal();
			}
		});
	}

	$(".maintab").on("click", "a", function(e) {
		e.preventDefault();
		if ($(this).hasClass('close-all-tabs')) {
			swal({
				title: "Close All Tabs ?",
				type: "question",
				dangerMode: true,
				showCancelButton: !0,
				confirmButtonClass: "btn btn-danger m-1",
				cancelButtonClass: "btn btn-secondary m-1",
				confirmButtonText: "Confirm",
				cancelButtonText: "No",
				backdrop: true,
				allowOutsideClick: false,
			}).then((result) => {
				if (result.value) {
					close_all_tabs();
				} else if (result.dismiss === swal.DismissReason.cancel) {
					swal.closeModal();
				}
			});
		} else {
			$(this).tab('show');
		}

		setTimeout(function() {
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 100);
	}).on("click", "span", function() {
		var anchor = $(this).siblings('a');
		$(anchor.attr('href')).remove();
		$(this).parent().remove();
		$(".maintab li").children('a').first().click();

		setTimeout(function() {
			tab_length = $(".maintab").children().length;
			if (tab_length < 3) {
				$('.close-all-tabs').hide();
			}
			$('.tab_scrollbar').getNiceScroll().resize();
		}, 1);
	});

	function preview_dashboard_<?php echo $methodid ?>() {
		var win = window.open(baseurl + '<?php echo $class_uri ?>/loaddata_dasboard?kode=' + kode, '_blank');
		win.focus();
	}

	// function link(methodid,title,link,icon){ 
	function add_tab(methodid, title, link, icon) {
		var id = $(".maintab").children().length;
		var tab_length = id
		var tabId = 'tab_' + methodid;
		var new_tab = 0;
		var i = 1;
		//alert(methodid);
		//console.log(methodid);
		while (tab_length > 0) {
			if ($('.maintab li:nth-child(' + i + ') a').hasClass(tabId)) {
				new_tab = 0;
				break;
			} else {
				new_tab = 1;
			}

			i++;
			tab_length--;
		}
		//alert(baseurl+link);
		//console.log(baseurl+link);
		//console.log(tabId);
		if (new_tab == 0) {
			setTimeout(function() {
				$('.' + tabId).click()
			}, 1);
		} else {
			$('.close-all-tabs').closest('li').before('<li class="nav-item"><a class="nav-link ' + tabId + '" href="#tab_' + methodid + '"><i class="' + icon + '"></i>' + title + '</a> <span> <i class="fa fa-window-close" style="color:red !important"></i> </span></li>');
			//console.log($("#" + tabId).length);
			if ($("#" + tabId).length == 0) {
				$('.tab-main-content').append('<div class="tab_custom_ecc tab-pane" id="' + tabId + '"><div style="text-align:center"><img src="<?php echo BASEDIR . "assets/" . $path_template . "/" ?>images/pre-loader/loader-01.svg" alt=""></div></div>');
				tab_auto_resize();
				//console.log(baseurl + link);
				$.ajax({
					url: baseurl + link,
					data: {
						'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					},
					dataType: 'html',
					method: 'post',
					success: function(data) {
						//	 alert(data);
						// console.log(data);
						$('#' + tabId).html(data);
						setTimeout(function() {
							$('.tab_scrollbar').getNiceScroll().resize();
						}, 1000);
						// alert(data);
					},
					error: function(xhr, error) {
						show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
						$('.maintab li:nth-child(' + id + ') a').remove();
						$('.maintab li:nth-child(1) a').click();
					}
				});
			} else {
				$.ajax({
					url: baseurl + link,
					data: {
						'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					},
					dataType: 'html',
					method: 'post',
					success: function(data) {
						$('#' + tabId).html(data);
						setTimeout(function() {
							$('.tab_scrollbar').getNiceScroll().resize();
						}, 1000);
						// alert(data);
					},
					error: function(xhr, error) {
						show_error("show", xhr.status.toString() + ' ' + xhr.statusText, 'Please try again');
						$('.maintab li:nth-child(' + id + ') a').remove();
						$('.maintab li:nth-child(1) a').click();
					}
				});
			}

			// ('#'+tabId).html();
			setTimeout(function() {
				$('.maintab li:nth-child(' + id + ') a').click()
			}, 1);
			$('.close-all-tabs').show();
		}


		$('.wrapper').removeClass("slide-menu");

	}

	function close_all_tabs() {
		var tab_length = $(".maintab").children().length;
		var i = 1;

		while (tab_length > 0) {
			if ($('.maintab li:nth-child(' + i + ') a').hasClass('dashboard')) {

			} else if ($('.maintab li:nth-child(' + i + ') a').hasClass('close-all-tabs')) {

			} else {
				$('.maintab li:nth-child(' + i + ') a').remove();
				$('.maintab li:nth-child(1) a').click();
				$('.close-all-tabs').hide();
			}

			i++;
			tab_length--;
		}
	}

	function getnexttransno(app_trans_id, text_input_id) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no',
				app_trans_id: app_trans_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});
	}

	function getnexttransno_item_transfer(app_trans_id, text_input_id) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no_item_transfer',
				app_trans_id: app_trans_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});
	}

	function getnexttransno_delivery(app_trans_id, text_input_id, custom_type_id) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no_delivery',
				custom_type_id: custom_type_id,
				app_trans_id: app_trans_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});
	}

	function getnexttransno_sipop(app_trans_id, text_input_id) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no_SIPOP',
				app_trans_id: app_trans_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});
	}

	function getnexttransno_GRN_sipop(app_trans_id, text_input_id, template) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no_GRN_SIPOP',
				app_trans_id: app_trans_id,
				template: template
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});
	}

	function getnextno_good_receive(type_dokumen, text_input_id, text_input_id2, text_input_id3, text_input_id4) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_good_receive',
				type_dokumen: type_dokumen
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				//$("#" + text_input_id).val(data);
				//console.log(data);
				$("#" + text_input_id).val(data.no);
				$("#" + text_input_id2).val(data.app_trans_id);
				$("#" + text_input_id3).val(data.app_trans_no);
				$("#" + text_input_id4).val(data.app_trans_no_ecc);
				//$("#form_<?php echo $methodid ?>_app_trans_no").val(data.app_trans_no);
				//$("#form_<?php echo $methodid ?>_app_trans_id").val(data.app_trans_id);
				//$('#form_<?php echo $methodid ?>_grn_id').val('');
				page_loading("hide");
			}
		});
	}

	function getnextno_txt(type_dokumen, text_input_id) {

		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no_txt_acc',
				type_dokumen: type_dokumen
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});

	}

	function getnexttransno_fabric(app_trans_id, text_input_id) {
		$.ajax({
			url: baseurl + 'loader',
			data: {
				'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>',
				param: 'get_app_trans_no_SIPOP_fabric',
				app_trans_id: app_trans_id
			},
			dataType: 'json',
			method: 'post',
			success: function(data) {
				$("#" + text_input_id).val(data);
				page_loading("hide");
			}
		});
	}

	function decimalPlaces(num) {
		var match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
		if (!match) {
			return 0;
		}
		return Math.max(
			0,
			// Number of digits right of decimal point.
			(match[1] ? match[1].length : 0)
			// Adjust for scientific notation.
			-
			(match[2] ? +match[2] : 0));
	}

	function set_decimalPlaces(num, digit) {
		digit = typeof digit !== 'undefined' ? digit : 0;
		num = parseFloat(num);
		decimal_digit = decimalPlaces(num);
		// alert(decimal_digit);
		if (digit == 0) {
			if (decimal_digit > 12) {
				return num.toFixed(8);
			} else {
				return num.toFixed(decimal_digit);
			}
		} else {
			return num.toFixed(digit);
		}

	}

	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	$.extend($.fn.fmatter, {
		formatOperations_keluarga: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_keluarga_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_keluarga_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_dokumen: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_dokumen_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_dokumen_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button> <button class="btn btn-xs btn-success" onclick="javascript:preview_dokumen_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-search"></i> Preview</button> <button class="btn btn-xs btn-info" onclick="javascript:download_dokumen_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-download"></i> Download</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsReturnMaterialDetail: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn btn-outline-success" onclick="javascript:submit_req_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-check"></i>Submit</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsDeleteRFT: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn btn-outline-danger" onclick="javascript:delete_rft_' + rowObject.methodid + '_rft_1(' + rowObject.r1 + ')"><i class="fa fa-trash"></i>Delete</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsDeleteDefect: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn btn-outline-danger" onclick="javascript:delete_defect_' + rowObject.methodid + '_defect_1(' + rowObject.r1 + ')"><i class="fa fa-trash"></i>Delete</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsDeleteReject: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn btn-outline-danger" onclick="javascript:delete_reject_' + rowObject.methodid + '_reject_1(' + rowObject.r1 + ')"><i class="fa fa-trash"></i>Delete</button>';
		}
	});
	// $.extend($.fn.fmatter, {
	// 	formatOperationsReturnMaterialDetail: function(cellvalue, options, rowObject) {
	// 		return '<button class="btn btn-xs btn btn-outline-warning" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-arrow-left"></i>Return</button><button class="btn btn-xs btn btn-outline-success" onclick="javascript:submit_req_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-check"></i>Submit</button>';
	// 	}
	// });

	$.extend($.fn.fmatter, {
		formatOperations_po_sipop_awal: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button> <button class="btn btn-xs btn-warning" onclick="javascript:view_detail_po_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-eye"></i> Detail</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_po_sipop: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_fabric_supply_awal: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:add_supply_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Supply</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_fabric_supply: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:available_stock_' + rowObject.methodid + '(' + rowObject.r10 + ')"><i class="fa fa-pencil"></i>Available Stock</button> <button class="btn btn-xs btn-success" onclick="javascript:add_supply_' + rowObject.methodid + '(' + rowObject.r1 + ',' + rowObject.r10 + ')"><i class="fa fa-pencil"></i> Supply</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_subcon_out_supply: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:add_supply_' + rowObject.methodid + '(' + rowObject.r1 + ',' + rowObject.r10 + ')"><i class="fa fa-pencil"></i> Supply</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_fabric_supply_transfer: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_supply_transfer_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>&nbsp;<button class="btn btn-xs btn-primary" onclick="javascript:cetak_fabric_transfer_supply_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Cetak</button>';
		}
	});
	
	$.extend($.fn.fmatter, {
		formatOperations_supply_transfer: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_supply_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_supply: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_supply_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Cancel</button>&nbsp;<button class="btn btn-xs btn-primary" onclick="javascript:cetak_supply_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Cetak</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_po_rincian: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_rincian_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_rincian' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});
	//

	$.extend($.fn.fmatter, {
		formatOperationsIsiChecklist: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-check"></i> Isi Checklist</button>';
		}
	});












	// $.extend($.fn.fmatter, {
	// 	formatOperationsShow: function(cellvalue, options, rowObject) {
	// 		return '<button class="btn btn-xs btn-info" onclick="javascript:show_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-maximize"></i> Show</button>';
	// 	}
	// });














	$.extend($.fn.fmatter, {
		formatOperations_custom_document: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_document_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_document_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_shipment_detail: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-warning" onclick="javascript:view_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-eye"></i> Detail</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_list_receive: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:receive_list_' + rowObject.methodid + '(' + rowObject.r24 + ')"><i class="fa fa-sign-in"></i> Receive</button>&nbsp;<button class="btn btn-xs btn-info" onclick="javascript:edit_receive_list_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button>&nbsp;<button class="btn btn-xs btn-warning" onclick="javascript:cetak_barcode_receive_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Barcode</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperations_list_receive_other: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:receive_list_other_' + rowObject.methodid + '_other_list(' + rowObject.r1 + ')"><i class="fa fa-sign-in"></i> Receive</button>';
		}
	});

	//=== tampilan yang lama karena ada tombol untuk memasukan nilai barcode ==========
	//$.extend($.fn.fmatter, {
	//	formatOperations_list_receive: function(cellvalue, options, rowObject) {
	//		return '<button class="btn btn-xs btn-success" onclick="javascript:receive_list_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-sign-in"></i> Receive</button>&nbsp;<button class="btn btn-xs btn-warning" onclick="javascript:cetak_barcode_receive_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Barcode</button>&nbsp<button class="btn btn-xs btn-info" onclick="javascript:insert_barcode_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-barcode"></i>Insert</button>';
	//	}
	//});

	$.extend($.fn.fmatter, {
		formatOperations_temp_fabric_receive: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:temp_receive_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Receive</button> <button class="btn btn-xs btn-warning" onclick="javascript:edit_temp_scan_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:temp_delete_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_list_receive_gudang: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:refresh_row_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-refresh"></i> Refresh </button>  <button class="btn btn-xs btn-success" onclick="javascript:Update_receive_warehouse_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-save"></i> Update </button>  <button class="btn btn-xs btn-danger" onclick="javascript:cancel_receive_scan_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-ban"></i> Cancel</button>';

		}
	});
	$.extend($.fn.fmatter, {
		formatOperations_list_receive_gudang_other: function(cellvalue, options, rowObject) {
			return ' <button class="btn btn-xs btn-success" onclick="javascript:Update_receive_warehouse_other_' + rowObject.methodid + '_other_receive_scan(' + rowObject.r1 + ')"><i class="fa fa-save"></i> Update</button>  <button class="btn btn-xs btn-danger" onclick="javascript:cancel_receive_scan_other_' + rowObject.methodid + '_other_receive_scan(' + rowObject.r1 + ')"><i class="fa fa-ban"></i> Cancel</button>&nbsp;<button class="btn btn-xs btn-warning" onclick="javascript:cetak_barcode_receive_other_' + rowObject.methodid + '_other_receive_scan(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Barcode</button>';

		}
	});







	$.extend($.fn.fmatter, {
		formatOperations_return_barcode: function(cellvalue, options, rowObject) {
			return ' <button class="btn btn-xs btn-warning" onclick="javascript:delete_' + rowObject.methodid + '_return(' + rowObject.r1 + ')"><i class="fa fa-times"></i>Incorrect Request</button> <button class="btn btn-xs btn-info" onclick="javascript:return_barcode_' + rowObject.methodid + '_return(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Cetak Barcode</button>';

		}
	});
	$.extend($.fn.fmatter, {
		formatOperations_disposisi_material: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-primary" onclick="javascript:add_disposisi_' + rowObject.methodid + '_return(' + rowObject.r1 + ')"><i class="fa fa-plus"></i>Add Disposisi</button>';

		}
	});
	$.extend($.fn.fmatter, {
		formatOperations_disposisi_material_action: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-warning" onclick="javascript:edit_disposisi_' + rowObject.methodid + '_disposisi(' + rowObject.r1 + ')"><i class="fa fa-plus"></i>Edit</button><button class="btn btn-xs btn-danger" onclick="javascript:delete_disposisi_' + rowObject.methodid + '_disposisi(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i>Delete</button>';

		}
	});





	$.extend($.fn.fmatter, {
		formatOperations_location_barcode: function(cellvalue, options, rowObject) {
			// alert('masuk');
			return '<button class="btn btn-xs btn-info" onclick="javascript:location_barcode_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Cetak Barcode</button>';

		}
	});





	$.extend($.fn.fmatter, {
		formatOperations_detil_excel: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_excel_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_upload_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>&nbsp;<button class="btn btn-xs btn-warning" onclick="javascript:cetak_barcode_shipment_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-print"></i>Barcode</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_tax: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-info" onclick="javascript:set_tax_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-sticky-note"></i> Set Tax</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_gl: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '_gl(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '_gl(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations2: function(cellvalue, options, rowObject) {
			if (rowObject.rh_id == '' || rowObject.rh_id == '-1') {
				return '<button class="btn btn-xs btn-success" onclick="javascript:add_list_' + rowObject.methodid + '(\'\')"><i class="fa fa-plus"></i> Add</button>';
			} else {
				return '<button class="btn btn-xs btn-info" onclick="javascript:add_list_' + rowObject.methodid + '(' + rowObject.rh_id + ')"><i class="fa fa-pencil"></i> Update</button> <button class="btn btn-xs btn-danger" onclick="javascript:cancel_detail_' + rowObject.methodid + '()"><i class="fa fa-back"></i> Cancel</button>';
			}
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_sales_performa: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:save_sales_performa_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-save"></i>Add</button> <button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperations_trims: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_trims_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_trims_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});


	//dai haris
	$.extend($.fn.fmatter, {
		formatImage: function(cellvalue, options, rowObject) {
			var imagePath = './assets/img/pattern/' + cellvalue; // Sesuaikan dengan path gambar
			return '<img src="' + imagePath + '" alt="Image" style="width:100px; height:auto;"/>';
		}
	});
	$.extend($.fn.fmatter, {
		formatImageItassets: function(cellvalue, options, rowObject) {
			if (cellvalue) {
				var imagePath = './assets/img/it_assets/' + cellvalue; // Path ke file gambar
				return '<a href="' + imagePath + '" target="_blank" alt="image is another location" class="image-icon" title="Preview Image">' +
					'<i class="fa fa-picture-o" style="font-size: 24px; color: green;"></i></a>'; // Icon gambar
			}
			return ''; // Jika tidak ada file, kembalikan string kosong
		}
	});
	$.extend($.fn.fmatter, {
		formatImageCorrectDefect: function(cellvalue, options, rowObject) {
			var imagePath = './assets/img/task_assignment_detail_defect/' + cellvalue;
			return '<img src="' + imagePath + '" alt="Image" style="width:100px; height:auto;"/>';
		}
	});

	// Kode di atas sudah lengkap dan mengikuti pola yang sama dengan PDF formatter
	// Tidak perlu fungsi tambahan karena menggunakan target="_blank" pada link langsung
	$.extend($.fn.fmatter, {
		formatFileItassets: function(cellvalue, options, rowObject) {
			var imagePath = './assets/img/it_assets/' + cellvalue; // Sesuaikan dengan path gambar
			return '<embed src="' + imagePath + '" alt="Image" style="width:100px; height:auto;"/>';
		}
	});
	$.extend($.fn.fmatter, {
		formatImageItassetsInvoice: function(cellvalue, options, rowObject) {
			if (cellvalue) {
				var filePath = './assets/img/it_assets/' + cellvalue; // Path ke file PDF
				return '<a href="' + filePath + '" target="_blank" class="pdf-icon" title="Preview PDF">' +
					'<i class="fa fa-file-pdf-o" style="font-size: 24px; color: red;"></i></a>'; // Ikon PDF
			}
			return ''; // Jika tidak ada file, kembalikan string kosong
		}
	});
	$.extend($.fn.fmatter, {
		formatImagedefect1: function(cellvalue, options, rowObject) {
			if (cellvalue) {
				var filePath = './assets/img/task_assignment_detail_defect/' + cellvalue; // Path ke file PDF
				return '<a href="' + filePath + '" target="_blank" class="pdf-icon" title="Preview PDF">' +
					'<img src="' + filePath + '" alt="Image" style="width:100px; height:auto;"/></a>'; // Ikon PDF
			}
			return ''; // Jika tidak ada file, kembalikan string kosong
		}
	});
	$.extend($.fn.fmatter, {
		formatImagedefect2: function(cellvalue, options, rowObject) {
			if (cellvalue) {
				var filePath = './assets/img/task_assignment_detail_defect/' + cellvalue; // Path ke file PDF
				return '<a href="' + filePath + '" target="_blank" class="pdf-icon" title="Preview PDF">' +
					'<img src="' + filePath + '" alt="Image" style="width:100px; height:auto;"/></a>'; // Ikon PDF
			}
			return ''; // Jika tidak ada file, kembalikan string kosong
		}
	});


	//dari haris
	$.extend($.fn.fmatter, {
		formatOperationsPicture: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_picture_' + rowObject.methodid + '_picture(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_picture_' + rowObject.methodid + '_picture(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});



	$.extend($.fn.fmatter, {
		formatOperationsItAssets: function(cellvalue, options, rowObject) {
			var buttons = '';

			// Tombol Edit
			buttons += '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_' + rowObject.methodid + '_detail(' + rowObject.r1 + ')">' +
				'<i class="fa fa-pencil"></i> Edit</button> ';

			// Tombol Keluar
			buttons += '<button class="btn btn-xs btn-warning" onclick="javascript:detail_out_' + rowObject.methodid + '_out(' + rowObject.r1 + ')">' +
				'<i class="fa fa-sign-out"></i> Keluar</button> ';

			// Tombol Delete
			buttons += '<button class="btn btn-xs btn-danger" onclick="javascript:delete_detail_' + rowObject.methodid + '_detail(' + rowObject.r1 + ')">' +
				'<i class="fa fa-trash-o"></i> Delete</button> ';

			// Tombol Print Serial Number (Barcode)
			buttons += '<button class="btn btn-xs btn-success" onclick="javascript:print_detail_' + rowObject.methodid + '_detail(\'' + rowObject.r3 + '\')" title="Print Barcode">' +
				'<i class="fa fa-print"></i> Print Serial</button> ';

			// Tombol Download Barcode (opsional)
			buttons += '<button class="btn btn-xs btn-primary" onclick="javascript:download_barcode_' + rowObject.methodid + '_detail(\'' + rowObject.r3 + '\')" title="Download Barcode">' +
				'<i class="fa fa-download"></i> Download</button>';

			return buttons;
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsItAssetsHeader: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_header_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button> <br> <button class="btn btn-xs btn-success mt-3" style="margin-top:2px;" onclick="javascript:tambah_persediaan_' + rowObject.methodid + '_detail(' + rowObject.r1 + ')"><i class="fa fa-plus"></i>Persediaan</button> ';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperationsItAssetsOut: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_detail_out_' + rowObject.methodid + '_out(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> ' +
				'<button class="btn btn-xs btn-success" onclick="javascript:return_item_' + rowObject.methodid + '_out(' + rowObject.r1 + ')"><i class="fa fa-undo"></i> Return</button> ' +

				'<button class="btn btn-xs btn-warning" onclick="javascript:bug_fix_' + rowObject.methodid + '_out(' + rowObject.r1 + ')"><i class="fa fa-trash	"></i> Item Bug Fix</button>  ';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperationsItAssetsTags: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-success" onclick="javascript:print_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-download"></i> Print</button> ';
		}
	});


	$.extend($.fn.fmatter, {
		formatOperationsMasterLine: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-outline-info" onclick="javascript:openShiftModal(' + rowObject.r1 + ', ' + rowObject.methodid + ')"><i class="fa fa-clock-o"></i> Shift</button>';
		}
	});


	$.extend($.fn.fmatter, {
		formatOperationsTaskAssignment: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-warning" onclick="javascript:edit_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-play"></i> Execute</button> ';
		}
	});

	$.extend($.fn.fmatter, {
		formatOperationsTaskAssignmentCorrectRft: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_' + rowObject.methodid + '(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsTaskAssignmentCorrectDefect: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_defect_' + rowObject.methodid + '_defect(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_defect_' + rowObject.methodid + '_defect(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});
	$.extend($.fn.fmatter, {
		formatOperationsTaskAssignmentCorrectReject: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_reject_' + rowObject.methodid + '_reject(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_reject_' + rowObject.methodid + '_reject(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});
	//dari haris
	$.extend($.fn.fmatter, {
		formatOperationsItem: function(cellvalue, options, rowObject) {
			return '<button class="btn btn-xs btn-info" onclick="javascript:edit_item_' + rowObject.methodid + '_item(' + rowObject.r1 + ')"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-xs btn-danger" onclick="javascript:delete_item_' + rowObject.methodid + '_item(' + rowObject.r1 + ')"><i class="fa fa-trash-o"></i> Delete</button>';
		}
	});



	$.extend($.fn.fmatter, {
		formatOperations_select: function(cellvalue, options, rowObject) {
			return '<select><option value="FE"> FedEx </option><option value="IN"> InTime </option><option value="TN"> TNT </option></select>';
		}
	});

	$.extend($.fn.fmatter, {
		format_row_supply: function(cellvalue, options, rowObject) {
			// const nilai=$('#form_<?php echo $methodid ?>_supply_bc_date').val();
			const date = $('#form_' + rowObject.methodid + '_supply_bc_date').val();
			if (cellvalue >= date) {
				var color = "Red";
			}
			// var color = "red";
			var cellHtml = "<span style='color:" + color + "' originalValue='" + cellvalue + "'>" + cellvalue + "</span>";
			return cellHtml;
		}
	});

	$.extend($.fn.fmatter, {
		format_supply_transfer: function(cellvalue, options, rowObject) {

			const date = $('#form_' + rowObject.methodid + '_supply_work_order_transfer_date').val();;
			if (cellvalue >= date) {
				var color = "Red";
			}
			// var color = "red";
			var cellHtml = "<span style='color:" + color + "' originalValue='" + cellvalue + "'>" + cellvalue + "</span>";
			return cellHtml;
		}
	});

	// function fontColorFormat(cellvalue, options, rowObject) {
	//     var color = "green";
	//	 if (cellvalue == "Terlambat"){
	//		  var color = "Red";
	//	 }
	//				 
	//     var cellHtml = "<span style='color:" + color + "' originalValue='" + cellvalue + "'>" + cellvalue + "</span>";
	//     return cellHtml;
	// }

	$.extend($.fn.fmatter, {
		formatNumerics: function(cellvalue, options, rowObject) {
			cellvalue = typeof cellvalue !== 'undefined' ? cellvalue : '0.00';
			if (isNumeric(cellvalue)) {
				var values = cellvalue;
				var nameArr = values.toString().split('.');
				var number1 = nameArr[0];
				var number2 = nameArr[1];
				var number1 = numberWithCommas(number1);

				if (typeof number2 !== 'undefined') {
					var number = number1 + '.' + number2;
				} else {
					var number = number1;
				}

				return number;
			} else {
				return cellvalue;
			}
		}
	});

	// $.jgrid.extend({
	// setColWidth: function (iCol, newWidth, adjustGridWidth) {
	// alert(iCol);
	// return this.each(function () {
	// var $self = $(this), grid = this.grid, p = this.p, colName, colModel = p.colModel, i, nCol;
	// if (typeof iCol === "string") {
	// // the first parametrer is column name instead of index
	// colName = iCol;
	// for (i = 0, nCol = colModel.length; i < nCol; i++) {
	// if (colModel[i].name === colName) {
	// iCol = i;
	// break;
	// }
	// }
	// if (i >= nCol) {
	// return; // error: non-existing column name specified as the first parameter
	// }
	// } else if (typeof iCol !== "number") {
	// return; // error: wrong parameters
	// }
	// grid.resizing = { idx: iCol };
	// grid.headers[iCol].newWidth = newWidth;
	// grid.newWidth = p.tblwidth + newWidth - grid.headers[iCol].width;
	// grid.dragEnd();   // adjust column width
	// if (adjustGridWidth !== false) {
	// $self.jqGrid("setGridWidth", grid.newWidth, false); // adjust grid width too
	// }
	// });
	// }
	// });

	// $(window).bind("resize", function () {
	// var containerWidth = $grid.closest(".container-fluid").width(),
	// p = $grid.jqGrid("getGridParam"),
	// cm = p.colModel[p.iColByName.ComboDuration]; //tblwidth
	// $grid.jqGrid("setGridWidth", containerWidth);
	// $grid.jqGrid("setColWidth", "ComboDuration", p.width - p.tblwidth + cm.width);
	// }).triggerHandler("resize");

	$.extend(
		$.jgrid.search, {
			multipleSearch: true,
			multipleGroup: true,
			recreateFilter: true,
			overlay: 0
		}
	);

	function isNumeric(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}

	function isObject(value) {
		return value && typeof value === 'object' && value.constructor === Object;
	}

	function unwrap_cell_value(text) {
		text = typeof text !== 'undefined' ? text : '';
		if (text.substring(0, 25) == '<span class="mywrapping">') {
			var length = text.length;
			text = text.substring(25, length);
			length = text.length;
			text = text.substring(0, length - 7);
		}

		return text;
	}

	function removeTags(str) {
		if ((str === null) || (str === ''))
			return false;
		else
			str = str.toString();

		// Regular expression to identify HTML tags in
		// the input string. Replacing the identified
		// HTML tag with a null string.
		return str.replace(/(<([^>]+)>)/ig, '');
	}
</script>
<?php
if (isset($load_js)) {
	if (is_array($load_js)) {
		foreach ($load_js as $dt_js) {
			if (substr($dt_js, 0, 8) == 'https://') {
				echo "<script src='" . $dt_js . "'></script>";
			} elseif (substr($dt_js, 0, 7) == 'http://') {
				echo "<script src='" . $dt_js . "'></script>";
			} else {
				$this->load->view('javascript/' . $dt_js);
			}
		}
	} else {
		if (substr($load_js, 0, 8) == 'https://') {
			echo "<script src='" . $load_js . "'></script>";
		} elseif (substr($load_js, 0, 7) == 'http://') {
			echo "<script src='" . $load_js . "'></script>";
		} else {
			$this->load->view('javascript/' . $load_js);
		}
	}
}
?>