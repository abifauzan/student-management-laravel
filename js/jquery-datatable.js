$(function () {
    $('.js-basic-example-kelas').DataTable({
        responsive: true,
        "ordering": false
    });

    $('.js-basic-example-length').DataTable({
        responsive: true,
        "lengthMenu": [ 3, 10, 50, 100 ]
    });

    $('.js-basic-example').DataTable({
        responsive: true,
    });

    $('.js-basic-example-jadwal').DataTable({
        responsive: true,
        "order": [[ 0, "desc" ]],
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
