
// 
var show = document.getElementById('show');
var close = document.getElementById('close');


function toggleMenushow() {
    var menu = document.getElementById('myheader');
    menu.style.display = 'block'; // Show the menu
    close.style.display ="none";
}

function toggleMenuclose() {
    var menu = document.getElementById('myheader');
    menu.style.display = 'none'; // Hide the menu
}





// =============  mobile header fixed in toop 
document.addEventListener('DOMContentLoaded', function() {
    var headerFixed = document.getElementById('mobile__menu');
   
    window.addEventListener('scroll', function() {
        var scrollPosition = window.scrollY || window.pageYOffset;

        // Set the top position of the sidebar based on the scroll position
        if (scrollPosition > 0) {
            headerFixed.style.position = 'fixed';
            headerFixed.style.top = '0';
            headerFixed.style.left = '0';
            
        } else {
            headerFixed.style.position = 'relative';
            headerFixed.style.top = 'auto';
        }
      
    });
});

//  mobile heaer fixed in top end here 





document.addEventListener('DOMContentLoaded', function() {
 
    // Select all dropdown triggers
    var dropdowns = document.querySelectorAll('.main__dropdown .list-link span');

    // Attach click event to each dropdown
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default action

            // Toggle the corresponding submenu display
            var submenu = this.parentNode.nextElementSibling;
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';

            // Toggle the sign from "+" to "-" and vice versa
            this.textContent = this.textContent === '-' ? '+' : '-';

            // Correctly apply the font size to the span element
            this.style.fontSize = "20px";
        });
    });
});








//   scroll top button 

window.onscroll = function() {
    scrollFunction();
    myFunction(); // Ensure this is called to check for the sticky header.
  };
  
  // Get the header
  var header = document.querySelector("#myheader");
  
  // Get the offset position of the navbar
  var sticky = header.offsetTop;
  
  // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
  
  function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      document.getElementById("myBtn").style.display = "block";
    } else {
      document.getElementById("myBtn").style.display = "none";
    }
  }
  
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
  }