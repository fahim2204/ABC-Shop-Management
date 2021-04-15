function RegistrationFieldValidation() {
    var Name = document.forms["registration"]["name"].value;
    var userName = document.forms["registration"]["username"].value;
    var password = document.forms["registration"]["password"].value;
    var cPassword = document.forms["registration"]["cpassword"].value;
    //Clearing Error
    document.getElementById("lb-email").style["visibility"] = "hidden";
    document.getElementById("lb-pass").style["visibility"] = "hidden";
    document.getElementById("lb-name").style["visibility"] = "hidden";
    document.getElementById("lb-cpass").style["visibility"] = "hidden";
    
    if (userName == "" && password == "" && Name == "" && cPassword == "") {
        document.getElementById("lb-email").style["visibility"] = "visible";
        document.getElementById("lb-pass").style["visibility"] = "visible";
        document.getElementById("lb-name").style["visibility"] = "visible";
        document.getElementById("lb-cpass").style["visibility"] = "visible";
        return false;

    } else {
        var status = false;
        var regEmail = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
        var regPhone = "/(^(013)|^(014)|^(015)|^(016)|^(017)|^(018)|^(019)){1}\d{8}/"

        if (Name.length < 3) {
            document.getElementById("lb-name").style["visibility"] = "visible";
            status = false;
        }else{
            status = true;
        }
        if (userName.length < 5 && (regEmail.match(userName) || regPhone.match(userName)) ) {
            document.getElementById("lb-email").style["visibility"] = "visible";
            status = false;
        }else{
            status = true;
        }
        if (password.length < 6) {
            document.getElementById("lb-pass").style["visibility"] = "visible";
            status = false;
        }else{
            status = true;
        }
        if (cPassword.length < 6) {
            document.getElementById("lb-cpass").style["visibility"] = "visible";
            status = false;
        }else{
            status = true;
        }
        return status;
    }

}