var m3_enabled = false;
// validation to disable 3m field
var func2m = function () {
        m3_enabled = false;
        document.getElementById("fnm3").setAttribute("disabled", true);
        document.getElementById("lnm3").setAttribute("disabled", true);
        document.getElementById("emailm3").setAttribute("disabled", true);
        document.getElementById("colgm3").setAttribute("disabled", true);
        document.getElementById("stdnom3").setAttribute("disabled", true);
        document.getElementById("branchm3").setAttribute("disabled", true);
        document.getElementById("yrm3").setAttribute("disabled", true);
        document.getElementById("mobm3").setAttribute("disabled", true);
        document.getElementById("fnm3").setAttribute("required", "");
        document.getElementById("lnm3").removeAttribute("required");
        document.getElementById("emailm3").removeAttribute("required");
        document.getElementById("colgm3").removeAttribute("required");
        document.getElementById("stdnom3").removeAttribute("required");
        document.getElementById("branchm3").removeAttribute("required");
        document.getElementById("yrm3").removeAttribute("required");
        document.getElementById("mobm3").removeAttribute("required");
        document.getElementById("othm3").removeAttribute("required");
    }
    // validation to enable 3m field
var func3m = function () {
        m3_enabled = true;
        document.getElementById("fnm3").disabled = false;
        document.getElementById("lnm3").disabled = false;
        document.getElementById("emailm3").disabled = false;
        document.getElementById("colgm3").disabled = false;
        document.getElementById("stdnom3").disabled = false;
        document.getElementById("branchm3").disabled = false;
        document.getElementById("yrm3").disabled = false;
        document.getElementById("mobm3").disabled = false;
        //setting as required
        document.getElementById("fnm3").setAttribute("required", "");
        document.getElementById("lnm3").setAttribute("required", "");
        document.getElementById("emailm3").setAttribute("required", "");
        document.getElementById("colgm3").setAttribute("required", "");
        document.getElementById("stdnom3").setAttribute("required", "");
        document.getElementById("branchm3").setAttribute("required", "");
        document.getElementById("yrm3").setAttribute("required", "");
        document.getElementById("mobm3").setAttribute("required", "");
        document.getElementById("othm3").setAttribute("required", "");
    }
    // validations to enable oth field
var flagm1oth = false;
var flagm2oth = false;
var flagm3oth = false;
var disable_othm1 = function () {
    var value = document.getElementById("colgm1").value;
    if (value == 1) {
        document.getElementById("othm1").disabled = true;
        document.getElementById("latm1").disabled = false;
        document.getElementById("stdnom1").disabled = false;
    }
    if (value == 2) {
        flagm1oth = true;
        document.getElementById("othm1").disabled = false;
        document.getElementById("latm1").disabled = true;
        document.getElementById("stdnom1").disabled = true;
    }
}
var disable_othm2 = function () {
    var value = document.getElementById("colgm2").value;
    if (value == 1) {
        document.getElementById("othm2").disabled = true;
        document.getElementById("latm2").disabled = false;
        document.getElementById("stdnom2").disabled = false;
    }
    if (value == 2) {
        flagm2oth = true;
        document.getElementById("othm2").disabled = false;
        document.getElementById("latm2").disabled = true;
        document.getElementById("stdnom2").disabled = true;
    }
}
var disable_othm3 = function () {
    var value = document.getElementById("colgm3").value;
    if (value == 1) {
        document.getElementById("othm3").disabled = true;
        document.getElementById("latm3").disabled = false;
        document.getElementById("stdnom3").disabled = false;
    }
    if (value == 2) {
        flagm3oth = true;
        document.getElementById("othm3").disabled = false;
        document.getElementById("latm3").disabled = true;
        document.getElementById("stdnom3").disabled = true;
    }
}

