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



// ====================== for the request settings modal ==========================

document.getElementById('accept-btn').addEventListener('click', function () {
  // Add your "Accept" action logic here
  alert('You clicked Accept!');
});

document.getElementById('decline-btn').addEventListener('click', function () {
  // Add your "Decline" action logic here
  alert('You clicked Decline!');
});



// -------------- for the request modal --------------
const openModalBtn = document.querySelector('.open-modal-btn-request');
const modalR = document.querySelector('.modalRequest');
const closeModalBtn = document.querySelector('.close-modal-btn');

openModalBtn.addEventListener('click', () => {
    modalR.classList.add('open');
});

closeModalBtn.addEventListener('click', () => {
    modalR.classList.remove('open');
});

// ---------------- 1 request ------------------

const openModalBtn1 = document.querySelector('.open-modal-btn-request1');
const modalR1 = document.querySelector('.modalRequest');
const closeModalBtn1 = document.querySelector('.close-modal-btn');

openModalBtn1.addEventListener('click', () => {
    modalR1.classList.add('open');
});

closeModalBtn1.addEventListener('click', () => {
    modalR1.classList.remove('open');
});

// ---------------- 2 request ------------------

const openModalBtn2 = document.querySelector('.open-modal-btn-request2');
const modalR2 = document.querySelector('.modalRequest');
const closeModalBtn2 = document.querySelector('.close-modal-btn');

openModalBtn2.addEventListener('click', () => {
    modalR2.classList.add('open');
});

closeModalBtn2.addEventListener('click', () => {
    modalR2.classList.remove('open');
});

// ---------------- 3 request ------------------

const openModalBtn3 = document.querySelector('.open-modal-btn-request3');
const modalR3 = document.querySelector('.modalRequest');
const closeModalBtn3 = document.querySelector('.close-modal-btn');

openModalBtn3.addEventListener('click', () => {
    modalR3.classList.add('open');
});

closeModalBtn3.addEventListener('click', () => {
    modalR3.classList.remove('open');
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