document.addEventListener('DOMContentLoaded', function() {
  var typed1 = new Typed('#auto_type1', {
    strings: [' Contact Us '],
    typeSpeed: 150,
    backSpeed: 150,
    loop: true,
  });
});



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

function updateCountdown() {
    const timeDifference = calculateTimeDifference();

    // Display the result in an element with id="countdown"
    document.getElementById("countdown").innerHTML = `${timeDifference.days}d ${timeDifference.hours}h ${timeDifference.minutes}m ${timeDifference.seconds}s `;

    // If the countdown is over, write some text 
    if (timeDifference.total <= 0) {
        clearInterval(updateInterval);
        document.getElementById("countdown").innerHTML = "The specified date has arrived!";
    }
}

// Update the countdown every 1 second
const updateInterval = setInterval(updateCountdown, 1000);

// end 










