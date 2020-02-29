$(document).scroll(function () { // Change header background on scroll down
    if ($(window).scrollTop() > 200) {
        $("header").css("opacity", "1"); // On scroll down - not opacity
    } else if ($(window).scrollTop() < 200) {
        $("header").css("opacity", "0.8"); // On scroll back up - opacity back
    }
});



function printError(msg) { // Prints an error from validation
    document.querySelector('.error').innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + msg;
}

function validateForm() { // Checks form validation

    var form = document.forms["contactForm"]; // Form to check

    // Form values
    var name = form["name"].value;
    var email = form["email"].value;
    var phone = form["phone"].value;
    var country = form["country"].value;

    var msg;


    // Validate name
    if (name == "") { // if name is empty
        printError('Please enter your name');
        return false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) { // if name is valid
            printError('Please enter a valid name');
            return false;
        }
    };


    // Validate email address
    if (email == "") { // if email is empty
        printError('Please enter your email address');
        return false;
    } else {
        var regex = /^\S+@\S+\.\S+$/; // Regular expression for basic email validation
        if (regex.test(email) === false) {
            printError('Please enter a valid email address');
            return false;
        }
    };


    // Validate phone number
    if (phone == "") { // if phone number is empty
        printError('Please enter your phone number');
        return false;
    } else {
        var mobile_regex = /^\(?([0-9]{3})\)?[- ]?([0-9]{7})$/;
        var home_regex = /^\(?([0-9]{2})\)?[- ]?([0-9]{7})$/;
        if (mobile_regex.test(phone) === false && home_regex.test(phone) === false) {
            printError('Please enter a valid phone number');
            return false;
        }
    };


    // Validate country
    if (country == "") { // if country is empty
        printError('Please select your country');
        return false;
    };

    return true;
}
