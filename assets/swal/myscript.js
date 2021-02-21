const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({
		icon: 'success',
		title: 'Selamat Datang,',
		text: flashData,
		type: 'success'
	});
}

const flashEdit = $('.flashEdit').data('flashdata');

if (flashData) {
	Swal.fire({
		icon: 'success',
		title: 'Yey...,',
		text: flashEdit,
		type: 'success'
	});
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		icon: 'warning',
		title: 'Apakah anda yakin ?',
		text: "Data akan di hapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

