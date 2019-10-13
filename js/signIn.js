/*
signIn(e:event): Send credentials to server for use Sign In
*/

var signIn = (e) => {
    e.preventDefault();
    $('#error').hide();
    $('#submit').attr('disabled', 'true');

    let data = {
        email: e.target.email.value,
        pass: e.target.pass.value
    }

    fetch('/server/signIn.php', {
        method: "POST",
        mode: "cors",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
            // "Content-Type": "application/x-www-form-urlencoded",
        },
        redirect: "follow",
        referrer: "no-referrer",
        body: JSON.stringify(data)
    }).then((response) => response.text()).then((response) => {

        // alert(response);

        if (response === '200') {
            window.location.replace('/receiver.php');
        }
        else if (response === '201') {
            window.location.replace('/hospital.php');
        } else if (response === '403') {
            $('#error').html('Invalid Username or Password');
            $('#error').show();
        }
        else {
            $('#error').html('An error occured');
            $('#error').show();
        }

        $("#submit").removeAttr('disabled');
    }).catch((err) => {
        // alert(err);
        window.location.replace('/error.html');
    });
}


