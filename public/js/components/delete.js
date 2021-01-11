$("body").on("click", ".btn-delete", function(e) {
    e.preventDefault();
    form = $(this).parent();
    Swal.fire({
        title: "Deseja mesmo confirmar essa ação? ",
        text: "Essa ação será irreversível",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#dc3545",
        cancelButtonText: "Não",
        confirmButtonText: "Sim",
        reverseButtons: true
    }).then(result => {
        if (result.value) {
            form.unbind(e);
            form.submit();
        }
    });
});
