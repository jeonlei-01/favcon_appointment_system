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
// Get the modal element
const modal = document.getElementById('logoutModal');
        
// Get the <span> element that opens the modal
const span = document.getElementById('logoutBtn');

// Get the buttons to handle logout and cancel
const confirmLogoutBtn = document.getElementById('confirmLogout');
const cancelLogoutBtn = document.getElementById('cancelLogout');

// Function to show the modal
function showModal() {
    modal.style.display = 'block';
}

// Function to hide the modal
function hideModal() {
    modal.style.display = 'none';
}

// Event listener to show the modal when the span is clicked
span.addEventListener('click', showModal);

// Event listener to handle logout and redirect to another page
confirmLogoutBtn.addEventListener('click', () => {
    // Redirect to the logout page (replace 'logout.html' with the actual logout page URL)
    window.location.href = 'logoutTest.html';
});

// Event listener to handle cancel
cancelLogoutBtn.addEventListener('click', hideModal);





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