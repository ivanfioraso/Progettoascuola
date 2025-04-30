document.addEventListener("DOMContentLoaded", function() {
    const cookieBanner = document.getElementById("cookie-banner");
    const acceptButton = document.getElementById("cookie-form");

    // Check if the user has already accepted cookies
    if (!localStorage.getItem("cookiesAccepted")) {
        cookieBanner.style.display = "block"; // Show the banner if not accepted
    }

    // Handle the accept button click
    acceptButton.addEventListener("submit", function(e) {
        e.preventDefault();
        localStorage.setItem("cookiesAccepted", "true"); // Store acceptance in localStorage
        cookieBanner.style.display = "none"; // Hide the banner
    });
});