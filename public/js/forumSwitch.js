function shows_form_part(n){
    var i = 1, p = document.getElementById("form_part"+1);
    while (p !== null){
        if (i === n){
            p.style.display = "";
        }
        else{
            p.style.display = "none";
        }
        i++;
        p = document.getElementById("form_part"+i);
    }
}