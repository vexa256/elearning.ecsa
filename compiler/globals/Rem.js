$(document).ready(function () {
    window.REM_LOGIC = () => {
        if (sessionStorage.getItem("FieldRem") === null) {} else {
            var REM = sessionStorage.getItem("FieldRem");
            var ClEANED_REM = JSON.parse(REM);

            // console.log(ClEANED_REM);

            for (var key in ClEANED_REM) {
                if (ClEANED_REM.hasOwnProperty(key)) {
                    var element = ".x_" + ClEANED_REM[key];

                    if ($(element).length) {
                        $(element).remove();
                        sessionStorage.removeItem("FieldRem");
                    }
                }
            }
        }
    };
});
