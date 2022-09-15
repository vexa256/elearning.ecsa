window.CatchAllThrownErrors = (error) => {
    if (error.response) {
        // Request made and server responded
        console.log(error.response.data);
        console.log(error.response.status);
        console.log(error.response.data);

        var ERRORS_CAUGHT = error.response.data.errors;

        if (typeof ERRORS_CAUGHT !== 'undefined') {

            CatchValidationErrors(ERRORS_CAUGHT)
        }

        var p = ERRORS_CAUGHT;

        for (var key in p) {
            if (p.hasOwnProperty(key)) {
                console.log(key + " -> " + p[key]);
            }
        }

        // console.log(error.response.headers);
    } else if (error.request) {
        // The request was made but no response was received
        console.log(error.request);
    } else {
        // Something happened in setting up the request that triggered an Error
        console.log("Error", error.message);
    }
};




window.CatchValidationErrors = (Errors) => {

    var ul = `<ul>`;

    var closeUl = `</ul>`;

    var p = Errors;

    var GENERATED = '';

    var HTML = ul + GENERATED + closeUl;

    for (var key in p) {

        if (p.hasOwnProperty(key)) {

            GENERATED += `<li>${p[key]}</li>`;


        }
    }


    Swal.fire({
        title: 'An error occured, try again',
        icon: 'error',
        html: GENERATED,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fas fa-times"></i> Close!',
        confirmButtonAriaLabel: 'Close',
    });

}
