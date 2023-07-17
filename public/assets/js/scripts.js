function darkmode(){
    var SetTheme = document.body;
    SetTheme.classList.remove("light-mode")
    SetTheme.classList.add("dark-mode")
    $("a").addClass("dark-mode-a");
    var theme;
    if(SetTheme.classList.contains("dark-mode")){

        theme = "DARK";
    }else{

        theme = "LIGHT";
    }
    // save to localStorage
    localStorage.setItem("PageTheme", JSON.stringify(theme));
    // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}

function lightmode(){
    var SetTheme = document.body;
    SetTheme.classList.remove("dark-mode")
    $("a").removeClass("dark-mode-a")
    SetTheme.classList.add("light-mode")
    var theme;
    if(SetTheme.classList.contains("light-mode")){

        theme = "LIGHT";
    }else{

        theme = "DARK";
    }
    // save to localStorage
    localStorage.setItem("PageTheme", JSON.stringify(theme));
    // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}






function textnormal(){
    var SetTheme = document.body;
    SetTheme.classList.remove("text-increase","text-increase2")
     var theme;

        theme = "";

    // save to localStorage
    localStorage.setItem("PageThemeText", JSON.stringify(theme));
    // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}

function textincrease(){
    var SetTheme = document.body;
    SetTheme.classList.remove("text-increase2")
    SetTheme.classList.add("text-increase")
    var theme;
    if(SetTheme.classList.contains("text-increase")){

        theme = "TextIncrease";
    }
    // save to localStorage
    localStorage.setItem("PageThemeText", JSON.stringify(theme));
    // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}

function textincrease2(){
    var SetTheme = document.body;
    SetTheme.classList.remove("text-increase")
    SetTheme.classList.add("text-increase2")
    var theme;
    if(SetTheme.classList.contains("text-increase2")){

        theme = "TextIncrease2";
    }
    // save to localStorage
    localStorage.setItem("PageThemeText", JSON.stringify(theme));
    // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}







setInterval(() => {
    let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));

    if(GetTheme === "DARK"){
        document.body.classList = "dark-mode";
        $("a").addClass("dark-mode-a");
    } else{
        document.body.classList = "";
        $("a").removeClass("dark-mode-a")
    }

    let GetThemeText = JSON.parse(localStorage.getItem("PageThemeText"));
    if(GetThemeText === "TextIncrease"){
        document.body.classList = document.body.classList+" text-increase";
    } else if(GetThemeText === "TextIncrease2"){
        document.body.classList = document.body.classList+" text-increase2";
    }

}, 5);
