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
      url: "<?php echo site_url('Authpesanan/jsonContact') ?>",
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
      url: "<?php echo site_url('Authpesanan/jsonAbout') ?>",
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
      $("#pesanstatus").text("* Anda belum memasukan IDPrint.");
    } else {
      $("#pesanstatus").text("");
      $.ajax({
        url: "<?php echo site_url('Authpesanan/JsonCekstatus/') ?>" + idpesanan,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          if (data.status == 1) {
            $('#hasil').html("<h4 class='alert alert-success'> <span class='fa fa-check'></span> Selamat, hasil printmuaja sudah selesai dan bisa di ambil. Terimakasih atas kepercayaan anda, Sukses selalu </h4>");
          } else if (data.status == 0) {
            $('#hasil').html("<h4 class='alert alert-warning'> <span class='fa fa-info'></span> Pesanan Printmuaja masih dalam proses pengerjaan, silahkan kontak petugas jika sudah melebihi waktu  </h4>");
          } else {
            $('#hasil').html("<h4 class='alert alert-danger'> <span class='fa fa-warning'></span> IDPrint tidak ditemukan, periksa lagi atau hubungi petugas Printmuaja</h4>");
          }
        }
      });
    }
  });
  $('#bantuan').click(function() {
    $.ajax({
      url: "<?php echo site_url('Authpesanan/jsonBantuanGetAll') ?>",
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
      url: "<?php echo site_url('Authpesanan/JsonFitur') ?>",
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
    var charga = $('#hargahidden').text();
    var harga = parseInt(charga);
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
    } else {
      var data = new FormData(this);

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
      var url = "<?php echo site_url('Authpesanan/create_action') ?>"
      var conf = confirm("Apakah anda ingin hasil print di kirim ke tempat anda.\n tambahan biayanya hanya Rp.2.000 aja loh.");
      if (conf == true) {
        data.append('pengiriman', 1);
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
            var tmp = "";
            tmp += "<div class='row'>";
            tmp += "<div class='col-md-6 well'>";
            tmp += "<span>Nomor IDPrint kamu</span>";
            tmp += "<div class='text text-success' style='font-size:15pt'> " + data.idpesananduplicate + "  </div>";
            tmp += "* Silahkan di simpan IDPrint kamu untuk di gunakan pada pengecekan status.";
            tmp += "</div>";
            tmp += "<div class='col-md-6 well'>";
            tmp += "<span>Harga yang harus anda bayar :</span>";
            tmp += "<div class='text text-warning ' style='font-size:15pt'>Rp." + (parseInt(harga + 2000).toLocaleString()) + "</div>";
            tmp += "</div></div>";
            $('#isiautonumber').append(tmp);
          }
        });
      } else {
        data.append('pengiriman', 0);
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
            var tmp = "";
            tmp += "<div class='row'>";
            tmp += "<div class='col-md-6 well'>";
            tmp += "<span>Nomor IDPrint kamu</span>";
            tmp += "<div class='text text-success' style='font-size:15pt'> " + data.idpesananduplicate + "  </div>";
            tmp += "* Silahkan di simpan IDPrint kamu untuk di gunakan pada pengecekan status.";
            tmp += "</div>";
            tmp += "<div class='col-md-6 well'>";
            tmp += "<span>Harga yang harus anda bayar :</span>";
            tmp += "<div class='text text-warning ' style='font-size:15pt'>Rp." + (parseInt(harga).toLocaleString()) + "</div>";
            tmp += "</div></div>";
            $('#isiautonumber').append(tmp);
          }
        });
      }
      $('#myModalFinish').modal({
        show: true,
        keyboard: false,
        backdrop: 'static'
      });
      $('#myModalDetailPrint').modal('hide');
    }
  });
  $('#tutup').click(function() {
    location.reload();
  });

  function tutup() {
    location.reload();
  }

  function yes(e) {

    //  $('#myModalDetailPrint').modal('show');
    //  alert(e);
    $.ajax({
      url: "<?php echo site_url('Authpesanan/registlogin') ?>",
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        if (data.result == "true") {
          $('#myModalPrint').modal('hide');
          $('#myModalloginregist').modal('show');
          $("#registblok").attr('style', 'display:none;animation: fadeIn 5s;');
        } else {
          $.ajax({
            url: "<?php echo site_url('Authpesanan/JsonKategori/') ?>" + e,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
              console.log(data);
              $('#juduldetilpesan').text(" Cetak " + data[0].nama_kategori);





              $('#idkategori').text(data[0].idkategori);
              $('#namakategori').text(data[0].nama_kategori);
              $('#hargaBW').text(data[0].hargaBW);
              $('#hargaColor').text(data[0].hargaColor);
              $('#hargajilid').text(data[0].hargajilid);

              $.ajax({
                url: "<?php echo site_url('Authpesanan/detilakun') ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                  $('#namapemesan').text(data[0].name);
                  $('#emailpesanan').text(data[0].email);

                }
              });



              $('#myModalPrint').modal('hide');
              $('#myModalDetailPrint').modal('show');
            }
          });
        }
      }
    });




  }

  function registrasi() {
    var nama = $('#nama').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var tlp1 = $('#tlp1').val();
    var tlp2 = $('#tlp2').val();

    if (nama == "") {
      alert("Nama harus disini");
    } else if (email == "") {
      alert("Email harus disini");
    } else if (password == "") {
      alert("Password harus disini");
    } else if (tlp1 == "") {
      alert("Tlp 1 harus disini");
    } else if (tlp2 == "") {
      alert("Tlp 2 harus disini");
    } else {

      var param = {
        name: nama,
        email: email,
        password: password,
        tlp1: tlp1,
        tlp2: tlp2
      }

      $.ajax({
        url: "<?php echo site_url('Authpesanan/prosesregist') ?>",
        type: "POST",
        data: param,
        dataType: "JSON",
        success: function(data) {
          if (data.status == "true") {
            alert("Registrasi berhasil silahkan Login");
            $('#emaillogin').focus();
          } else {
            alert("Registrasi gagal coba lagi");
          }
        }
      });
    }
  }


  function registshow() {
    $("#registblok").attr('style', 'display:blok');
  }


  function ubahakun() {

    $.ajax({
      url: "<?php echo site_url('Authpesanan/detilakun') ?>",
      type: "GET",

      dataType: "JSON",
      success: function(data) {
        console.log(data[0].name);
        $('#myModalubahakun').modal('show');
        $('#namaUbah').val(data[0].name);
        $('#emailUbah').val(data[0].email);
        $('#tlp1Ubah').val(data[0].tlp1);
        $('#tlp2Ubah').val(data[0].tlp2);
        $('#passwordUbah').val(data[0].password);
      }
    });
  }

  function prosesubahakun() {
    var nama = $('#namaUbah').val();
    var email = $('#emailUbah').val();
    var tlp1 = $('#tlp1Ubah').val();
    var tlp2 = $('#tlp2Ubah').val();
    var password = $('#passwordUbah').val();

    var param = {
      nama: nama,
      email: email,
      tlp1: tlp1,
      tlp2: tlp2,
      password: password
    }
    $.ajax({
      url: "<?php echo site_url('Authpesanan/prosesUpdateakun') ?>",
      type: "POST",
      data: param,
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        if (data.status == "true") {
          $('#myModalubahakun').modal('hide');
          Swal.fire({
            position: 'top-end',
            type: 'info',
            title: 'Berhasi Ubah data ',
            showConfirmButton: false,
            timer: 3000
          })
          setTimeout(function() {
            location.reload();
          }, 3000);

          logout();
        } else {
          Swal.fire({
            position: 'top-end',
            type: 'danger',
            title: 'Gagal Ubah data ',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function() {
            location.reload();
          }, 2200);
        }
      }
    });
  }


  function loginpesanan() {

    var email = $('#emaillogin').val();
    var password = $('#passwordlogin').val();


    if (email == "") {
      alert("Email harus disini");
    } else if (password == "") {
      alert("Password harus disini");
    } else {

      var param = {

        email: email,
        password: password

      }

      $.ajax({
        url: "<?php echo site_url('Authpesanan/cek_login') ?>",
        type: "POST",
        data: param,
        dataType: "JSON",
        success: function(data) {
          if (data.status == "true") {
            alert("Berhasil Login silahkan Lanjut pesanan ..");
            $('#myModalloginregist').modal('hide');
            $('#myModalPrint').modal('show');

          } else {
            alert("Login Gagal coba lagi");
          }
        }
      });
    }
  }



  function logout() {
    $.ajax({
      url: "<?php echo site_url('Authpesanan/logout') ?>",
      type: "GET",

      dataType: "JSON",
      success: function(data) {
        if (data.status == "ok") {
          Swal.fire({
            position: 'top-end',
            type: 'warning',
            title: 'Berhasi Logout ',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function() {
            location.reload();
          }, 2200);
        } else {
          Swal.fire({
            position: 'top-end',
            type: 'danger',
            title: 'Gagal Logout ',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function() {
            location.reload();
          }, 2200);

        }
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