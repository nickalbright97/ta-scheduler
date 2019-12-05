
function get_role() {
    var promise = new Promise((resolve, reject) => {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                resolve(this.responseText);
            }
        };
        xmlhttp.open("GET", "../php/get_role.php", true);
        xmlhttp.send();
    })
    return promise;
}

function ta_route() {

    get_role()
        .then(role =>{
            if (role == "ta_lead") {
                window.location.href = "../ta_lead_schedule.php";
            } else {
                window.location.href = "../ta_schedule.php";
            }
        })
        .catch(err=> {
            console.error(err);
        })

   

}