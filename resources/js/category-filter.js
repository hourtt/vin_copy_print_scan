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

    // * Response cache — avoids repeat network hits for the same URL
    const responseCache = new Map();
    const MAX_CACHE_SIZE = 30;

    // 2. Initial State from URL
    function getParams() {
        const params = new URLSearchParams(window.location.search);
        return {
            cat: params.get("cat") || "all",
            search: params.get("search") || "",
            sort: params.get("sort") || "default",
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
                p.classList.remove(
                    "active",
                    "border-transparent",
                    "bg-[#27272a]",
                    "text-white",
                );
                p.classList.add(
                    "border-[#e4e4e7]",
                    "bg-white",
                    "text-[#71717a]",
                    "hover:border-[#3f3f46]",
                    "hover:text-[#3f3f46]",
                );

                if (p.dataset.cat === params.cat) {
                    p.classList.add(
                        "active",
                        "border-transparent",
                        "bg-[#27272a]",
                        "text-white",
                    );
                    p.classList.remove(
                        "border-[#e4e4e7]",
                        "bg-white",
                        "text-[#71717a]",
                        "hover:border-[#3f3f46]",
                        "hover:text-[#3f3f46]",
                    );
                }
            });
        }
    }

    // 3. Fetch Update
    async function updateView(params, pushState = true) {
        // Build the target URL from the explicit params object, NOT from the
        // current window.location (which hasn't been updated yet).
        const url = new URL(window.location.pathname, window.location.origin);
        Object.keys(params).forEach((key) => {
            if (
                params[key] &&
                params[key] !== "all" &&
                params[key] !== "default" &&
                params[key] !== ""
            ) {
                url.searchParams.set(key, params[key]);
            }
        });

        // Cancel previous request if any
        if (abortController) {
            abortController.abort();
        }
        abortController = new AbortController();

        // Optimistically update the pill/sort UI immediately
        syncUI(params);

        // Start animations
        if (productGroups) {
            productGroups.style.opacity = "0";
        }

        // Show skeleton if request takes > 150ms
        let showSkeleton = false;
        const skeletonTimeout = setTimeout(() => {
            showSkeleton = true;
            if (productGroups) productGroups.style.display = "none";
            if (skeletonGrid) skeletonGrid.style.display = "block";
        }, 150);

        try {
            const cacheKey = url.toString();
            let data;

            if (responseCache.has(cacheKey)) {
                // Cache hit — serve instantly, no network needed
                clearTimeout(skeletonTimeout);
                data = responseCache.get(cacheKey);
            } else {
                const response = await fetch(url, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                    signal: abortController.signal,
                });

                if (!response.ok)
                    throw new Error(
                        `Network response was not ok: ${response.status}`,
                    );

                data = await response.json();

                // Store in cache, evict oldest if over limit
                if (responseCache.size >= MAX_CACHE_SIZE) {
                    responseCache.delete(responseCache.keys().next().value);
                }
                responseCache.set(cacheKey, data);
            }
            clearTimeout(skeletonTimeout);

            // URL update happens HERE, after confirmed success
            if (pushState) {
                window.history.pushState(params, "", url);
            } else {
                window.history.replaceState(params, "", url);
            }

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
                productGroups.style.display = "none";
            } else if (productGroups) {
                productGroups.style.display = "block";
            }

            // Restore from skeleton
            if (skeletonGrid) {
                skeletonGrid.style.display = "none";
            }

            // Fade in new content
            if (productGroups && data.count > 0) {
                productGroups.style.transform = "translateY(10px)";
                productGroups.style.opacity = "0";

                requestAnimationFrame(() => {
                    productGroups.style.transition =
                        "opacity 200ms ease, transform 200ms ease";
                    productGroups.style.transform = "translateY(0)";
                    productGroups.style.opacity = "1";
                });
            }

            announcer.textContent = `List updated. Showing ${data.count} items.`;
        } catch (error) {
            if (error.name === "AbortError") return;
            console.error("Fetch error:", error);
            clearTimeout(skeletonTimeout);

            if (skeletonGrid) skeletonGrid.style.display = "none";
            if (productGroups) {
                productGroups.style.opacity = "1";
                productGroups.style.display = "block";
            }
            // Show error state
            if (emptyState) {
                emptyState.style.display = "flex";
                emptyState.innerHTML = `<p class="text-lg text-red-500">Failed to load products. Please try again.</p>`;
                if (productGroups) productGroups.style.display = "none";
            }
        }
    }

    // Helper: build a params object from the current URL, override one key, then fetch.
    function setParamAndUpdate(key, value, pushState = true) {
        const params = getParams();
        params[key] = value;
        updateView(params, pushState);
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
                setParamAndUpdate("cat", target.dataset.cat);
            });
        });
    }

    if (sortSelect) {
        sortSelect.addEventListener("change", (e) => {
            setParamAndUpdate("sort", e.target.value);
        });
    }

    window.addEventListener("popstate", (e) => {
        // Restore params from the history state if available, else re-read from URL
        const params = e.state || getParams();
        syncUI(params);
        updateView(params, false);
    });

    // Initialize UI on load based on URL params
    syncUI(getParams());

    // Ensure productGroups has transition applied
    if (productGroups) {
        productGroups.style.transition = "opacity 150ms ease";
    }

    // Hide skeleton immediately on page load since the server rendered it
    if (skeletonGrid) skeletonGrid.style.display = "none";
});
