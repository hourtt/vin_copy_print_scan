function toggleFaq(btn) {
    const item = btn.closest(".faq-item");
    const isOpen = item.classList.contains("open");
    // Close all
    document.querySelectorAll(".faq-item.open").forEach((el) => {
        el.classList.remove("open");
        el.querySelector(".faq-q").setAttribute("aria-expanded", "false");
    });
    // Open clicked (unless it was already open)
    if (!isOpen) {
        item.classList.add("open");
        btn.setAttribute("aria-expanded", "true");
    }
}

// Quick-nav active state on scroll
const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".qn-link");

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                navLinks.forEach((l) => l.classList.remove("active"));
                const active = document.querySelector(
                    `.qn-link[href="#${entry.target.id}"]`,
                );
                if (active) active.classList.add("active");
            }
        });
    },
    {
        rootMargin: "-40% 0px -55% 0px",
    },
);

sections.forEach((s) => observer.observe(s));
