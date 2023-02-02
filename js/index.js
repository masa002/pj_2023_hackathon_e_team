//初期表示は非表示
document.getElementById("disp").style.display ="none";

function clickBtn1(){
    const disp = document.getElementById("disp");

    if(disp.style.display=="block"){
        // noneで非表示
        disp.style.display ="none";
    }else{
        // blockで表示
        disp.style.display ="block";
    }
}

function Close(){
    const disp = document.getElementById("disp");

    if(disp.style.display=="block"){
        // noneで非表示
        disp.style.display ="none";
    }else{
        // blockで表示
        disp.style.display ="block";
    }
}

function NowLoading(){
        // loading のdisplayをblockにする
        document.getElementsByClassName("loading").style.display ="block";
}