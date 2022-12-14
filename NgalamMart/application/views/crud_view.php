<html lang="id">
<head>
	<meta charset="utf-8">
	  <!-- Bootstrap 3.3.7 -->
	  <link rel="stylesheet" href="../../ngalammart/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../ngalammart/bower_components/font-awesome/css/font-awesome.min.css">
  <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.css'?>" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/headerstyle.css">
</head>
<body>

<div class= "container" id="wrapper">
		<header>
			<hgroup>
			<center><font size = "30"> <b>NGALAM</b>|MART</font></center>
				<h3>Tugas Website Untuk TA</h3>
				<b>Selamat Datang, <?php echo $this->session->userdata('ses_nama');?></b>
			</hgroup>
			<nav>
				<ul>
					<li><a href="<?php echo base_url().'index.php/login/logout'?>" class="btn btn-success" style="color:antiquewhite">Log Out</a></li>
				</ul>
			</nav>
</div>
<div class ="container">
  <!-- <div class="container">
  <center><font size = "30"> <b>NGALAM</b>|MART</font></center> -->
    <h2>Product List</h2>
		<button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
    <table class="table table-striped" id="mytable">
      <thead>
        <tr>
          <th>Product Code</th>
          <th>Product Name</th>
          <th>Price</th>
		  <th>Category</th>
		  <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>

	<!-- Tambah Produk-->
	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/simpan'?>" method="post">
	     <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Add New</h4>
	               </div>
	               <div class="modal-body">
	                   <div class="form-group">
	                       <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
	                   </div>
										 <div class="form-group">
	                       <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
	                   </div>
										 <div class="form-group">
	                       <select name="kategori" class="form-control" placeholder="Kode Barang" required>
													  <?php foreach ($kategori->result() as $row) :?>
													 		<option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
														 <?php endforeach;?>
														 
												 </select>
	                   </div>

					   <div class="form-group">
	                       <input type="text" name="status" class="form-control" placeholder="Status" required>
	                   </div>
										 <div class="form-group">
	                       <input type="text" name="harga" class="form-control" placeholder="Harga" required>
	                   </div>

	               </div>
	               <div class="modal-footer">
	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                  	<button type="submit" id="add-row" class="btn btn-success">Save</button>
	               </div>
	      			</div>
	        </div>
	     </div>
	 </form>

	 <!-- Update Produk-->
 	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/update'?>" method="post">
 	     <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Update Produk</h4>
 	               </div>
 	               <div class="modal-body">
 	                   <div class="form-group">
 	                       <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
 	                   </div>
 										 <div class="form-group">
 	                       <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
 	                   </div>
 										 <div class="form-group">
 	                       <select id="idkategori" name="kategori" class="form-control" placeholder="Kode Barang" required>
 													  <?php foreach ($kategori->result() as $row) :?>
 													 		<option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
 													 	<?php endforeach;?>
 												 </select>
						</div>
										<div class="form-group">
 	                       <input type="text" name="status" class="form-control" placeholder="Status" required>
 	                   </div>

 										 <div class="form-group">
 	                       <input type="text" name="harga" class="form-control" placeholder="Harga" required>
 	                   </div>

 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Update</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form>

	 <!-- Hapus Produk-->
 	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/delete'?>" method="post">
 	     <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
 	               </div>
 	               <div class="modal-body">
 	                       <input type="hidden" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
												 <strong>Anda yakin mau menghapus record ini?</strong>
 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Hapus</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form>

	 

<script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.datatables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.js'?>"></script>

<script>
	$(document).ready(function(){
		// membuat datatabel
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

      var table = $("#mytable").dataTable({
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
		  //data table ajax
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'index.php/crud/get_guest_json'?>", "type": "POST"},
                	columns: [
												{"data": "barang_kode"},
												{"data": "barang_nama"},
												//render harga dengan format angka
                        {"data": "barang_harga", render: $.fn.dataTable.render.number(',', '.', '')},
						{"data": "kategori_nama"},
						{"data": "barang_status"},//nama tabel db
                        {"data": "view"}
                  ],
          		order: [[1, 'asc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }

      });
			// Akhir datatabel
			// get Edit Record
			$('#mytable').on('click','.edit_record',function(){
            			var kode=$(this).data('kode');
						var nama=$(this).data('nama');
						var harga=$(this).data('harga');
						var kategori=$(this).data('kategori')
						var status=$(this).data('status');

            $('#ModalUpdate').modal('show');

            $('[name="kode_barang"]').val(kode);
						$('[name="nama_barang"]').val(nama);
						$('[name="harga"]').val(harga);
						$('[name="kategori"]').val(kategori)
						$('[name="status"]').val(status);
      });
			// Akhir Edit Records
			// get Hapus Records
			$('#mytable').on('click','.hapus_record',function(){
            var kode=$(this).data('kode');
            $('#ModalHapus').modal('show');
            $('[name="kode_barang"]').val(kode);
      }); // Akhir Hapus Records
 

	});
</script>
</body>
</html>
