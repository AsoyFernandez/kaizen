$(document).ready(function () {
    $('.js-selectize').selectize({
    sortField: 'text',
    });
	//dataTables
	var table = $('#myModal').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );

    $('.myModal').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css({
    	alignContent : 'center',
    	width:'100%',
        height:'auto', 
        'max-height':'100%'});
	});
// add selectize to select element
	

	$(".delete").on("submit", function(){
        return confirm("Apakah anda yakin?");
    });

});

