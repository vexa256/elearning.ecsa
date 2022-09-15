window.SERVER_PATH = window.location.origin + "/api/";
window.CURRENT_URL = localStorage.getItem("CurrentUrl");
window.FORM_SETTINGS = {
  headers: {
    "content-type": "multipart/form-data",
  },
};

window.UpdateFormData = (PATH, DATA) => {
  //   alert(window.CURRENT_URL);
  CUSTOM_LOADER.show();

  axios
    .post(SERVER_PATH + PATH, DATA, FORM_SETTINGS)

    .then(function (response) {
      if (response.data.status == "true") {
        // ManualRefreshPage();

        $("#kt_content_container").html(" ");
        $("#kt_content_container").html(response.data.page);

        CUSTOM_LOADER.hide();
      }
    })
    .catch(function (error) {
      CatchAllThrownErrors(error);
      CUSTOM_LOADER.hide();
    });
};

$(document).ready(function () {
  //   $("#FormSave").click(function (event) {

  $(document).on("click", "#SaveCourseModulesSelection", function (event) {
    event.preventDefault();

    $(".modal-backdrop").remove();

    return UpdateFormData(
      "MgtModules",
      new FormData(document.getElementById("SelectCourseModule"))
    );
  });
});
