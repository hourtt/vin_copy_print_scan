import "bootstrap";
import Alpine from "alpinejs";
import "@hotwired/turbo";

import "./checkout-form";

window.Alpine = Alpine;
Alpine.start();

// * Explore Product Button — dashboard only
const exploreBtn = document.getElementById("explore-btn");
if (exploreBtn) {
    exploreBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const target = document.getElementById("products");
        const navbar = document.querySelector("nav");

        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const gap = parseFloat(getComputedStyle(target).paddingTop) || 0;
        const targetPosition =
            target.getBoundingClientRect().top +
            window.scrollY -
            navbarHeight -
            gap;

        window.scrollTo({
            top: targetPosition,
            behavior: "smooth",
        });
    });
}

// * Feature strip scroll animation — dashboard only
document.addEventListener("turbo:load", function () {
    const animatedItems = document.querySelectorAll(".feature-animate");
    if (!animatedItems.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.2 },
    );
    animatedItems.forEach((item) => observer.observe(item));
});

// * Ordering button animation effect
document.querySelectorAll(".order-btn").forEach((btn) => {
    function onRelease() {
        btn.classList.add("releasing");
        setTimeout(() => btn.classList.remove("releasing"), 200);
    }
    btn.addEventListener("mouseup", onRelease);
    btn.addEventListener("mouseleave", onRelease);
});
