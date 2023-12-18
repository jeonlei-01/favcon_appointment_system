

// ------ for calendar -------------
const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
"August", "September", "October", "November", "December"];

const renderCalendar = () => {
let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
let liTag = "";

for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
}

for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
    // adding active class to li if the current day, month, and year matched
    let isToday = i === date.getDate() && currMonth === new Date().getMonth()
        && currYear === new Date().getFullYear() ? "active" : "";
    liTag += `<li class="${isToday}">${i}</li>`;
}

for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
}
currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
icon.addEventListener("click", () => { // adding click event on both icons
    // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

    if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
        // creating a new date of current year & month and pass it as date value
        date = new Date(currYear, currMonth, new Date().getDate());
        currYear = date.getFullYear(); // updating current year with new date year
        currMonth = date.getMonth(); // updating current month with new date month
    } else {
        date = new Date(); // pass the current date as date value
    }
    renderCalendar(); // calling renderCalendar function
});
});

$(".nav").click(function () {
$("#mySidenav").css('width', '70px');
$("#main").css('margin-left', '70px');
$(".logo").css('visibility', 'hidden');
$(".logo span").css('visibility', 'visible');
$(".logo span").css('margin-left', '-10px');
$(".icon-a").css('visibility', 'hidden');
$(".icons").css('visibility', 'visible');
$(".icons").css('margin-left', '-8px');
$(".nav").css('display', 'none');
$(".nav2").css('display', 'block');
});

$(".nav2").click(function () {
$("#mySidenav").css('width', '250px');
$("#main").css('margin-left', '250px');
$(".logo").css('visibility', 'visible');
$(".icon-a").css('visibility', 'visible');
$(".icons").css('visibility', 'visible');
$(".nav").css('display', 'block');
$(".nav2").css('display', 'none');
});

// SIDEBAR TOGGLE

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
  if(!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if(sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}


// ====================== for the logout ====================
const logoutButton = document.getElementById('logoutButton');
const overlay = document.getElementById('overlay');
const modal = document.getElementById('modal');
const YLogout = document.getElementById('confirmLogout');
const CLogout = document.getElementById('CLogout');

logoutButton.addEventListener('click', () => {
  overlay.style.display = 'block';
  modal.style.display = 'block';
});

CLogout.addEventListener('click', () => {
  overlay.style.display = 'none';
  modal.style.display = 'none';
});

YLogout.addEventListener('click', () => {
  // Perform logout logic here
  alert('Logged out successfully!');
  // You can redirect to a logout page or perform other actions as needed

  overlay.style.display = 'none';
  modal.style.display = 'none';
});




// ======================= for the dropdown =========================
function toggleDropdown() {
  var dropdownContent = document.getElementById("dropdownContent");
  if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
  } else {
    dropdownContent.style.display = "block";
  }
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  var dropdownContent = document.getElementById("dropdownContent");
  if (event.target !== dropdownContent && !event.target.matches('.user')) {
    dropdownContent.style.display = "none";
  }
}

