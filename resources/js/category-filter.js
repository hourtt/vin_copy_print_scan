document.addEventListener("DOMContentLoaded", () => {
    // 1. DOM Elements
    // Works for both #paper-search and #printer-search (or any future category)
    const searchInput = document.querySelector('input[type="search"]');
    const catPills = document.querySelectorAll("#cat-pills .pill");
    const sortSelect = document.getElementById("sort-select");
    const categorySections = document.querySelectorAll(".category-section");
    const emptyState = document.getElementById("empty-state");
    const countNum = document.getElementById("count-num");
    const skeletonGrid = document.getElementById("skeleton-grid");
    const productGroups = document.getElementById("product-groups");

    // 2. Initial State
    let currentCategory = "all";
    let currentSearch = "";
    let currentSort = "default";

    // 3. Initialization & Skeleton Handoff
    function init() {
        setTimeout(() => {
            if (skeletonGrid) skeletonGrid.style.display = "none";
            if (productGroups) productGroups.style.display = "block";

            // Store original DOM order for 'default' sorting fallback
            categorySections.forEach((section) => {
                const cards = Array.from(
                    section.querySelectorAll(".product-card"),
                );
                cards.forEach((card, index) =>
                    card.setAttribute("data-original-index", index),
                );
            });

            updateView();
        }, 150);
    }

    // 4. Event Listeners
    if (searchInput) {
        searchInput.addEventListener("input", (e) => {
            currentSearch = e.target.value.toLowerCase().trim();
            updateView();
        });
    }

    if (catPills.length > 0) {
        catPills.forEach((pill) => {
            pill.addEventListener("click", (e) => {
                // Reset all pills to inactive Tailwind styles
                catPills.forEach((p) => {
                    p.classList.remove("active", "border-transparent", "bg-[#27272a]", "text-white");
                    p.classList.add("border-[#e4e4e7]", "bg-white", "text-[#71717a]", "hover:border-[#3f3f46]", "hover:text-[#3f3f46]");
                });

                // Set clicked pill to active Tailwind styles
                const target = e.currentTarget;
                target.classList.add("active", "border-transparent", "bg-[#27272a]", "text-white");
                target.classList.remove("border-[#e4e4e7]", "bg-white", "text-[#71717a]", "hover:border-[#3f3f46]", "hover:text-[#3f3f46]");

                currentCategory = target.dataset.cat;
                updateView();
            });
        });
    }

    if (sortSelect) {
        sortSelect.addEventListener("change", (e) => {
            currentSort = e.target.value;
            updateView();
        });
    }

    // 5. Core View Update Logic
    function updateView() {
        let globalVisibleCount = 0;

        categorySections.forEach((section) => {
            const sectionCat = section.dataset.cat;
            const grid = section.querySelector(".product-grid");
            const cards = Array.from(section.querySelectorAll(".product-card"));
            let sectionVisibleCount = 0;

            // Sort before filtering display
            sortCards(cards, currentSort);
            cards.forEach((card) => grid.appendChild(card));

            cards.forEach((card) => {
                const cardCat = card.dataset.cat;
                const cardName = (card.dataset.name || "").toLowerCase();

                const matchesCategory =
                    currentCategory === "all" || currentCategory === cardCat;

                // Strict Name matching only. No description searching.
                const matchesSearch =
                    currentSearch === "" || cardName.includes(currentSearch);

                if (matchesCategory && matchesSearch) {
                    card.style.display = "";
                    sectionVisibleCount++;
                    globalVisibleCount++;
                } else {
                    card.style.display = "none";
                }
            });

            // Hide section wrapper if empty
            if (
                sectionVisibleCount === 0 ||
                (currentCategory !== "all" && currentCategory !== sectionCat)
            ) {
                section.style.display = "none";
                section.classList.add("hidden");
            } else {
                section.style.display = "block";
                section.classList.remove("hidden");
            }
        });

        if (countNum) {
            countNum.textContent = globalVisibleCount;
        }

        if (emptyState) {
            emptyState.style.display =
                globalVisibleCount === 0 ? "flex" : "none";
        }
    }

    // 6. Sorting Helper (Combines all logic from Printers and Papers)
    function sortCards(cards, sortType) {
        cards.sort((a, b) => {
            const priceA = parseFloat(a.dataset.price) || 0;
            const priceB = parseFloat(b.dataset.price) || 0;
            const nameA = a.dataset.name || "";
            const nameB = b.dataset.name || "";
            const stockA = parseInt(a.dataset.stock, 10) || 0;
            const stockB = parseInt(b.dataset.stock, 10) || 0;
            const yearA = parseInt(a.dataset.year, 10) || 0;
            const yearB = parseInt(b.dataset.year, 10) || 0;

            switch (sortType) {
                case "price-asc":
                    return priceA - priceB;
                case "price-desc":
                    return priceB - priceA;
                case "name-asc":
                    return nameA.localeCompare(nameB);
                case "stock-desc":
                    return stockB - stockA;
                case "year-desc":
                    return yearB - yearA;
                case "default":
                default:
                    return (
                        parseInt(a.dataset.originalIndex) -
                        parseInt(b.dataset.originalIndex)
                    );
            }
        });
    }

    init();
});
