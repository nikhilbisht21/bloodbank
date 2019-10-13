/*
reponse(e:event,id:string,group:int,hospitalId:string,res:int): Set response for the request
*/

var request = (e,id,group,hospitalId,res) => {
    e.preventDefault();

    $('.btn').attr('disabled','true');

    data = {
        requestId: id,
        group:group,
        hospitalId:hospitalId,
        response:res
    }

    fetch('/server/response.php', {
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

        if(response==='200'){
            $('.res').removeClass('text-info');
            $('.res').addClass('text-success');
            $('#status').html('Approved');
            $('#buttons').hide();
        }else if(response==='300'){
            $('.res').removeClass('text-info');
            $('.res').addClass('text-danger');
            $('#status').html('Rejected');
            $('#buttons').hide();
        }
        else{
            window.location.href="/error.html";
        }
        
        $('.btn').removeAttr('disabled');
    }).catch((err)=>{
        window.location.href="/error.html";
    });

}

/*
printPass(): Print the pass
*/

var printPass=()=>{
    $('.hid').hide();
    window.print();
    $('.hid').show();
}