var user = [
    {
        name: "Van A",
        phone: "123",
        month: 1,
        day: 1,
        year: 1,
    },
]


function readForm() {
    var name = document.form1.name.value;
    var phone = document.form1.phone.value;
    var day = document.form1.day.value;
    var month = document.form1.month.value;
    var year = document.form1.year.value;
    user.push({name, phone, day, month, year});
}

function reset(formName) {
    document.formName.reset();
}

function valid_email() {
    var emailID = document.form1.phone.value;
    var atpos = emailID.indexOf("@");
    var dotpos = emailID.lastIndexOf(".");

    var dot = 0;
    for(var i = 0; i< emailID.length - 1; i++){
        if(emailID[i] == "."){
            dot ++;
        }
    }

    if(atpos < 1 || (dotpos - atpos < 2) || dot > 1) {
        alert("Correct your email address!");
        document.form1.phone.focus();
        return false;
    }
    
    return( true );
}

function validate() {

    if(document.form1.name.value == "") {
        alert("Enter your name!");
        document.form1.name.focus();
        return false;
    }
    if(document.form1.phone.value == "") {
        alert("Nhap email cua ban!");
        document.form1.phone.focus();
        return false;
    }
    return (true);
}
function checkName() {
    do{
        var a = document.getElementById("id2").value;
        if (a === "") {
            document.getElementById("id2").style.border = "red solid 1px";
            return false;
        }
        else{
            document.getElementById("id2").style.border = "";
            return true;
        }
    }
    while(true);
}
 function checkEmail() {
    do{
        var a = document.getElementById("id1").value;
        var at = a.indexOf("@");
        var dot = a.lastIndexOf(".");
        if(at < 1 || (dot - at < 2) ){
            document.getElementById("id1").style.border = "red solid 1px";
            return false;
        }
        else {
            document.getElementById("id1").style.border = "";
            return true;
        }
    }
    while(true);
 }

 function secureInput(id) {
    document.getElementById(id).style.border = "";
 }