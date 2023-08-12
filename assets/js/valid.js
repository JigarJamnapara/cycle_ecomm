function validation()
{
if(document.payuForm.amount.value=="")
{
    alert('Please enter ammount here')
    document.payuForm.amount.focus();
    return false;
}

if(document.payuForm.firstname.value=="")
{
    alert('Please enter FirstName here')
    document.payuForm.firstname.focus();
    return false;
}

if(document.payuForm.email.value=="")
{
    alert('Please enter email here')
    document.payuForm.email.focus();
    return false;
}

if(document.payuForm.phone.value=="")
{
    alert('Please enter Mobile number here')
    document.payuForm.phone.focus();
    return false;
}

if(document.payuForm.productinfo.value=="")
{
    alert('Please enter Address here')
    document.payuForm.productinfo.focus();
    return false;
}



}