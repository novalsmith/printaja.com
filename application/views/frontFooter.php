 <a href="#" class="back-to-top">
   <i class="fa fa-chevron-up"></i>
 </a>








 <!-- JavaScript Libraries -->
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


   $('#formpesanan').submit(function(e) {
     e.preventDefault();
     var warna = $('#warna').val();
     var hitamputih = $('#hitamputih').val();
     var tglambil = $('#tglambil').val();
     var jamambil = $('#jamambil').val();
     var desc = $('#desc').val();
     var idkategori = $('#idkategori').text();
     var jilid = $('#jilid').val();
     var ambilsendiri = $('#ambilsendiri').val();
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
     console.log(warna);
     console.log(hitamputih);
     console.log(tglambil);
     console.log(jamambil);
     console.log(desc);
     console.log(idkategori);
     console.log(jilid);
     console.log(ambilsendiri);
     console.log(keterangan);
     console.log(hargaBW);
     console.log(hargaColor);
     console.log(hargajilid);
     console.log(total1);
     console.log(total2);
     console.log(total3);
     console.log(total);

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