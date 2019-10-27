 <div id="pagewebprofil">
     
 


<div class="col-md-4">
         <div class="portlet light">
           <div class="portlet-body">
              <h2>Profile user</h2>
            <img src="<?php echo base_url().'assets/img/user.png' ?>" alt="" class='col-md-12'>
             <a href="javascript:void(0);" onclick="ubahuser()" class="label label-sm label-warning">Ubah Akun</a>
            <br>

               
                    <div class="iduser" style="display: none"></div>
                  <span>User</span>
                  <div class="name text text-success"></div>

                  <span>Password</span>
                  <div class="pwd text text-success"></div>

                  <span>Email</span>
                  <div class="em text text-success"></div>

                 
            </div>
         </div>
</div>




<div class="col-md-8">
    

     <div class="portlet light">
                     
                        <div class="portlet-body">
 
                            <h4 class="block">Profil Web</h4>
                            <p id="idprofil" style="display: none"></p>
                            <div class="list-group">
                                <a href="javascript:;" class="list-group-item active">
                                <h4 class="list-group-item-heading">Profil</h4>
                                <p class="list-group-item-text" id="profiltxt">
                                    
                                </p>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                <h4 class="list-group-item-heading">Nama Web</h4>
                                <p class="list-group-item-text" id="namatxt">
                                     
                                </p>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                <h4 class="list-group-item-heading">Email & Tlp</h4>
                                <p class="list-group-item-text" id="emailtxt">
                                <p class="list-group-item-text" id="tlp1txt">    
                                    <p class="list-group-item-text" id="tlp2txt">    
                                        <p class="list-group-item-text" id="tlp3txt">    
                                </p>
                                </a>

                                 <a href="javascript:;" class="list-group-item">
                                <h4 class="list-group-item-heading">Medsos</h4>
                                <p class="list-group-item-text" id="medsosfbtxt">
                                    <p class="list-group-item-text" id="medsosigtxt">
                                </p>
                                </a>
                            </div>
                             <a href="javascript:void(0);" onclick="ubahprofil()" class="label label-sm label-warning">Ubah Profil</a>
                        </div>
                    </div>
</div>
</div>