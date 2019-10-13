var toggleIndex=[false,false];


/*
toggle(): Function to toggle the hospitals lists under different Blood Groups
*/

var toggle=(index)=>{
    
    let id="#list"+index;
    let tId="#t"+index;
    let i=index-1;

    $(id).slideToggle();
    toggleIndex[i]=!toggleIndex[i];
    
    if(toggleIndex[i]){
        $(tId+2).hide();
        $(tId+1).show();
    }else{
        $(tId+1).hide();
        $(tId+2).show();
    }
}


/*
cancelRequest(e:event,id:string): Cancel request to hospital for blood samples
*/

var cancelRequest = (e,id) => {
    e.preventDefault();
    
    let btn='#'+e.target.id;

    data = {
        requestId: id
    }

    fetch('/server/cancel.php', {
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
    }).catch((err)=>{
        // alert(err);
        window.location.replace('/error.html');
    });

    $(btn).html('Request Cancelled');
    $(btn).attr('disabled','true');
}