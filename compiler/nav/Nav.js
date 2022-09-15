$(document).ready(function () {
    $(".AjaxNav").click(function () {
        CUSTOM_LOADER.show();

        // Retrieve the object from storage

        $("#kt_content_container").html(" ");
        $("#kt_content_container").load($(this).data("route"));

        localStorage.setItem("CurrentUrl", $(this).data("route"));

        REM_LOGIC();

        // ProcessFormData();

        CUSTOM_LOADER.hide();

        setInterval(function () {
            REM_LOGIC();
        }, 2000);

        // require('fslightbox');

    });

    window.ManualRefreshPage = (URL) => {
        
        CUSTOM_LOADER.show();

        // Retrieve the object from storage

        $("#kt_content_container").html(" ");
        $("#kt_content_container").load(URL);
        $(".CurrentUrl").val(URL);

        REM_LOGIC();

        CUSTOM_LOADER.hide();

        setInterval(function () {
            REM_LOGIC();
        }, 2000);

        // require('fslightbox');

    };
});
