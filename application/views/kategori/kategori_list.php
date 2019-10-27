 <!-- BEGIN PAGE CONTENT INNER -->
 <div class="row">
     <div class="col-md-12">
         <!-- BEGIN EXAMPLE TABLE PORTLET-->
         <div class="portlet light">

             <div class="portlet-body">
                 <div class="table-toolbar">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="btn-group">

                                 <a href="javascript:void(0);" onclick="add_kategori()" class="btn btn-success"> Add New <i class="fa fa-plus"></i></a>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="btn-group pull-right">
                                 <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li>
                                         <a href="javascript:;">
                                             Print </a>
                                     </li>
                                     <li>
                                         <a href="<?php echo base_url('kategori/word') ?>">
                                             Save as Word </a>
                                     </li>
                                     <li>
                                         <a href="<?php echo base_url('kategori/pdf') ?>">
                                             Save as PDF </a>
                                     </li>
                                     <li>
                                         <a href="<?php echo base_url('kategori/excel') ?>">
                                             Export to Excel </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- table here -->
                 <table class="table table-bordered table-striped" id="mytablekategori">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama Kategori</th>
                             <th>Hitam putih</th>
                             <th>Warna</th>
                             <th>Jilid</th>

                             <th> Status</th>
                             <th width="200px">Action</th>
                         </tr>
                     </thead>

                 </table>
                 <!-- end table -->
             </div>
         </div>
     </div>
 </div>
 <!-- END EXAMPLE TABLE PORTLET-->

 <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "kategori/json", "type": "POST"},
                    columns: [
                        {
                            "data": "idkategori",
                            "orderable": false
                        },{"data": "nama_kategori"},{"data": "status"},{"data": "create_date"},{"data": "modif_date"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    -->