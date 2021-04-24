
function ClearError() {
    $('#lb-name').css('visibility', 'hidden');
    $('#lb-username').css('visibility', 'hidden');
    $('#lb-pass').css('visibility', 'hidden');
    $('#lb-email').css('visibility', 'hidden');
    $('#lb-contact').css('visibility', 'hidden');
    $('#lb-dob').css('visibility', 'hidden');
    $('#lb-gender').css('visibility', 'hidden');
    $('#lb-join').css('visibility', 'hidden');
    $('#lb-salary').css('visibility', 'hidden');
    $('#lb-address').css('visibility', 'hidden');
}




/////////_________DaTaBase Part___[AJAX]__________///////


function ReadRecords() {
    var record = "record";
    $.ajax({
        url: "/control/admin-page-data-connector.php",
        type: 'POST',
        data: {
            viewEmp: record
        },
        success: function (data, status) {
            $('#view-content').html(data);
            ClearError();
        }
    });
}

function AddData() {
    var empname = $('#emp-name').val();
    var username = $('#username').val();
    var emppass = $('#emp-pass').val();
    var empemail = $('#emp-email').val();
    var empcontact = $('#emp-contact').val();
    var empdob = $('#emp-dob').val();
    var empgender = $("input[name='gender']:checked").val();
    var empjoin = $('#emp-join').val();
    var empsalary = $('#emp-salary').val();
    var empaddress = $('#emp-address').val();
    var okay = false;
    ClearError();

    (empname.length < 3) ? ($('#lb-name').css('visibility', 'visible'), okay = false) : (okay = true);
    (username.length < 5) ? ($('#lb-username').css('visibility', 'visible'), okay = false) : (okay = true);
    (emppass.length < 6) ? ($('#lb-pass').css('visibility', 'visible'), okay = false) : (okay = true);
    (!(empemail.toString()).match(/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i)) ? ($('#lb-email').css('visibility', 'visible'), okay = false) : (okay = true);
    (!(empcontact.toString()).match(/(^(013)|^(014)|^(015)|^(016)|^(017)|^(018)|^(019)){1}\d{8}/) || empcontact.length > 11) ? ($('#lb-contact').css('visibility', 'visible'), okay = false) : (okay = true);
    (empdob == "") ? ($('#lb-dob').css('visibility', 'visible'), okay = false) : (okay = true);
    ($("input[name='gender']:checked").val() == null) ? ($('#lb-gender').css('visibility', 'visible'), okay = false) : (okay = true);
    (empjoin == "") ? ($('#lb-join').css('visibility', 'visible'), okay = false) : (okay = true);
    (!(empsalary.toString()).match(/^[0-9]+$/g) || empsalary == 0 || empsalary.length < 4) ? ($('#lb-salary').css('visibility', 'visible'), okay = false) : (okay = true);
    (empaddress.length < 6) ? ($('#lb-address').css('visibility', 'visible'), okay = false) : (okay = true);


    if (okay) {
        var requestFor = "add";
        $.ajax({
            url: "/control/admin-page-data-connector.php",
            type: 'POST',
            data: {
                addSalespersonData: requestFor,
                empname: empname,
                username: username,
                emppass: emppass,
                empemail: empemail,
                empcontact: empcontact,
                empdob: empdob,
                empgender: empgender,
                empjoin: empjoin,
                empsalary: empsalary,
                empaddress: empaddress
            },
            success: function (data, status) {
                alert(data);
                ReadRecords();
                ClearData();
            }
        });
        return false;
    }
}

function FillData(eId, eName, username, password, email, Contact, dob, gender, joinDate, salary, address, fUid) {
    $('#emp-name').val(eName);
    $('#emp-id').val(eId);
    $('#emp-fuid').val(fUid);
    $('#username').val(username);
    $('#emp-pass').val(password);
    $('#emp-email').val(email);
    $('#emp-contact').val(Contact);
    $('#emp-dob').val(dob);
    $("input[name='gender'][value=" + gender + "]").prop('checked', true);
    $('#emp-join').val(joinDate);
    $('#emp-salary').val(salary);
    $('#emp-address').val(address);


    ClearError()

    $('#emp-add').css("display", "none");
    $('#update-data').css("display", "block");
    $('#clear-data').css("display", "block");
}

function ClearData() {
    $('#emp-name').val("");
    $('#username').val("");
    $('#emp-pass').val("");
    $('#emp-email').val("");
    $('#emp-contact').val("");
    $('#emp-dob').val("");
    $('#emp-join').val("");
    $('#emp-salary').val("");
    $('#emp-address').val("");

    $('#emp-add').css("display", "block");
    $('#update-data').css("display", "none");
    $('#clear-data').css("display", "none");

}

function UpdateData() {

    var empname = $('#emp-name').val();
    var username = $('#username').val();
    var emppass = $('#emp-pass').val();
    var empemail = $('#emp-email').val();
    var empcontact = $('#emp-contact').val();
    var empdob = $('#emp-dob').val();
    var empgender = $("input[name='gender']:checked").val();
    var empjoin = $('#emp-join').val();
    var empsalary = $('#emp-salary').val();
    var empaddress = $('#emp-address').val();
    var empid = $('#emp-id').val();
    var empfuid = $('#emp-fuid').val();
    var okay = false;
    if (empname == "" || username == "" || emppass == "" || empemail == "" || empcontact == "" || empdob == "" || empgender == "" || empjoin == "" || empsalary == "" || empaddress == "") {
        okay = false;
    } else {
        okay = true;
    }
    if (okay) {
        var requestFor = "update";
        $.ajax({
            url: "/control/admin-page-data-connector.php",
            type: 'POST',
            data: {
                updateSalespersonData: requestFor,
                empname: empname,
                username: username,
                emppass: emppass,
                empemail: empemail,
                empcontact: empcontact,
                empdob: empdob,
                empgender: empgender,
                empjoin: empjoin,
                empsalary: empsalary,
                empaddress: empaddress,
                empfuid: empfuid,
                empid: empid
            },
            success: function (data, status) {
                alert(data);
                ClearData();
                ReadRecords();
            }
        });
        return false;
    }
}

function DeleteData(eid, fuid) {
    var stat = "delete";
    var confimDel = confirm("Are you Sure Want To Delete?");
    if (confimDel == true) {
        $.ajax({
            url: "/control/admin-page-data-connector.php",
            type: 'POST',
            data: {
                deleteSalespersonData: stat,
                eid: eid,
                fuid: fuid
            },
            success: function (data, status) {
                alert(data);
                ReadRecords();
                ClearError();
                ClearData();
            }
        });
    }
}