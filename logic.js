var failed = false;

function normal(id){
    document.getElementById(id).style.borderColor = "#A9A9A9";
    document.getElementById(id).style.borderWidth = "1px";
}

function pass(id){
    document.getElementById(id).style.borderColor = "#33FF00";  
    document.getElementById(id).style.borderWidth = "2px";
}

function fail(id){
    failed = true;
    document.getElementById(id).style.borderColor = "#FF0000";
    document.getElementById(id).style.borderWidth = "2px";
}

function verifyName(id){
    var nameRegex = /^[a-zA-Z]+$/;

    if(nameRegex.test(document.getElementById(id).value)){
        pass(id);
        return true;
    }
    else fail(id);
    return false;
}

function verifyPhone(){
    var phoneRegex = /^\d{3}-?\d{3}-?\d{4}$/g;

    if(phoneRegex.test(document.getElementById("phone").value)){
        pass("phone");
        return true;
    }
    else fail("phone");
    return false;
}

function verifyEmail(){
    var emailRegex = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    
    if(emailRegex.test(document.getElementById("email").value)){
        pass("email");
        return true;
    }
    else fail("email");
    return false;
}

function validateForm(){
    var elements = ["address","city","state","zip","password"];

    verifyName("firstName");
    verifyName("lastName");
    verifyPhone();
    verifyEmail();
    
    for(e in elements){
        if(document.getElementById(elements[e]).value == "" || document.getElementById(elements[e]).value == null) fail(elements[e]);
        else pass(elements[e]);
    }

    var failedTemp = failed;
    failed = false;
    if(!failedTemp) return true;
    return false;
}