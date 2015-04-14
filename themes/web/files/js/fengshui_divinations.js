function ShowTabFengshui(id) {
    var divAgeBuildHome = document.getElementById('divAgeBuildHome');
    var divHomeDirection = document.getElementById('divHomeDirection');
    var divHomeDirectionResult = document.getElementById('divHomeDirectionResult');
    var divAgeBuildHomeResult = document.getElementById('divAgeBuildHomeResult');
    var radioHomeDirection = document.getElementById('rdoHomeDirection');
    var radioAgeBuildHome = document.getElementById('rdoAgeBuildHome');
    var tagHidden = document.getElementById('hdSelectedFengshuiResult');

    var lbAgeBuildHomeResult = document.getElementById('lbAgeBuildHomeResult');
    var lbHomeDirectionResult = document.getElementById('lbHomeDirectionResult');

    switch (id) {
        case "0":
            divAgeBuildHomeResult.style.display = "none";
            divHomeDirectionResult.style.display = "none";
            break;
        case "1":
            divAgeBuildHome.style.display = "block";
            divHomeDirection.style.display = "none";
            if (tagHidden.value != 0 && $("#lbAgeBuildHomeResult").text() != '')
                divAgeBuildHomeResult.style.display = "block";
            else
                divAgeBuildHomeResult.style.display = "none";

            divHomeDirectionResult.style.display = "none";
            radioAgeBuildHome.setAttribute("checked", "checked");
            radioHomeDirection.removeAttribute("checked");

            break;
        case "2":
            divAgeBuildHome.style.display = "none";
            divHomeDirection.style.display = "block";
            if (tagHidden.value != 0 && $("#lbHomeDirectionResult").text() != '')
                divHomeDirectionResult.style.display = "block";
            else
                divHomeDirectionResult.style.display = "none";

            divAgeBuildHomeResult.style.display = "none";
            radioHomeDirection.setAttribute("checked", "checked");
            radioAgeBuildHome.removeAttribute("checked");
            break;
    }
}

function SetBackground(tr, haveBackground) {
    if(haveBackground= true) {
        tr.className = "mouse-over";
    } else {
        tr.className = "";
    }
}