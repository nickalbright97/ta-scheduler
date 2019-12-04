function load_incoming_reqs() {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("requests").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","php/manager_shifts.php",true);
    xmlhttp.send();
}

load_incoming_reqs();