// Call the dataTables jQuery plugin
$(document).ready(function() {
$('#dataTable').dataTable( {
		"oLanguage": {
			"sLengthMenu": "Tampilkan _MENU_ isi per halaman",
			"sZeroRecords": "Tidak ada data yang ditemukan.",
			"sInfo": "Menampilkan _START_ sampai _END_ , dari : _TOTAL_ hasil",
			"sInfoEmpty": "Tidak ada data.",
			"sSearch": "Pencarian Data:",
			"sInfoFiltered": "(Hasil dari _MAX_ total isi)"
		}
	} );
} );