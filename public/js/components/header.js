d = document;

$btn_desplegable = d.getElementById("menu-log-btn");
$div_desplegable = d.getElementById("menu-log-desplegable")

d.addEventListener("click", (e) => {
    if(e.target.matches("#menu-log-btn") || e.target.matches("#menu-log-btn *")){
        $div_desplegable.classList.toggle("hidden");
    } else {
        $div_desplegable.classList.add("hidden");
    }
});