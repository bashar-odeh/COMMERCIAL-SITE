function request(btn, req_type, file, data) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.response);
        if (this.response === 'empty') {
            swal("sorry!", "you have to fill every field  !", "warning");

        } else if (this.response === 'exist') {
            swal("sorry!", "This account Already exists  !", "warning");

        } else {
            swal({
                    title: "Account Added",
                    text: "Move to the next step!!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Go to the next page", {
                            icon: "success",
                        });
                        setInterval(() => {
                            window.location.href = 'http://localhost//CarRentingWebSite/signCar/signCarPictures.php?car_id=' + this.response;

                        }, 1000);
                    }
                });
        }
    };
    xhttp.open(req_type, file, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);

}