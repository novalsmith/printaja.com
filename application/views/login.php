 <?php $this->load->view('headeradmin'); ?>
 <link href="<?php echo base_url() ?>assets/metronic/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>

  <link href="<?php echo base_url() ?>assets/metronic/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>

 
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<h1 class="text text-success">PrintMu</h1>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	 <form class="login-form" method="post"  id="loginform">
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" 
      autocomplete="off" placeholder="Email" name="email" id="email" onkeyup="oncheckemail()" />
			 <span class="text text-danger" id="errorEmail"></span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" onkeyup="oncheckpassword()" />
			 <span class="text text-danger" id="errorPassword"></span>
		</div>
		<div class="form-actions">
			<button   class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
		</div>
		<div class="login-options">
			<small style="color: #b1b1b1">*Jika lupa password silahkan hubungi bagian IT</small>
		 
		</div>
	 
	</form>
	<!-- END LOGIN FORM -->
 
	<!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
	 <?php echo date('Y'); ?> © HadiTerpal.
</div>
 
</body>
 
<script src="<?php echo base_url() ?>assets/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script>

  function oncheckemail() {
                     
                    var email = document.getElementById("email").value;
                    
                    if (email=='') {
                    $("#errorEmail").text("Email Tidak Boleh Kosong");
                    } 

                    else{
                    	 if(isValidEmailAddress(email)){
                            $("#errorEmail").text("");
                             }else{
                	 $("#errorEmail").text("Harus email, contoh : printmu@gmail.com ");
                }
                    }
               

                       }

       

                  function oncheckpassword() {
                     
                    var password = document.getElementById("password").value;
                      if (password=='') {
                    $("#errorPassword").text("Password Tidak Boleh Kosong");
                    } 

                    else{
                            $("#errorPassword").text("");
                    }  }

                    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

 		$(document).ready(function(){
			$('#loginform').submit(function(e) 
				{

					e.preventDefault();
                   
                    var email = $('#email').val();
                    var password = $('#password').val();
 
                     if(isValidEmailAddress(email)){


                if(email =='' && password ==''){
                    $("#errorEmail").text("Email Tidak Boleh Kosong");
                    $("#errorPassword").text("Password Tidak Boleh Kosong");
             
        }else if(email !='' && password ==''){

             $("#errorEmail").text("");
                    $("#errorPassword").text("Password Tidak Boleh Kosong");

        }else if(email =='' && password !=''){
             $("#errorEmail").text("Email Tidak Boleh Kosong");
                    $("#errorPassword").text("");

           

                  
        }else{

        	$.ajax({
				 			url:   "<?php echo site_url('Auth/cek_login') ?>",
				 			type: "post",
				 			dataType: "json",
				 			data: {email : email, password : password},
				 	 // contentType: false,
		cache: false,
				 			success: function(data) 
				 				{
				 					  
				 					if(data['status']=='berhasil'){
				 						Swal.fire({
                                          position: 'top-end',
                                          type: 'success',
                                          title: data.data['name']+'\n Berhasil Login',
                                          showConfirmButton: false,
                                          timer: 1000
                                        })
                                        $('#emailsession').text(data.data['name']);
                                         $('#emailsession2').text(data.data['name']);

                                        
                                          setTimeout(function() {
                                       window.location.assign("<?php echo base_url('Welcome') ?>");
                                               }, 1000); 
				 					}else{

				 						  Swal.fire({
                                          position: 'top-end',
                                          type: 'error',
                                          title: 'Login gagal, email atau password masih salah',
                                          showConfirmButton: false,
                                          timer: 3700
                                        })  
				 					}


				 					
				 				},
								  	 error: function(jqXHR, textStatus, errorThrown) {
												alert('Error get data from ajax');
											}

				 			});

 
        }
    }else{
    	 $("#errorEmail").text("Harus email, contoh : haditerpal@gmail.com ");
    }

                });

		});
 </script>

