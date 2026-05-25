import "bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// ── CATEGORY PILL FILTER ──
// Operates on .category-section wrappers (grouped by Laravel), not individual cards.
window.filterPills = function (clickedBtn) {
    // Update active pill
    document
        .querySelectorAll(".pill")
        .forEach((btn) => btn.classList.remove("active"));
    clickedBtn.classList.add("active");

    const selected = clickedBtn.dataset.category; // undefined for "All" pill
    const sections = document.querySelectorAll(".category-section");

    sections.forEach((section) => {
        // Show all when no category is selected (All pill), or match by data-category
        const show = !selected || section.dataset.category === selected;
        section.classList.toggle("hidden", !show);
        section.classList.toggle("visible", show);
    });
};

// ── SKELETON LOADING ──
// Call showSkeletons() before a fetch; call hideSkeletons() when data is ready.
// Renders N skeleton cards into the given container element.
function buildSkeletonCard() {
    return `
    <div class="product-card-skeleton" aria-hidden="true">
        <div class="skeleton-img"></div>
        <div class="skeleton-body">
            <div class="skeleton-block skeleton-line-sm"></div>
            <div class="skeleton-block skeleton-line-md"></div>
            <div class="skeleton-block skeleton-line-lg"></div>
            <div class="skeleton-block skeleton-line-btn"></div>
        </div>
    </div>`;
}

window.showSkeletons = function (container, count = 8) {
    container.innerHTML = Array.from({ length: count }, buildSkeletonCard).join(
        "",
    );
};

window.hideSkeletons = function (container) {
    container
        .querySelectorAll(".product-card-skeleton")
        .forEach((el) => el.remove());
};
// Show skeletons immediately, remove once real product DOM is ready
const skeletonContainer = document.getElementById("skeleton-container");
const productContainer = document.getElementById("grouped-products-container");

showSkeletons(skeletonContainer, 8);
productContainer.style.visibility = "hidden";

window.addEventListener("DOMContentLoaded", () => {
    skeletonContainer.remove();
    productContainer.style.visibility = "visible";
});
