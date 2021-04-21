function LoginFieldValidation() {
    var userName = document.forms["login"]["userName"].value;
    var passWord = document.forms["login"]["password"].value;
    //Clearing Error
    document.getElementById("lb-email").style["visibility"] = "hidden";
    document.getElementById("lb-pass").style["visibility"] = "hidden";

    if (userName == "" && passWord == "") {
        document.getElementById("lb-email").style["visibility"] = "visible";
        document.getElementById("lb-pass").style["visibility"] = "visible";
        return false;

    } else {
        var status = false;

        if (userName.length < 5) {
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