// overall validation 
var Validation_m = function (form) {
    var form = true;
    // member data for 1st member
    var fnm1 = document.getElementById("fnm1").value;
    var lnm1 = document.getElementById("lnm1").value;
    var emailm1 = document.getElementById("emailm1").value;
    var colgm1 = document.getElementById("colgm1").value;
    var stdnom1 = document.getElementById("stdnom1").value;
    var branchm1 = document.getElementById("branchm1").value;
    var yrm1 = document.getElementById("yrm1").value;
    var mobm1 = document.getElementById("mobm1").value;
    // member data for 2nd member
    var fnm2 = document.getElementById("fnm2").value;
    var lnm2 = document.getElementById("lnm2").value;
    var emailm2 = document.getElementById("emailm2").value;
    var colgm2 = document.getElementById("colgm2").value;
    var stdnom2 = document.getElementById("stdnom2").value;
    var branchm2 = document.getElementById("branchm2").value;
    var yrm2 = document.getElementById("yrm2").value;
    var mobm2 = document.getElementById("mobm2").value;
    //initiative category
    var catm = document.getElementById("category").value;
    // reg expressions
    var reg_n = /^[A-Za-z ]{1,}$/;
    var reg_con = /^[0-9]{10}$/;
    var reg_mail = /^([A-Za-z0-9_\-\.]{1,})\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z\.]{2,5})$/;
    var reg_std_lat = /^[0-9]{7}[DL]{1}$/;
    //validations for m1 and m2
    if (reg_n.test(fnm1) == false) //validating First Name m1
    {
        document.getElementById("fnm1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("fnm1").focus();
        form = false;
    }
    if (reg_n.test(fnm2) == false) //validating First Name m2
    {
        document.getElementById("fnm2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("fnm2").focus();
        form = false;
    }
    if (reg_n.test(lnm1) == false) //validating last Name m1
    {
        document.getElementById("errlnm1").setAttribute("style", "visibility:visible");
        document.getElementById("lnm1").focus();
        form = false;
    }
    if (reg_n.test(lnm2) == false) //validating last Name m2
    {
        document.getElementById("lnm2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("lnm2").focus();
        form = false;
    }
    if (flagm1oth == false) {
        if (document.getElementById("latm1").checked) {
            if (reg_std_lat.test(stdnom1) == false) {
                document.getElementById("stdnom1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom1").focus();
                form = false;
            }
        } else {
            if (stdnom1.isNaN === true || stdnom1.length !== 7) //validating Student Number m1
            {
                document.getElementById("stdnom1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom1").focus();
                form = false;
            }
        }
    }
    if (flagm2oth == false) {
        if (document.getElementById("latm2").checked) {
            if (reg_std_lat.test(stdnom2) == false) {
                document.getElementById("stdnom2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom2").focus();
                form = false;
            }
        } else {
            if (stdnom2.isNaN === true || stdnom2.length !== 7) //validating Student Number m1
            {
                document.getElementById("stdnom2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom2").focus();
                form = false;
            }
        }
    }
    if (reg_mail.test(emailm1) == false) //validating mail id for m1
    {
        document.getElementById("emailm1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("emailm1").focus();
        form = false;
    }
    if (reg_mail.test(emailm2) == false) //validating mail id for m1
    {
        document.getElementById("emailm2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("emailm2").focus();
        form = false;
    }
    if (reg_con.test(mobm1) == false) //validating contact number m1
    {
        document.getElementById("mobm1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("mobm1").focus();
        form = false;
    }
    if (reg_con.test(mobm2) == false) //validating contact number m2
    {
        document.getElementById("mobm2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("mobm2").focus();
        form = false;
    }
    //special cases
    if (stdnom1 === stdnom2 && (flagm1oth != true && flagm2oth != true)) { //stdnom1 not same as stdnom2
        document.getElementById("stdnom1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("stdnom1").focus();
        document.getElementById("stdnom2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("stdnom2").focus();
        form = false;
    }
    if (mobm1 === mobm2) {
        document.getElementById("mobm1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("mobm1").focus();
        document.getElementById("mobm2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
        document.getElementById("mobm2").focus();
        form = false;
    }
    if (m3_enabled) //validating m3
    { // member data for 3rd member
        var fnm3 = document.getElementById("fnm3").value;
        var lnm3 = document.getElementById("lnm3").value;
        var emailm3 = document.getElementById("emailm3").value;
        var colgm3 = document.getElementById("colgm3").value;
        var stdnom3 = document.getElementById("stdnom3").value;
        var branchm3 = document.getElementById("branchm3").value;
        var yrm3 = document.getElementById("yrm3").value;
        var mobm3 = document.getElementById("mobm3").value;
        if (reg_n.test(fnm3) == false) //validating First Name m1
        {
            document.getElementById("fnm3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
            document.getElementById("fnm3").focus();
            form = false;
        }
        if (reg_n.test(lnm3) == false) //validating last Name m1
        {
            document.getElementById("lnm3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
            document.getElementById("lnm3").focus();
            form = false;
        }
        if (reg_mail.test(emailm3) == false) //validating mail id for m3
        {
            document.getElementById("emailm3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
            document.getElementById("emailm3").focus();
            form = false;
        }
        if (reg_con.test(mobm3) == false) //validating contact number m3
        {
            document.getElementById("mobm3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
            document.getElementById("mobm3").focus();
            form = false;
        }
        if (flagm3oth == false) {
            if (document.getElementById("latm3").checked) {
                if (reg_std_lat.test(stdnom3) == false) {
                    document.getElementById("stdnom3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                    document.getElementById("stdnom3").focus();
                    form = false;
                }
            } else {
                if (stdnom3.isNaN === true || stdnom3.length !== 7) //validating Student Number m3
                {
                    document.getElementById("stdnom3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                    document.getElementById("stdnom3").focus();
                    form = false;
                }
            }
            //special case stdnom3 not same as m1 or m2
            if (stdnom3 === stdnom2 && (flagm2oth != true && flagm3oth != true)) {
                document.getElementById("stdnom3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom3").focus();
                document.getElementById("stdnom2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom2").focus();
                form = false;
            }
            if (stdnom3 === stdnom1 && (flagm1oth != true && flagm3oth != true)) {
                document.getElementById("stdnom1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom1").focus();
                document.getElementById("stdnom3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("stdnom3").focus();
                form = false;
            }
            //verifying mobm1 m3 m2
            if (mobm3 === mobm2) {
                document.getElementById("mobm3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("mobm3").focus();
                document.getElementById("mobm2").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("mobm2").focus();
                form = false;
            }
            if (mobm3 === mobm1) {
                document.getElementById("mobm3").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("mobm3").focus();
                document.getElementById("mobm1").setAttribute("style", "border-bottom: 1px solid #F44336;box-shadow: 0 1px 0 0 #F44336;");
                document.getElementById("mobm1").focus();
                form = false;
            }
        }
    }
    if (form === false) //final check
    {
        alert("Submission failed!");
        return false;
    }
}