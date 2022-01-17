var tblBarang = $('#tbl-master');

/*
	--- jika modal hide/close ---
*/
$('#modal-add').on('hidden.bs.modal',function(){
	$('#add-nama').val(null);
	$('#add-kode').val(null);
	$('#add-type').val(null);
	$('#add-awal').val(null);
	$('#add-jual').val(null);
	$('#add-ket').val(null);
});


/*
	--- tampil barang ---
*/
function showBarang()
{
	tblBarang.DataTable({
		info:false,
		responsive:true,
		lengthChange:false,
		ajax:{
			url: 'api/barang/barang_view.php'
		},
		columns:[
			{'data':'kode_barang'},
			{'data':'nama_barang'},
			{'data':'jenis'},
			{
				'render':function(data,type,row){
					return Number(row.harga_awal).toLocaleString()
				}
			},
			{
				'render':function(data,type,row){
					return Number(row.harga_jual).toLocaleString()
				}
			},
			{'data':'keterangan'},
			{
				'render':function(data,type, row){
					
					if(sesi == 'operator'){
						return `
						<button onClick="editBarang(${row.id})" class="btn btn-outline-warning btn-sm">edit</button>`;
					}else{
						return `<button onClick="editBarang(${row.id})" class="btn btn-outline-warning btn-sm">edit</button>
						<button onClick="prepareDelete(${row.id})" class="btn btn-outline-danger btn-sm">hapus</button>`;
					}
				}
			}
		]
	});
}

/*
	--- tambah barang ---
*/
function addBarang()
{
	$.ajax({
			
		url:base_url+'/api/type/all.php'
		
	}).done(function(respon){
		
		$('#add-type').empty();
		
		respon.data.forEach(function(index){
			
			$('#add-type').append(`<option value='${index.id}'>${index.nama}</option>`)
		});
		
		$('#store-barang').prop('disabled', true)
		$('#modal-add').modal('show');
	});
}

/*
	--- edit barang ---
*/
function editBarang(id)
{
	$.ajax({
		
		url:base_url+'/api/barang/find.php?id='+id
		
	}).done(function(res){
		
		$('#edit-id').val(res[0].id);
		$('#edit-kode-fake').val(res[0].kode_barang);
		$('#edit-kode').val(res[0].kode_barang);
		$('#edit-nama').val(res[0].nama_barang);
		$('#edit-awal').val(res[0].harga_awal);
		$('#edit-jual').val(res[0].harga_jual);
		$('#edit-ket').val(res[0].keterangan);
		
		$.ajax({
			
			url:base_url+'/api/type/all.php'
			
		}).done(function(respon){
			
			$('#edit-type').empty();
			
			respon.data.forEach(function(index){
				
				$('#edit-type').append(`<option value='${index.id}'>${index.nama}</option>`)
			})
			
			$('#edit-type').val(res[0].id_type);
			$('#modal-edit').modal('show');
		})
		
	});
}

/*
	--- persiapan hapus barang ---
*/
function prepareDelete(item)
{
	$('#id-trash').val(item);
	$('#modal-trash').modal('show');
}


/*
	--- proses hapus barang ---
*/
function doTrash()
{
	$.ajax({
		
		url: base_url + '/api/barang/remove.php?id=' + $('#id-trash').val()
		
	})
	.done(function(){
		
		$('#modal-trash').modal('hide');
		
		tblBarang.DataTable().destroy();
		$('#tbl-master tbody').empty();
		showBarang();
	});
}


/*
	--- proses update barang ---
*/
function updateBarang()
{
	$.ajax({
		
		url:base_url+'/api/barang/update.php',
		method:'POST',
		data:{
			id: $('#edit-id').val(),
			nama_barang: $('#edit-nama').val(),
			kode_barang: $('#edit-kode').val(),
			type_barang: $('#edit-type').val(),
			keterangan : $('#edit-ket').val(),
			hAwal: $('#edit-awal').val(),
			hJual: $('#edit-jual').val()
		}
		
	}).done(function(res){
		
		$('#modal-edit').modal('hide');
		
		tblBarang.DataTable().destroy();
		
		$('#tbl-master tbody').empty();
		
		showBarang();
	});
}


/*
	--- proses simpan barang ---
*/
function storeBarang()
{
	$.ajax({
		
		url:base_url+'/api/barang/store.php',
		method:'POST',
		data:{
			nama_barang: $('#add-nama').val(),
			kode_barang: $('#add-kode').val(),
			type_barang: $('#add-type').val(),
			hAwal: $('#add-awal').val(),
			hJual: $('#add-jual').val(),
			keterangan : $('#add-ket').val()
		}
		
	}).done(function(res){
		tblBarang.DataTable().destroy();
		$('#tbl-master tbody').empty();
		
		$('#add-nama').val(null);
		$('#add-kode').val(null);
		$('#add-type').val(null);
		$('#add-awal').val(null);
		$('#add-jual').val(null);
		$('#add-ket').val(null);
		
		$('#modal-add').modal('hide');
		
		showBarang();
	});
}

/*
	--- pencocokan kode barang ---
*/
function findKode(action = 'store')
{
	let module = {
		btn: '#store-barang',
		small: '#add-find',
		item: '#add-kode',
	};
	
	if(action != 'store'){
		module.btn   = '#update-barang';
		module.small = '#edit-find';
		module.item  = '#edit-kode';
	}
	
	if($(module.item).val() == $(module.item+'-fake').val())
	{
		$(module.btn).prop('disabled', false)
		$(module.small).addClass('d-none');
	}
	else
	{
		$.ajax({
			url: base_url+'/api/barang/key.php?item=' + $(module.item).val()
		})
		.done(function(res){
			if(res.error == true) {
				
				$(module.btn).prop('disabled', true)
				$(module.small).removeClass('d-none');
				
			} else {
				
				$(module.btn).prop('disabled', false)
				$(module.small).addClass('d-none');
			}
		});
	}
}

showBarang();