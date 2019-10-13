var toggleIndex = [false, false];

/*
toggle(): Function to toggle the hospitals lists under different Blood Groups
*/

var toggle = (index) => {

    let id = "#list" + index;
    let tId = "#t" + index;
    let i = index - 1;

    $(id).slideToggle();
    toggleIndex[i] = !toggleIndex[i];

    if (toggleIndex[i]) {
        $(tId + 2).hide();
        $(tId + 1).show();
    } else {
        $(tId + 1).hide();
        $(tId + 2).show();
    }
}

/*
addSamples(e:event): Add blood sampels to database;
*/


var addSamples = (e) => {
    e.preventDefault();

    $('#submit').attr('disabled', 'true');
    $('#alert').hide();

    data = {
        group: e.target.blood.value,
        quantity: e.target.quantity.value
    }

    fetch('/server/samples.php', {
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

        //alert(response);

        let group = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        let grp = $('#blood').val();
        let quant = parseInt($('#quant').val(),10);

        if (response === '200') {
            $('#bg' + grp).html(parseInt($('#bg'+grp).html(), 10) + quant);
            $('.stats').html(parseInt($('.stats').html(), 10) + quant);
            $('#alertA').html('You have contributed ' + quant + ' ' + group[grp - 1] + ' blood samples');
            $('#alert').addClass('text-success');
            $('#alert').show();
        }
        else {
            $('#alertA').html('Sorry, Try again');
            $('#alert').addClass('text-danger');
            $('#alert').show();
        }

        $("#submit").removeAttr('disabled');
    }).catch((err) => {
        // alert(err);
        window.location.replace('/error.html');
    });
}