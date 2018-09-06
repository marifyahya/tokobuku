function hapus(id) {
    swal({
		title: "Anda yakin ingin menghapus data ini?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {
			location.href = 'category/delete/' + id
		}
	});
}