function check_hours() {
    var currDay = new Date();
    var weekDay = currDay.getDay();
    if (weekDay > 0 && weekDay < 5) {
        if(currDay.getHours() >= 17 && currDay.getHours() <= 23) {
            document.getElementById("workin").innerHTML = "The TA's are : IN";
        } else {
            document.getElementById("workin").innerHTML = "The TA's are : OUT";
        }



    } else  if (weekDay == 0){

        if(currDay.getHours() >= 13 && currDay.getHours() <= 23) {
            document.getElementById("workin").innerHTML = "The TA's are : IN";
        } else {
            document.getElementById("workin").innerHTML = "The TA's are : OUT";
        }

    }

}

check_hours();