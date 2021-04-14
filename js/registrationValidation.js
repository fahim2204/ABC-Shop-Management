function RegistrationFieldValidation() {
    var Name = document.forms["registration"]["name"].value;
    var userName = document.forms["registration"]["email"].value;
    var passWord = document.forms["registration"]["password"].value;
    var cPassword = document.forms["registration"]["cpassword"].value;
    //Clearing Error
    document.getElementById("lb-email").style["visibility"] = "hidden";
    document.getElementById("lb-pass").style["visibility"] = "hidden";
    document.getElementById("lb-name").style["visibility"] = "hidden";
    document.getElementById("lb-cpass").style["visibility"] = "hidden";
    
    if (userName == "" && passWord == "" && Name == "" && cPassword == "") {
        document.getElementById("lb-email").style["visibility"] = "visible";
        document.getElementById("lb-pass").style["visibility"] = "visible";
        document.getElementById("lb-name").style["visibility"] = "visible";
        document.getElementById("lb-cpass").style["visibility"] = "visible";
        return false;

    } else {
        var status = false;

        if (userName.length < 5 && !!"/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/".match(userName)) {
            document.getElementById("lb-email").style["visibility"] = "visible";
            status = false;
        }else{
            status = true;
        }
        if (passWord.length < 6) {
            document.getElementById("lb-pass").style["visibility"] = "visible";
            status = false;
        }else{
            status = true;
        }
        return status;
    }

}