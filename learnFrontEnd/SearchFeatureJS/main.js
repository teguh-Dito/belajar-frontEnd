const searchlnput = document.getElementById("search-input");
const list = document.getElementById("list");
const listltems = list.getElementsByTagName("li");

searchlnput. addEventListener("keyup" , function (e) {
    const listTerm = e.target.value.toLowerCase();
    for (let i = 0; i < listltems.length; i++) {
        const text = listltems[i] .textContent .toLowerCase();
        if (text. includes(listTerm)) {
            listltems[i].style.display = "block";
        } else {
            listltems[i].style.display = "none";
        }
    }
});
