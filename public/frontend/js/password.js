function checkName() {
    do{
        var a = document.getElementById("p1").value;
        var b = document.getElementById("p2").value;
        if (a != b) {
            document.getElementById("p2").style.border = "red solid 1px";
            return false;
        }
        else{
            document.getElementById("p2").style.border = "";
            return true;
        }
    }
    while(true);
}

function validate() {
    if(document.form.p2.value != document.form.p1.value){
        alert('Mật khẩu bạn nhập không trùng khớp!');
        document.form.p2.focus();
        return false;
    }
    return true;
}