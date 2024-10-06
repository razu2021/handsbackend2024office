
// =======   count down code start here ===========
 // Set the upcoming date (year, month, day, hours, minutes, seconds)
// Note: JavaScript months are 0-indexed (0 = January, 11 = December)
const upcomingDate = new Date(2024, 2, 10, 10, 30, 0); // Example: April 10, 2024, 15:30:00

function calculateTimeDifference() {
    const now = new Date();
    const difference = upcomingDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(difference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((difference % (1000 * 60)) / 1000);

    return {days, hours, minutes, seconds};
}


// end 




// preloader code 

// window.addEventListener('load', function() {
//   var preloader = document.getElementById('preloader');
//   preloader.style.display = 'none'; // Hide preloader
//   document.getElementById('content').style.display = 'block'; // Show content
//   document.body.style.overflow = 'auto'; // Re-enable scrolling
// });


/*=========  shor content and full content  */



