import './bootstrap';


document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.querySelector("button[onclick='toggleDropdown()']");
    const dropdownMenu = document.getElementById("userDropdown");

    if (dropdownButton && dropdownMenu) {
        dropdownButton.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevents event from bubbling up
            dropdownMenu.classList.toggle("hidden");
        });

        // Hide dropdown when clicking outside
        document.addEventListener("click", function (event) {
            if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    }
});
