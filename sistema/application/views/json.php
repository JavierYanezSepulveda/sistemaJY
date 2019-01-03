<!DOCTYPE html>
<html lang="en">
<form action="" method="post" name="FormProcessor">
<b>Domain Name: </b>
<input type="text" name="MAIN_DOMAINNAME" value="" id="DomainField">
<input type="text" name="CONF_FILE" value="" id="ConfFile" style="display:none">
<div id="infomsg">

<script>
$(document).ready (function()
{
    $('#DomainField').blur(function() {
        var DomField=$("#DomainField");
        var DomText=DomField.val();     
        var fold="/var/lib/bind/db.";
        alert(fold+DomText);
        var ConfFile=$("#ConfFile");
        ConfFile.val(fold+DomText);
        ConfFile.show();
    });
});
</script>
