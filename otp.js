var l="";
for(var i=0;i<6;i++)
{
    let x = Math.floor((Math.random() * 9) + 1);
    l+=x.toString();
}
function otp(){    
    var settings = {
"async": true,
"crossDomain": true,
"url": `https://www.fast2sms.com/dev/bulkV2?authorization=5vWXkUitWBCHxBoCgCHxjSbh2wiEI492L6VgK0VFxKQ1n98W8ne9zPnkRhXL&variables_values=${l}&route=otp&numbers=${document.getElementById('mobile').value}`,
"method": "GET"
}
$.ajax(settings).done(function (response) {
console.log(response);
});
}
function verify(){
    if (document.getElementById('ot').value==l)
    {
        alert("successfully verified");
        window.location = "enduser.html";
    }
    else{
        alert("invalid otp");
    }
}
