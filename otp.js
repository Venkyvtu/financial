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
"url": `https://www.fast2sms.com/dev/bulkV2?authorization=oQwWEu7ial5nOI0rHmcvpfVCdDZUt3Pk2b8hGeBY4FXLTKg6sM7VJXe03oM4i2HlYSxOrNyzmUGRtsTC&variables_values=${l}&route=otp&numbers=${document.getElementById('mobile').value}`,
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
