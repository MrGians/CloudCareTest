const form = document.getElementById("artists-form");
const select = document.getElementById("artist");

form.addEventListener("submit", function (event) {
    event.preventDefault();
    window.location.href = select.value;
});
