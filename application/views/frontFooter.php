 <a href="#" class="back-to-top">
   <i class="fa fa-chevron-up"></i>
 </a>








 <!-- JavaScript Libraries -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script src="<?php echo base_url() ?>assetss/lib/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/owlcarousel/owl.carousel.min.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/venobox/venobox.min.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/knob/jquery.knob.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/wow/wow.min.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/parallax/parallax.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/easing/easing.min.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
 <script src="<?php echo base_url() ?>assetss/lib/appear/jquery.appear.js"></script>
 <script src="<?php echo base_url() ?>assetss/lib/isotope/isotope.pkgd.min.js"></script>

 <!-- Contact Form JavaScript File -->
 <!-- <script src="contactform/contactform.js"></script> -->

 <script src="<?php echo base_url() ?>assetss/js/main.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
 <!-- Include jQuery Validator plugin -->
 <script type="text/javascript">
   $('#contact').click(function() {

     $.ajax({
       url: "<?php echo site_url('contact/jsonContact') ?>",
       type: "GET",
       dataType: "JSON",
       success: function(data) {
         var a = data.data[0]["keterangan"];
         $('#isicontact').html(a);

       }
     });
   });

   $('#about').click(function() {
     $.ajax({
       url: "<?php echo site_url('contact/jsonAbout') ?>",
       type: "GET",
       dataType: "JSON",
       success: function(data) {
         var a = data.data[0]["keterangan"];
         $('#isiabout').html(a);

       }
     });
   });
   $("#periksastatus").click(function() {

     var idpesanan = $("#cek").val();
     if (idpesanan == "") {
       $("#pesanstatus").text("* Anda belum memasukan Kode Printmu.");
     } else {
       $("#pesanstatus").text("");

       $.ajax({
         url: "<?php echo site_url('contact/JsonCekstatus/') ?>" + idpesanan,
         type: "GET",
         dataType: "JSON",
         success: function(data) {


           if (data.status == 1) {
             $('#hasil').html("<h4 class='alert alert-success'> <span class='fa fa-check'></span> Selamat, hasil printmu sudah selesai dan bisa di ambil. Terimakasih atas kepercayaan anda, Sukses selalu </h4>");

           } else if (data.status == 0) {
             $('#hasil').html("<h4 class='alert alert-warning'> <span class='fa fa-info'></span> Pesanan Printmu masih dalam proses pengerjaan, silahkan kontak petugas jika sudah melebihi waktu  </h4>");

           } else {
             $('#hasil').html("<h4 class='alert alert-danger'> <span class='fa fa-warning'></span> Kode Printmu tidak ditemukan, periksa lagi atau hubungi petugas Printmu</h4>");

           }


         }
       });
     }
   });

   $('#bantuan').click(function() {
     $.ajax({
       url: "<?php echo site_url('contact/jsonBantuanGetAll') ?>",
       type: "GET",
       dataType: "JSON",
       success: function(data) {

         var tmptmpheader = '';
         var no = 1;
         $.each(data, function(key, value) {
           //  console.log(no);
           tmptmpheader += '<div class="panel panel-default">';
           tmptmpheader += '<div class="panel-heading">' +
             '<h4 class = "check-title">  <a data-toggle = "collapse"  data-parent = "#accordion"  href = "#check' + no + '  " >' +
             '<span class="acc-icons"></span>' + value['judul'] + '</a></h4></div>';

           tmptmpheader += '<div id="check' + no + '"class="panel-collapse collapse">' +
             '<div class = "panel-body">' +
             '<p>  ' + value["keterangan"] + '</p> </div> </div>';

           tmptmpheader += '</div>';
           no += 1;
         });

         $('#isifaq').append(tmptmpheader);

       }
     });
   });

   $('#printonline').click(function() {
     $.ajax({
       url: "<?php echo site_url('contact/JsonFitur') ?>",
       type: "GET",
       dataType: "JSON",
       success: function(data) {

         var tmptmpheader = '';

         $.each(data, function(key, value) {

           tmptmpheader += '<div class ="col-md-3">';
           tmptmpheader += '<h5>' + value["nama_kategori"] + '</h5>';
           tmptmpheader += '  <ul class="list-group">';
           tmptmpheader += '<li class = "list-group-item d-flex justify-content-between align-items-center" >  Hitam  Putih  Rp.' + value['hargaBW'] + ' /lembar </li>';
           tmptmpheader += '<li class = "list-group-item d-flex justify-content-between align-items-center" >Warna Rp.' + value['hargaColor'] + ' /lembar</li>';
           tmptmpheader += '<li class = "list-group-item d-flex justify-content-between align-items-center" > Jilid Rp.' + value['hargajilid'] + ' /lembar</li>';

           tmptmpheader += ' </ul> <a href = "javascript:void(0)"  onclick="yes(' + value["idkategori"] + ')" class = "btn btn-sm btn-primary" >' +
             '<span class = "fa fa-check" > </span> Pesan </a > ';
           tmptmpheader += '</div>';


         });

         $('#fitur').html(tmptmpheader);

       }


     });
   });

   function hitung() {
     var hargaBW = $('#hargaBW').text();
     var hargaColor = $('#hargaColor').text();
     var hargajilid = $('#hargajilid').text();
     var ambil = $('#ambilsendiri').val();
     var tmp = 0;
     if (ambil == 1) {
       tmp = 2000;
     } else {
       tmp = 0;
     }

     var hb = parseInt(hargaBW);
     var hc = parseInt(hargaColor);
     var hj = parseInt(hargajilid);
     var ha = parseInt(ambil);

     var arr = $('#warna').val();
     if (arr == "" || arr == undefined) {
       arr = 0;
     }
     var arr2 = $('#hitamputih').val();
     if (arr2 == "" || arr2 == undefined) {
       arr2 = 0;
     }

     var arr3 = $('#jilid').val();
     if (arr3 == "" || arr3 == undefined) {
       arr3 = 0;
     }

     var hit1 = parseInt(arr * hc);
     var hit2 = parseInt(arr2 * hb);
     var hit3 = parseInt(arr3 * hj);

     var hasil = hit1 + hit2 + hit3 + tmp;
     if (isNaN(hasil)) {
       $('#harga').text("Rp." + parseInt(hasil).toLocaleString());
       $('#hargahidden').text(parseInt(hasil));
     } else {

       $('#harga').text("Rp." + parseInt(hasil).toLocaleString());
       $('#hargahidden').text(parseInt(hasil));
       $('#hargahidden').attr("style", "display:none");

     }




   }


   $('#ambilsendiri').on('change', function() {
     var warna = $('#warna').val();
     var hitamputih = $('#hitamputih').val();
     var jilid = $('#jilid').val();

     if (warna == "" && hitamputih == "" && jilid == "") {
       alert("Harus isi salahsatu.\n warna, hitam putih atau jilid ");


     } else {
       var aa = $('#hargahidden').text();
       var aaparse = parseInt(aa);
       var bb = $('#ambilsendiri').val();

       var tmp = 0;
       if (bb == 1) {
         tmp = 2000;
       } else {
         tmp = 0;
       }
       $('#harga').text("Rp." + parseInt(aaparse + tmp).toLocaleString());

     }

   });


   // console.log(new hasil.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(number));
   $('#formpesanan').submit(function(e) {
     e.preventDefault();

     var harga = $('#hargahidden').val();


     var warna = $('#warna').val();
     var hitamputih = $('#hitamputih').val();
     var tglambil = $('#tglambil').val();
     var jamambil = $('#jamambil').val();
     var desc = $('#desc').val();
     var idkategori = $('#idkategori').text();
     var jilid = $('#jilid').val();
     var ambilsendiri = $('#ambilsendiri').val();
     console.log(ambilsendiri);
     var keterangan = $('#desc').val();


     var hargaBW = $('#hargaBW').text();
     var hargaColor = $('#hargaColor').text();
     var hargajilid = $('#hargajilid').text();
     var fileprint = $('#fileprint').val();

     var total1 = (parseInt(warna) * parseInt(hargaColor));
     var total2 = (parseInt(hitamputih) * parseInt(hargaBW));
     var total3 = (parseInt(jilid) * parseInt(hargajilid));
     var total = parseInt(total1 + total2 + total3);
     var idorder = 1;

     if (warna == "" && hitamputih == "" && jilid == "") {
       alert("Harus isi salahsatu.\n warna, hitam putih atau jilid ");

     } else if (tglambil == "") {
       alert("Tgl ambil harus diisi");

     } else if (jamambil == "") {
       alert("Jam ambil harus diisi");
     } else if (fileprint == "") {
       alert("Anda belum Pilih File yang akan di cetak \n Excel, Pdf, Word, Gambar dll");
     } else if (keterangan == "") {
       alert("Keterangan harus di isi");
     }



     const swalWithBootstrapButtons = Swal.mixin({
       customClass: {
         confirmButton: 'btn btn-success',
         cancelButton: 'btn btn-danger'
       },
       buttonsStyling: false
     })
     swalWithBootstrapButtons.fire({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       type: 'warning',
       showCancelButton: true,
       confirmButtonText: 'Yes, delete it!',
       cancelButtonText: 'No, cancel!',
       reverseButtons: true
     }).then((result) => {
       if (result.value) {
         swalWithBootstrapButtons.fire(
           'Deleted!',
           'Your file has been deleted.',
           'success'
         )
       } else if (
         /* Read more about handling dismissals below */
         result.dismiss === Swal.DismissReason.cancel
       ) {
         swalWithBootstrapButtons.fire(
           'Cancelled',
           'Your imaginary file is safe :)',
           'error'
         )
       }
     })
     //  swal({
     //      title: "Anda yakin ? " + harga + " ",
     //      text: "Hasil cetak ini akan di antar ke tempatmu dengan biaya tambahan hanya Rp.2.000",
     //      type: "warning",
     //      showCancelButton: true,
     //      confirmButtonClass: "btn-danger",
     //      confirmButtonText: "kirim",
     //      cancelButtonText: "Ambil sendiri",
     //      closeOnConfirm: false,
     //      closeOnCancel: false
     //    },
     //    function(isConfirm) {
     //      if (isConfirm) {
     //        swal("Deleted!", "Your imaginary file has been deleted.", "success");
     //      } else {
     //        swal("Cancelled", "Your imaginary file is safe :)", "error");
     //      }
     //    });

     var data = new FormData(this);
     data.append('idorder', 1);
     data.append('tglambil', tglambil);
     data.append('jamambil', jamambil);
     data.append('idkategori', idkategori);
     data.append('qty', warna + hitamputih);
     data.append('warna', warna);
     data.append('hitamputih', hitamputih);
     data.append('jilid', jilid);
     data.append('total', total);
     data.append('keterangan', keterangan);
     //  data.append('fileprint', fileprint);
     data.append('pengiriman', ambilsendiri);


     var url = "<?php echo site_url('pesanan/create_action') ?>"

     $.ajax({
       url: url,
       type: "post",
       dataType: "json",
       data: data,
       processData: false,
       contentType: false,
       cache: false,
       async: false,
       success: function(data) {
         console.log(data);
       }
     });

   });

   function yes(e) {

     $('#myModalPrint').modal('hide');
     $('#myModalDetailPrint').modal('show');
     //  $('#myModalDetailPrint').modal('show');
     //  alert(e);
     $.ajax({
       url: "<?php echo site_url('contact/JsonKategori/') ?>" + e,
       type: "GET",
       dataType: "JSON",
       success: function(data) {
         console.log(data);
         $('#juduldetilpesan').text(" Cetak " + data[0].nama_kategori);

         $('#namapemesan').text("Noval Smith");
         $('#nohp1').text("09812389023");
         $('#nohp2').text("1982370988");

         $('#idkategori').text(data[0].idkategori);
         $('#namakategori').text(data[0].nama_kategori);
         $('#hargaBW').text(data[0].hargaBW);
         $('#hargaColor').text(data[0].hargaColor);
         $('#hargajilid').text(data[0].hargajilid);
       }

     });
   }

   $(function() {
     //----- OPEN
     $('[pd-popup-open]').on('click', function(e) {
       var targeted_popup_class = jQuery(this).attr('pd-popup-open');
       $('[pd-popup="' + targeted_popup_class + '"]').fadeIn(200);

       e.preventDefault();
     });

     //----- CLOSE
     $('[pd-popup-close]').on('click', function(e) {
       var targeted_popup_class = jQuery(this).attr('pd-popup-close');
       $('[pd-popup="' + targeted_popup_class + '"]').fadeOut(200);

       e.preventDefault();
     });
   });
 </script>





 </body>

 </html>