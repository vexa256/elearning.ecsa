window.DeleteRequest = (PATH) => {
  CUSTOM_LOADER.show();
  axios
    .get(PATH)
    .then(function (response) {
      if (response.data.status == "true") {
        DeleteAlert();
      }
      ManualRefreshPage(CURRENT_URL);
      CUSTOM_LOADER.hide();
    })
    .catch(function (error) {
      CatchAllThrownErrors(error);
      CUSTOM_LOADER.hide();
    });
};

$(document).on("click", ".deleteConfirm2", function () {
  var route = $(this).data("route");
  var msg = $(this).data("msg");

  Swal.fire({
    title: "Are you sure?",
    text: msg,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      DeleteRequest(route);
    }
  });
});
