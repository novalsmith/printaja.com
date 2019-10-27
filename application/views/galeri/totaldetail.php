 <style type="text/css">
     .img{
        margin: 2px;
     }


 </style>

 <script type="text/javascript">

  
 	  
 	  function deletegaleri(idgaleri,nama_kategori,foto,judul){
 	  
 	  		$('#pesanheader2').text('Anda Yakin Menghapus Foto dari Galeri  '+nama_kategori+' ? ');
 		// document.getElementById("pesan2").src = 	"<?php echo base_url('assets/img/galeri/') ?>" + foto;
 		$('#Setimage').prepend('<div class="row"><img class="col-md-12" src=" '+"<?php echo base_url('assets/img/galeri/') ?>"+foto +' " /></div>')
 			$('#judul').text(judul);
 			$('#idgaleri').text(idgaleri);

            
             $('#modal_form_delete_galeri').modal({
 			show: true,
 			keyboard: false,
 			backdrop: 'static'
 		});
        }

        function deleteGaleri(s){
        	 
        	 
	var url = "<?php echo site_url('galeri/delete/') ?>"+ s;
        	 	$.ajax({
 			url: url,
 			type: "POST",
 			data: $('#form_delete_galeri').serialize(),
 			dataType: "JSON",
 			contentType: false,
		cache: false,
		processData:false,
 			success: function(data) {
                console.log(data);
 				if (data.status==true) //if success close modal and reload ajax table
 				{

 					
										Swal.fire({
										  position: 'top-end',
										  type: 'success',
										  title: ' Berhasil Terhapus '+data.data["judulfoto"],
										  showConfirmButton: false,
										  timer: 2700
										})


 				 
 				}else{
 						Swal.fire({
										  position: 'top-end',
										  type: 'danger',
										  title: ' Gagal Terhapus',
										  showConfirmButton: false,
										  timer: 2700
										})
 				}  
 				 

 				 $('#modal_form_delete_galeri').modal('hide');
 					// location.reload();
 					setTimeout(function(){ location.reload(); }, 2800);
 			},
 			error: function(jqXHR, textStatus, errorThrown) {
 				 
 				// $('#btnSave').text('save'); //change button text
 				// $('#btnSave').attr('disabled', false); //set button enable 
 				Swal.fire({
										  position: 'top-end',
										  type: 'danger',
										  title: ' error Periksa lagi',
										  showConfirmButton: false,
										  timer: 2700
										})
 			}
 		});
        }

 </script>
         <form id="form_galeri" method="post"  enctype="multipart/form-data">
                    <div class="portlet light">
                     
                        <div class="portlet-body">
        <div class="row">
             <?php foreach ($totaldetail->result() as $key): ?>
             
             <div class="col-md-3">
             	<img   src="<?php echo base_url('assets/img/galeri/').$key->foto ?>" 
                    alt="your image" class="img img-thumbnail" /> 
                    <small><?php echo $key->judulfoto ?></small> <br>
            <!-- <input type="hidden" name="idgaleri" id="idgaleri" value="<?php echo $key->idgalery ?>"> -->
                    <a class="label label-sm label-danger"   
                    onclick="deletegaleri('<?php echo $key->idgalery ?>','<?php echo $key->nama_kategori ?>','<?php echo $key->foto ?>','<?php echo $key->judulfoto ?>');" javascript:void(0);> <i class="fa fa-trash-o"></i> Hapus </a>
             </div> 
  	
             <?php endforeach ?>



        </div>

       
       </div>
   </div>
   </form>




 
 