// SCRIPT FOR MODAL DELETE

// untuk konfirmasi delete data
// function confirmDelete() {
//     $("#cpa-form").submit(function (e) {
//         e.preventDefault();
//     });
// }

var a;

var data = "";
$("#deleteModal").on("shown.bs.modal", function (e) {
    $("#inputConfirm").trigger("focus");
    localStorage.setItem("dataid", $(e.relatedTarget).data("id"));
    localStorage.setItem("url", $(e.relatedTarget).data("route"));
    // console.log($(e.relatedTarget).data('id'))
});

$("#deleteModal").on("hide.bs.modal", function (e) {
    $("#inputConfirm").val("");
    $("#inputConfirm").css("borderColor", "rgb(206, 212, 218)");
});

function DeleteBtn(e) {
    let password = $("#inputConfirm").val();
    let token = $("#deleteModal input").val();
    let idData = localStorage.getItem("dataid");
    let url = localStorage.getItem("url") + "/" + idData;

    if (password == "edpdnp1") {
        $.ajax({
            url: url, //or you can use url: "company/"+id,
            type: "DELETE",
            data: {
                _token: token,
                _method: 'Delete',
                id: idData
            },

            success: function (response) {
                console.log('data id'  + response);
                if(response.tableData == 'computer') {
                    $("#datatable-buttons").html(response.html);
                } else {
                    $("#table-data").html(response.html);
                }
                $("#deleteModal").modal("hide");
                $("#modalPesan .modal-body").html(`
                      ${response.success}
                    `);
                $("#modalPesan").modal("show");
                console.log($('#table-data thead')[0].hide());
            },

            error: function (msg) {
              // console.log(msg)
            },
        });
    } else {
        $("#inputConfirm").val("");
        $("#inputConfirm").focus();
        $("#inputConfirm").css("borderColor", "red");
    }
}

// END SCRIPT FOR MODAL DELETE



// SCRIPT UNTUK DATA TABLES

function init_DataTables() {
    console.log("run_datatables");

    

    if (typeof $.fn.DataTable === "undefined") {
        return;
    }
    console.log("init_DataTables");
    
    var handleDataTableButtons = function () {
        if ($("#datatable-buttons").length) {
            a = $("#datatable-buttons").DataTable({
                // "processing": true,
                // "serverSide": true,
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                    },
                    {
                        extend: "excel",
                        className: "btn-sm",
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm",
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .prepend(
                                    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                );
        
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    },
                ],
                responsive: true,
                // "ajax" : urlAjax
            });
        }

        if ($("#table-data").length) {
            var table = $("#table-data").DataTable({
                // "processing": true,
                // "serverSide": true,
                "paging" : false,
                "ordering" : true,
                // "scrollCollapse" : true,
                "searching" : true,
                // "columnDefs" : [{"targets":3, "type":"date-eu"}],
                "bInfo": true,
                // "fixedHeader": true,
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                    },
                    {
                        extend: "excel",
                        className: "btn-sm",
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm",
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                    },
                ],
                responsive: true,
                // "ajax" : urlAjax
            });

            new $.fn.dataTable.FixedHeader(table);
        }
    };

    TableManageButtons = (function () {
        "use strict";
        return {
            init: function () {
                handleDataTableButtons();
            },
        };
    })();

    $("#datatable").dataTable();

    $("#datatable-keytable").DataTable({
        keys: true,
    });

    $("#datatable-responsive").DataTable();

    $("#datatable-scroller").DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true,
    });

    $("#datatable-fixed-header").DataTable({
        fixedHeader: true,
    });

    var $datatable = $("#datatable-checkbox");

    $datatable.dataTable({
        order: [[1, "asc"]],
        columnDefs: [{ orderable: false, targets: [0] }],
    });
    $datatable.on("draw.dt", function () {
        $("checkbox input").iCheck({
            checkboxClass: "icheckbox_flat-green",
        });
    });

    TableManageButtons.init();
}

function selected(el) {
    var id = $(el).val();

    // console.log(id);
    
    $(el).parent().find('.laptop-detail').addClass('d-none');
    $(el).parent().find('.' + id).toggleClass('d-none');
    var id_device_laptop = $(el).parent().find('.' + id).data('device');
    $(el).parent().find('.laptop_device_id').val(id_device_laptop);
}

// AKHIR SCRIPT DATA TABLES



// Default export is a4 paper, portrait, using millimeters for units


