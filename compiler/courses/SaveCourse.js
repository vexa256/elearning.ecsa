window.SERVER_PATH = window.location.origin + "/api/";
window.CURRENT_URL = localStorage.getItem("CurrentUrl");
window.FORM_SETTINGS = {
  headers: {
    "content-type": "multipart/form-data",
  },
};

window.SaveCourseData = (PATH, DATA) => {
  //   alert(window.CURRENT_URL);
  CUSTOM_LOADER.show();

  window.axios
    .post(SERVER_PATH + PATH, DATA, FORM_SETTINGS)

    .then(function (response) {
      console.log(response.data.status);

      if (response.data.status == "true") {
        DataSaveAlert();

        console.log(CURRENT_URL);
        ManualRefreshPage(CURRENT_URL);

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

  $(document).on("click", "#SaveCourseData", function (event) {
    event.preventDefault();

    $(".modal-backdrop").remove();

    return SaveCourseData(
      "SaveNewCourse",
      new FormData(document.getElementById("NewCourseData"))
    );
  });
});
