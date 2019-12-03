function check_hours() {
    var currDay = new Date();
    var weekDay = currDay.getDay();
    if (weekDay > 0 && weekDay < 5) {
        if(currDay.getHours() >= 17 && currDay.getHours() <= 23) {
            document.getElementById("workin").innerHTML = "The TA's are : IN";
            check_questions();
        } else {
            document.getElementById("workin").innerHTML = "The TA's are : OUT";
            close_hours();
        }



    } else  if (weekDay == 0){

        if(currDay.getHours() >= 13 && currDay.getHours() <= 23) {
            document.getElementById("workin").innerHTML = "The TA's are : IN";
            check_questions();
        } else {
            document.getElementById("workin").innerHTML = "The TA's are : OUT";
            close_hours();
        }

    }

}


function check_questions() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("busy").innerHTML = "There are about " + this.responseText + " questions on the board";
            }
        };  
        xmlhttp.open("GET","php/question.php", true);
        xmlhttp.send();

}

function close_hours() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }    
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };  
        xmlhttp.open("GET","php/question.php?questions=0", true);
        xmlhttp.send();;
}

//check_questions();
check_hours();
set_interval(check_hours, 30 * 60 * 1000);