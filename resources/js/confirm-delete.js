const deleteForm = document.querySelectorAll(".delete-form");
const customModal = document.getElementById("custom-modal");
const modalContent = document.getElementById("modal-content");
const modalConfirmBtn = document.getElementById("confirm");
const modalBackBtn = document.getElementById("back");

deleteForm.forEach((form) => {
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        // Modal message to display
        modalContent.innerText =
            "Do you want to permanently delete this item? The action is irreversible";

        // Show modal
        customModal.style.display = "block";

        // If click confirm, hide modal & submit form
        modalConfirmBtn.addEventListener("click", () => {
            customModal.style.display = "none";
            form.submit();
        });

        // If click go back hide modal
        modalBackBtn.addEventListener("click", () => {
            customModal.style.display = "none";
        });
    });
});
