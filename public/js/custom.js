$(document).ready(function($) {

	$('#comTable').DataTable({
		'paging': false
	});

	$('#empTable').DataTable({
		'paging': false
	});
});


function showModalComRead(id){
	
	var name = $('#'+id).data('name');
	var email = $('#'+id).data('email');
	var website = $('#'+id).data('website');
	var logo = $('#'+id).data('logo');
	$('#logo').attr('src', logo);
	$('#exampleModalLongTitle').text(name);
	$('#email').text(email);
	$('#website').text(website);
	$('#exampleModalCenter').modal('show');
}