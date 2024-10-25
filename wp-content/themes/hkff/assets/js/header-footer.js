document.addEventListener("DOMContentLoaded", function () {
    // Select the link with class "word"
    const wordLinks = document.querySelectorAll(".word");

    wordLinks.forEach(function (wordLink) {
        // Get all character spans inside the link
        const chars = wordLink.querySelectorAll(".char");
        const staggerAmount = chars.length * 0.1; // Slight stagger amount for subtle effect

        // Create the GSAP timeline
        const tl = gsap.timeline({ paused: true });

        // Animate the characters with reduced bounce effect
        tl.to(chars, {
            yPercent: -20, // Move the characters up to hide them
            opacity: 1, // Fade in
            ease: "power2.out", // Use a smoother easing function to reduce bounce
            stagger: { amount: staggerAmount },
        });

        // Play the animation when hovering over the link
        wordLink.addEventListener("mouseenter", function () {
            tl.restart();
        });

        // Optional: Reverse the animation when the mouse leaves
        wordLink.addEventListener("mouseleave", function () {
            tl.reverse();
        });
    });
});
