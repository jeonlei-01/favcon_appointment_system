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



