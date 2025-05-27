// Array of content for each slide
const contentData = [
    {
        h5: "Plastic Packaging",
        h3: "Identifying 360 & approach in design",
        p: "A leading global foods company approached Packfora to develop end-to-end innovative solutions for their coffee brand launch.",
        link: "#",
    },
    {
        h5: "Business Envisioning",
        h3: "Innovation & Sustainability led growth plan",
        p: "A leading Indian paper manufacturer entrusted Packfora with the task of helping them build a strong pipeline of innovation for growth, centered around sustainability.",
        link: "#",
    },
    {
        h5: "Home Care",
        h3: "Evolving the form of an iconic soap bar",
        p: "A leading home care company approached Packfora to recreate the form of their soap bar by using existing infrastructure & supply chain systems for multiple markets across the globe",
        link: "#",
    },
    {
        h5: "AUTOMATION",
        h3: "Develop strategy to enable sustainable",
        p: "Zespri, a global leader in kiwifruit, faced a unique challenge: how to make consuming fruits and meeting daily Vitamin C needs effortless for their...",
        link: "#",
    },
    {
        h5: "Personal Care",
        h3: "Accelerated packaging enhancements for re-launch (2D + 3D)",
        p: "Personal Care Start Up approached Packfora to ensure premium packaging solutions for re-launching in an accelerated time frame of just 8 weeks.",
        link: "#",
    },
    {
        h5: "Sustainability",
        h3: "Sustainability & Simplified Packaging operations for business",
        p: "A leading tyre manufacturer approached Packforato ensure the packaging structure used is in compliance with government guidelines of recyclability and to simplify packaging operations.",
        link: "#",
    },
];

// Function to update content based on active slide
function updateContent(index) {
    const content = document.querySelector(".gallery .content");
    content.querySelector("h5").textContent = contentData[index].h5;
    content.querySelector("h3").textContent = contentData[index].h3;
    content.querySelector("p").textContent = contentData[index].p;

    const anchor = content.querySelector(".gallery .content a");
    anchor.setAttribute("href", contentData[index].link);
}

// Initialize Swiper for the main slider
var slider = new Swiper(".gallery-slider", {
    slidesPerView: 1,
    loop: true,
    loopedSlides: contentData.length,
    keyboard: {
        enabled: true,
    },
    mousewheel: false,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    on: {
        slideChange: function () {
            // Update content when the slide changes
            const realIndex = this.realIndex; // Get the real index of the active slide
            updateContent(realIndex);
        },
    },
});

// Initialize Swiper for the thumbnail slider
var thumbs = new Swiper(".gallery-thumbs", {
    slidesPerView: "auto",
    spaceBetween: 10,
    centeredSlides: false,
    loop: true,
    slideToClickedSlide: true,
});

// Link the sliders together
slider.controller.control = thumbs;
thumbs.controller.control = slider;

// Initialize content for the first slide
updateContent(0);