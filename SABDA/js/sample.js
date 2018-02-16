$(document).ready(function(){
	$('#myTable').DataTable();
});

$(document).ready(function() {
$('#myTableUser').dataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false });
});

$(document).on("click", ".confirm", function(e){
    bootbox.prompt({
        title: "Are You Sure Want To Delete Teacher ?,Enter Password",
        inputType: 'password',
        callback:function(result) {
            console.log(result);
        }
    });
}); 