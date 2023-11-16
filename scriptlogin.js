document.addEventListener("DOMContentLoaded", function () {
    const loginLink = document.querySelector(".login");
    const overlay = document.querySelector(".overlay");
    const closeButton = document.querySelector(".silang img");
    const loginButton = document.querySelector(".sec2 input");
  
    // Show the overlay when the login link is clicked
    loginLink.addEventListener("click", function () {
      overlay.classList.add("active");
    });
  
    // Close the overlay when the close button is clicked
    closeButton.addEventListener("click", function () {
      overlay.classList.remove("active");
    });
  
    // Close the overlay when clicking outside the login box
    window.addEventListener("click", function (event) {
      if (event.target === overlay && !overlay.contains(event.target)) {
        overlay.classList.remove("active");
      }
    });
  
    // Handle login button click
    loginButton.addEventListener("click", function () {
        // Navigate to the desired page (replace 'targetPage.html' with your actual page name)
        window.location.href = 'index2.php';
      });
    });
  