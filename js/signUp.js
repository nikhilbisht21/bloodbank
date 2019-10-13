/*
Capitalize user Input
*/

var capitalize=(text)=>{
    let tmp=text.split(' ');

    for(let i=0;i<tmp.length;++i){
        tmp[i]=tmp[i][0].toUpperCase()+tmp[i].substring(1);
    }

    return tmp.join(' ');
}

/*
changeRegister(index:number): Changes the forms on registration page
*/

var changeRegister = (index) => {
    
    $('.error').html('');
    $('.error').hide();

    if (!index) {
        $("#mainA").hide();
        $("#mainB").show();
    } else {
        $("#mainB").hide();
        $("#mainA").show();
    }

}


/*
validate(): Validate uniqueness of email and mobile
*/

var validate=(e)=>{

    if(!e.target.value){
        return;
    }

    $('.submit').attr('disabled', 'true');
    $('.error').hide();

    let data={};
    data['name']=e.target.name;
    data['value']=e.target.value;

    fetch('/server/validate.php', {
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
    }).then((response) => response.text()).then((res) => {

        // alert(res);

        if (res!== '200') {
            e.target.value='';
            $('.error').html(e.target.name==='email'?'Email Id already exists':'Mobile number already exists');
            $('.error').show();
        }

        $(".submit").removeAttr('disabled');
    }).catch((err) => {
        // alert(err);
        window.location.replace('/error.html');
    });
    
}

/*
signUp(e:event): Send registration data to server
*/

var signUp = (e) => {
    e.preventDefault();
    eId = e.target.id === 'formR' ? '#error1' : "#error2";

    if (e.target.pass1.value !== e.target.pass2.value) {
        $(".pass1").val('');
        $(".pass2").val('');
        $('.error').html("Password didn't matched");
        $('.error').show();
        return;
    }

    $('.submit').attr('disabled', 'true');
    $('.error').hide();

    // R: Receiver
    // H: Hospital

    let data = {
        type: e.target.id === 'formR' ? 'R' : 'H',
        name: capitalize(e.target.uname.value),
        dob: e.target.id === 'formR' ? e.target.dob.value : '',
        gen: e.target.id === 'formR' ? e.target.gender.value : '',
        city: e.target.id === 'formR' ? '' : capitalize(e.target.city.value),
        state: e.target.id === 'formR' ? '' : capitalize(e.target.state.value),
        group: e.target.type.value,
        mobile:e.target.mobile.value,
        email: e.target.email.value,
        pass: e.target.pass2.value
    }

    fetch('/server/signUp.php', {
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

        alert(response);

        if (response === '200') {
            window.location.replace('/receiver.php');
        }
        else if (response === '201') {
            window.location.replace('/hospital.php');
        } else if (response === '400') {
            $('.error').html('An error occured');
            $('.error').show();
        }
        else {
            $('.error').html('An error occured');
            $('.error').show();
        }

        $(".submit").removeAttr('disabled');
    }).catch((err) => {
        //alert(err);
        window.location.replace('/error.html');
    });
}
