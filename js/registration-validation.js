function Clear() {
    $('#name').val("");
    $('#username').val("");
    $('#password').val("");
    $('#cpassword').val("");
    $('#errmsg').html("");
    document.getElementById("lb-email").style["visibility"] = "hidden";
    document.getElementById("lb-pass").style["visibility"] = "hidden";
    document.getElementById("lb-name").style["visibility"] = "hidden";
    document.getElementById("lb-cpass").style["visibility"] = "hidden";
}
function RegistrationFieldValidation() {
    var Name = $('#name').val();
    var userName = $('#username').val();
    var password = $('#password').val();
    var cPassword = $('#cpassword').val();

    //Clearing Error
    document.getElementById("lb-email").style["visibility"] = "hidden";
    document.getElementById("lb-pass").style["visibility"] = "hidden";
    document.getElementById("lb-name").style["visibility"] = "hidden";
    document.getElementById("lb-cpass").style["visibility"] = "hidden";


    var status = "";

    var regEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var regPhone = /(^(013)|^(014)|^(015)|^(016)|^(017)|^(018)|^(019)){1}\d{8}/;

    if (Name.length < 3) {
        document.getElementById("lb-name").style["visibility"] = "visible";
        status = "name";
    }
    if (!(userName.toString()).match(regEmail) && (!(userName.toString()).match(regPhone) || userName.length > 11)) {
        document.getElementById("lb-email").style["visibility"] = "visible";
        status = "useraname";
    }
    if (password.length < 6) {
        document.getElementById("lb-pass").style["visibility"] = "visible";
        status = "pass";
    }
    if (cPassword != password) {
        document.getElementById("lb-cpass").style["visibility"] = "visible";
        status = "cpass";
    }
    if (status == "") {
        AddUser(Name, userName, password);
    }

}

function AddUser(name, uname, pass) {
    var catname = "addsuer";
    $.ajax({
        url: "/control/registration-validation.php",
        type: 'POST',
        data: {
            addUser: catname,
            name: name,
            uname: uname,
            pass: pass
        },
        success: function (data, status) {
            $('#errmsg').html(data);
        }
    });
    return false;
}