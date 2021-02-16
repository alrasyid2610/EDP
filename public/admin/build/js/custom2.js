// SCRIPT FOR MODAL DELETE
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

// $('#deleteModal').on('show.bs.modal', function (e) {
// });

function DeleteBtn(e) {
    let password = $("#inputConfirm").val();
    let token = $("#deleteModal input").val();
    let idData = localStorage.getItem("dataid");
    let url = localStorage.getItem("url") + "/" + idData;

    if (password == "edpdnp") {
        $.ajax({
            url: url, //or you can use url: "company/"+id,
            type: "DELETE",
            data: {
                _token: token,
                _method: 'Delete'
            },

            success: function (response) {
                $("#table").html(response.html);
                $("#deleteModal").modal("hide");
                $("#modal-content").html(`
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                      ${response.success}
                    </div>`);
                $("#modalPesan").modal("show");
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
