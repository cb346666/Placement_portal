
    // JavaScript code to highlight active link
    document.addEventListener("DOMContentLoaded", function() {
      // Get current page URL
      var currentUrl = window.location.href;

      // Select all anchor tags inside navbar-side
      var navLinks = document.querySelectorAll(".navbar-side a");

      // Loop through each anchor tag
      navLinks.forEach(function(link) {
          // Check if the anchor tag's href matches the current URL
          if (link.href === currentUrl) {
              // Add 'link-active' class to the link
              link.classList.add("link-active");
          }
      });
      $(document).ready(function() {
          $("#navBtn").click(function() {
              $(".main").toggleClass('animate');
          });
  });
  
  });