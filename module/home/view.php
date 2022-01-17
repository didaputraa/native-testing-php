
<div class="row">
	<div class="col-lg-12">
	<button type="button" onClick="addBarang()" class="btn btn-primary mb-2">Add Barang</button>
		<div class="table-reponsive">
		<table class="table" id="tbl-master">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Nama</th>
					<th>Type</th>
					<th>Harga awal</th>
					<th>Harga jual</th>
					<th>Ket</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
		</div>
	</div>
</div>

<div class="modal" id="modal-add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" id="add-nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Kode</label>
					<input type="hidden" id="add-kode-fake">
					<input type="text" id="add-kode" class="form-control" onfocusout="findKode()">
					<small id="add-find" class="text-danger d-none">Kode telah dipakai</small>
				</div>
				<div class="form-group">
					<label>Type</label>
					<select id="add-type" class="form-control"></select>
				</div>
				<div class="form-group">
					<label>Harga awal</label>
					<input type="number" id="add-awal" class="form-control">
				</div>
				<div class="form-group">
					<label>Harga jual</label>
					<input type="number" id="add-jual" class="form-control">
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" id="add-ket" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="store-barang" class="btn btn-primary" onClick="storeBarang()">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal-edit" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="hidden" id="edit-id">
					<input type="text" id="edit-nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Kode</label>
					<input type="hidden" id="edit-kode-fake">
					<input type="text" id="edit-kode" class="form-control" onfocusout="findKode('update')">
					<small id="edit-find" class="text-danger d-none">Kode telah dipakai</small>
				</div>
				<div class="form-group">
					<label>Type</label>
					<select id="edit-type" class="form-control"></select>
				</div>
				<div class="form-group">
					<label>Harga awal</label>
					<input type="number" id="edit-awal" class="form-control">
				</div>
				<div class="form-group">
					<label>Harga jual</label>
					<input type="number" id="edit-jual" class="form-control">
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" id="edit-ket" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="update-barang" class="btn btn-primary" onClick="updateBarang()">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal-trash" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<input type="hidden" id="id-trash">
				<p>Yakin ingin menghapus data ini ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button onClick="doTrash()" type="button" class="btn btn-primary">Hapus</button>
			</div>
		</div>
	</div>
</div>

<script src="asset/module/barang.js"></script>