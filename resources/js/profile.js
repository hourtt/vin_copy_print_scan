window.ieOpen = function (field) {
    const row = document.querySelector(`[data-inline-field="${field}"]`);
    if (!row) return;

    // Hide the display slots (value text + Edit button)
    row.querySelectorAll(".ie-display").forEach(
        (el) => (el.style.display = "none"),
    );

    // Show the editor
    const editor = document.getElementById(`ie-editor-${field}`);
    if (editor) {
        editor.style.display = "block";
        // Focus the first focusable input inside
        const firstInput = editor.querySelector('input:not([type="hidden"])');
        if (firstInput) firstInput.focus();
    }
};

/**
 * Close the inline editor for a given field key, reverting to display mode.
 *
 * @param {string} field  e.g. 'name' | 'email'
 */
window.ieClose = function (field) {
    const row = document.querySelector(`[data-inline-field="${field}"]`);
    if (!row) return;

    // Hide the editor
    const editor = document.getElementById(`ie-editor-${field}`);
    if (editor) editor.style.display = "none";

    // Show the display slots again
    row.querySelectorAll(".ie-display").forEach(
        (el) => (el.style.display = ""),
    );
};

/* ─── Handle Inline Form Submissions via AJAX ─── */
document.querySelectorAll(".ie-form").forEach((form) => {
    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const field = this.dataset.field; // 'name' or 'email'
        const formData = new FormData(this);

        // Clear previous errors
        this.querySelectorAll(".ie-error-msg").forEach((el) => el.remove());
        this.querySelectorAll(".ie-input--error").forEach((el) =>
            el.classList.remove("ie-input--error"),
        );

        const submitBtn = this.querySelector(".ie-btn-save");
        const originalText = submitBtn.textContent;
        submitBtn.textContent = "Saving...";
        submitBtn.disabled = true;

        try {
            // Send AJAX request to the dedicated field update route
            const response = await fetch(`/profile/field/${field}`, {
                method: "POST", // Method spoofing via FormData's _method=PATCH
                headers: {
                    "X-Requested-With": "XMLHttpRequest", // Tells Laravel to return JSON
                    Accept: "application/json",
                    // Laravel automatically verifies the CSRF token from FormData
                },
                body: formData,
            });

            const data = await response.json();

            if (response.ok) {
                // Update the display text based on what was saved
                if (field === "name") {
                    document.getElementById("ie-display-name").textContent =
                        `${data.user.first_name} ${data.user.last_name}`;
                    // Update sidebar avatar if needed
                    document.querySelector(
                        ".settings-avatar-initials",
                    ).textContent = data.user.first_name.substring(0, 1);
                    document.querySelector(
                        ".settings-header-name",
                    ).textContent =
                        `${data.user.first_name} ${data.user.last_name}`;
                } else if (field === "email") {
                    document.getElementById("ie-display-email").textContent =
                        data.user.email;
                }

                ieClose(field);
                showToast(data.message || "Saved successfully!");
            } else {
                // Handle validation errors (HTTP 422)
                if (response.status === 422 && data.errors) {
                    for (const [key, messages] of Object.entries(data.errors)) {
                        const input = this.querySelector(`[name="${key}"]`);
                        if (input) {
                            input.classList.add("ie-input--error");
                            const errorMsg = document.createElement("p");
                            errorMsg.className = "ie-error-msg";
                            errorMsg.textContent = messages[0];
                            input.parentElement.appendChild(errorMsg);
                        }
                    }
                } else {
                    alert(data.message || "An error occurred.");
                }
            }
        } catch (error) {
            console.error("Error:", error);
            alert("A network error occurred. Please try again.");
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });
});

/* ─── Show Success Toast Helper ─── */
window.showToast = function (message) {
    const toast = document.createElement("div");
    toast.className = "ie-success-toast";
    toast.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                ${message}
            `;
    document.body.appendChild(toast);
    requestAnimationFrame(() =>
        toast.classList.add("ie-success-toast--visible"),
    );
    setTimeout(() => {
        toast.classList.remove("ie-success-toast--visible");
        setTimeout(() => toast.remove(), 400);
    }, 3000);
};

/*
 * Modal Helpers (unchanged — still used by Address Book,
 * Payment Methods, Login & Security, and Logout)
 *  */

window.openModal = function (id) {
    const overlay = document.getElementById(id);
    if (!overlay) return;
    overlay.classList.add("active");
    document.body.style.overflow = "hidden";
};

window.closeModal = function (id) {
    const overlay = document.getElementById(id);
    if (!overlay) return;
    overlay.classList.remove("active");
    document.body.style.overflow = "";
};

// Close on backdrop click
document.querySelectorAll('[role="dialog"]').forEach((overlay) => {
    overlay.addEventListener("click", function (e) {
        if (e.target === this) {
            closeModal(this.id);
        }
    });
});

// Close on Escape key
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        // Close any open modals
        document
            .querySelectorAll('[role="dialog"].active')
            .forEach((overlay) => {
                closeModal(overlay.id);
            });
    }
});
