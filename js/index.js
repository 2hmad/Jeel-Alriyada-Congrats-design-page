const input = document.querySelector("input.type");
const text = document.querySelector(".text");
const img = document.querySelector("img");
const button = document.querySelector(".down");

function downloadURI(uri, name) {
    let link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}

function init(styles) {
    text.setAttribute("style", styles.styles);
    input.onkeyup = (e) => (text.innerHTML = e.target.value);
    button.onclick = function(e) {
        e.preventDefault()
        html2canvas(document.querySelector(".container")).then((canvas) => {
            let myImage = canvas.toDataURL("image/png");
            downloadURI("data:" + myImage, "HappyHolidays.png");
        });
    };
}