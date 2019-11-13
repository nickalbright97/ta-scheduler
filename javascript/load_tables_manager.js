function load_ta_table() {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ta_table").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","php/ta_pref.php",true);
    xmlhttp.send();
}

function load_survey_resp_tables() {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("survey_resp").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","http://127.0.0.1:8000/php/display_survey.php",true);
    xmlhttp.send();
}


load_ta_table();
load_survey_resp_tables();


function load_survey_resp_tables_date($event) {
    event.preventDefault();
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("survey_resp").innerHTML = this.responseText;
        }
    };  

    date = document.getElementById("date").value ;
    xmlhttp.open("GET","http://127.0.0.1:8000/php/display_survey.php?date=" + date, true);
    xmlhttp.send();
}




