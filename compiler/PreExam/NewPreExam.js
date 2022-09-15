window.SERVER_PATH = window.location.origin + "/api/";
window.CURRENT_URL = localStorage.getItem("CurrentUrl");
window.FORM_SETTINGS = {
  headers: {
    "content-type": "multipart/form-data",
  },
};

window.SavePreExam = (PATH, DATA) => {
  //   alert(window.CURRENT_URL);
  CUSTOM_LOADER.show();

  window.axios
    .post(SERVER_PATH + PATH, DATA, FORM_SETTINGS)

    .then(function (response) {
      console.log(response.data.status);

      if (response.data.status == "true") {
        DataSaveAlert();

        var CurrentTestId = $("#CurrentTestId").val();

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
  //   CUSTOM_LOADER.show();
  $(document).on("click", "#SaveNewExamQtn", function (event) {
    event.preventDefault();

    $(".modal-backdrop").remove();
    var Data = new FormData(document.getElementById("NewExamQtn"));
    Data.append("Question", $(".editorme").val());

    console.log($(".editorme").val());
    SavePreExam("ApiInsert", Data);

    var URL = $("#URL").val();

    return ManualRefreshPage(URL);
  });
});
