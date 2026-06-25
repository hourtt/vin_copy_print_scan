document.addEventListener("DOMContentLoaded", () => {
    // 1. DOM Elements
    const searchInput = document.querySelector('input[type="search"]');
    const catPills = document.querySelectorAll("#cat-pills .pill");
    const sortSelect = document.getElementById("sort-select");
    const countNum = document.getElementById("count-num");
    const skeletonGrid = document.getElementById("skeleton-grid");
    const productGroups = document.getElementById("product-groups");
    const emptyState = document.getElementById("empty-state");

    // Announcer for screen readers
    let announcer = document.getElementById("aria-announcer");
    if (!announcer) {
        announcer = document.createElement("div");
        announcer.id = "aria-announcer";
        announcer.setAttribute("aria-live", "polite");
        announcer.classList.add("sr-only"); // visually hidden
        document.body.appendChild(announcer);
    }

    let abortController = null;

    // 2. Initial State from URL
    function getParams() {
        const params = new URLSearchParams(window.location.search);
        return {
            cat: params.get("cat") || "all",
            search: params.get("search") || "",
            sort: params.get("sort") || "default"
        };
    }

    function syncUI(params) {
        if (searchInput && searchInput.value !== params.search) {
            searchInput.value = params.search;
        }

        if (sortSelect && sortSelect.value !== params.sort) {
            sortSelect.value = params.sort;
        }

        if (catPills.length > 0) {
            catPills.forEach((p) => {
                p.classList.remove("active", "border-transparent", "bg-[#27272a]", "text-white");
                p.classList.add("border-[#e4e4e7]", "bg-white", "text-[#71717a]", "hover:border-[#3f3f46]", "hover:text-[#3f3f46]");

                if (p.dataset.cat === params.cat) {
                    p.classList.add("active", "border-transparent", "bg-[#27272a]", "text-white");
                    p.classList.remove("border-[#e4e4e7]", "bg-white", "text-[#71717a]", "hover:border-[#3f3f46]", "hover:text-[#3f3f46]");
                }
            });
        }
    }

    // 3. Fetch Update
    async function updateView(pushState = true) {
        const params = getParams();

        // Build URL
        const url = new URL(window.location.href);
        Object.keys(params).forEach(key => {
            if (params[key] && params[key] !== "all" && params[key] !== "default") {
                url.searchParams.set(key, params[key]);
            } else {
                url.searchParams.delete(key);
            }
        });

        if (pushState) {
            window.history.pushState(params, "", url);
        }

        // Cancel previous request if any
        if (abortController) {
            abortController.abort();
        }
        abortController = new AbortController();

        // Start animations
        let showSkeleton = false;
        if (productGroups) {
            productGroups.style.opacity = '0';
        }

        // Show skeleton if request takes > 150ms
        const skeletonTimeout = setTimeout(() => {
            showSkeleton = true;
            if (productGroups) productGroups.style.display = 'none';
            if (skeletonGrid) skeletonGrid.style.display = 'block';
        }, 150);

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                signal: abortController.signal
            });

            if (!response.ok) throw new Error("Network response was not ok");

            const data = await response.json();
            clearTimeout(skeletonTimeout);

            // Update DOM
            if (productGroups) {
                productGroups.innerHTML = data.html;
            }

            if (countNum) {
                countNum.textContent = data.count;
            }

            if (emptyState) {
                emptyState.style.display = data.count === 0 ? "flex" : "none";
            }
            if (productGroups && data.count === 0) {
                productGroups.style.display = 'none';
            } else if (productGroups) {
                productGroups.style.display = 'block';
            }

            // Restore from skeleton
            if (skeletonGrid) {
                skeletonGrid.style.display = 'none';
            }

            // Fade in new content
            if (productGroups && data.count > 0) {
                productGroups.style.transform = 'translateY(10px)';
                productGroups.style.opacity = '0';

                requestAnimationFrame(() => {
                    productGroups.style.transition = 'opacity 200ms ease, transform 200ms ease';
                    productGroups.style.transform = 'translateY(0)';
                    productGroups.style.opacity = '1';
                });
            }

            announcer.textContent = `List updated. Showing ${data.count} items.`;

        } catch (error) {
            if (error.name === 'AbortError') return;
            console.error("Fetch error:", error);
            clearTimeout(skeletonTimeout);

            if (skeletonGrid) skeletonGrid.style.display = 'none';
            if (productGroups) {
                productGroups.style.opacity = '1';
                productGroups.style.display = 'block';
            }
            // Show error state
            if (emptyState) {
                emptyState.style.display = "flex";
                emptyState.innerHTML = `<p class="text-lg text-red-500">Failed to load products. Please try again.</p>`;
                if (productGroups) productGroups.style.display = 'none';
            }
        }
    }

    function setParamAndUpdate(key, value) {
        const url = new URL(window.location.href);
        if (value && value !== "all" && value !== "default") {
            url.searchParams.set(key, value);
        } else {
            url.searchParams.delete(key);
        }
        window.history.replaceState(null, "", url);
        updateView(true);
    }

    // 4. Event Listeners
    let debounceTimer;
    if (searchInput) {
        searchInput.addEventListener("input", (e) => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                setParamAndUpdate("search", e.target.value.trim());
            }, 300); // debounce search
        });
    }

    if (catPills.length > 0) {
        catPills.forEach((pill) => {
            pill.addEventListener("click", (e) => {
                const target = e.currentTarget;
                syncUI({ ...getParams(), cat: target.dataset.cat });
                setParamAndUpdate("cat", target.dataset.cat);
            });
        });
    }

    if (sortSelect) {
        sortSelect.addEventListener("change", (e) => {
            setParamAndUpdate("sort", e.target.value);
        });
    }

    window.addEventListener("popstate", () => {
        syncUI(getParams());
        updateView(false);
    });

    // Initialize UI on load based on URL params
    syncUI(getParams());

    // Ensure productGroups has transition applied
    if (productGroups) {
        productGroups.style.transition = 'opacity 150ms ease';
    }

    // Hide skeleton immediately on page load since the server rendered it
    if (skeletonGrid) skeletonGrid.style.display = "none";
});
