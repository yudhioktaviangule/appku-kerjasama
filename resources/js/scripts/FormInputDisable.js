

export default function DisableEnter(onKey13=()=>{return null}){
    $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            onKey13();
            return false;
        }
    });
    $('form select').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            onKey13();
            return false;
        }
    });
    $('form textarea').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            onKey13();
            return false;
        }
    });

}
