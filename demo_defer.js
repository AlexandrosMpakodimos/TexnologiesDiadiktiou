window.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("success") === "1") {
        alert("Η εγγραφή ήταν επιτυχής!");
        window.history.replaceState(null, "", window.location.pathname);
    }
});

const form = document.querySelector(".register-form");

form.addEventListener("submit", function(event) {
    const firstname = document.getElementById("firstname").value.trim();
    const lastname = document.getElementById("lastname").value.trim();
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!firstname || !lastname || !username || !email || !password) {
        alert("Όλα τα πεδία είναι υποχρεωτικά!");
        event.preventDefault(); 
    }
});
