window.SERVER_PATH = window.location.origin + "/api/";
window.CURRENT_URL = localStorage.getItem("CurrentUrl");
window.FORM_SETTINGS = {
  headers: {
    "content-type": "multipart/form-data",
  },
};

window.SaveFormData = (PATH, DATA) => {
  //   alert(window.CURRENT_URL);
  CUSTOM_LOADER.show();

  axios
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

  $(document).on("click", "#FormSave", function (event) {
    event.preventDefault();

    var values = {};
    $.each($("#FormGetData").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });

    return SaveFormData("ApiInsert", values);
  });
});
