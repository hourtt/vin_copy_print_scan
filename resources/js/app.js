import "bootstrap";
import Alpine from "alpinejs";
import "@hotwired/turbo";

window.Alpine = Alpine;

document.addEventListener("alpine:init", () => {
    Alpine.data("addToCart", (url, isAvailable) => ({
        adding: false,
        added: false,
        isAvailable: isAvailable,
        add() {
            if (this.adding || !this.isAvailable) return;
            this.adding = true;

            const csrfToken = document.querySelector(
                'meta[name="csrf-token"]',
            )?.content;

            fetch(url, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    Accept: "application/json",
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        window.dispatchEvent(
                            new CustomEvent("cart-updated", {
                                detail: { count: data.count },
                            }),
                        );
                        this.added = true;
                        setTimeout(() => (this.added = false), 2000);
                    }
                })
                .finally(() => (this.adding = false));
        },
    }));

    Alpine.data("productCarousel", () => ({
        scrollContainer: null,
        canScrollLeft: false,
        canScrollRight: true,
        autoplay: null,
        init() {
            this.scrollContainer = this.$refs.track;
            setTimeout(() => {
                this.updateButtons();
                this.startAutoplay();
            }, 100);
        },
        updateButtons() {
            if (!this.scrollContainer) return;
            const el = this.scrollContainer;
            this.canScrollLeft = el.scrollLeft > 1;
            this.canScrollRight =
                Math.ceil(el.scrollLeft) < el.scrollWidth - el.clientWidth - 1;
        },
        scrollBy(direction) {
            if (!this.scrollContainer) return;
            const cardWidth =
                this.scrollContainer.querySelector("[data-carousel-card]")
                    ?.offsetWidth || 300;
            const gap = 24;
            this.scrollContainer.scrollBy({
                left: direction * (cardWidth + gap),
                behavior: "smooth",
            });
            setTimeout(() => this.updateButtons(), 350);
        },
        startAutoplay() {
            this.autoplay = setInterval(() => {
                if (!this.canScrollRight) {
                    this.scrollContainer.scrollTo({
                        left: 0,
                        behavior: "smooth",
                    });
                    setTimeout(() => this.updateButtons(), 350);
                } else {
                    this.scrollBy(1);
                }
            }, 4000);
        },
        pauseAutoplay() {
            clearInterval(this.autoplay);
        },
        resumeAutoplay() {
            this.startAutoplay();
        },
    }));
});

Alpine.start();
