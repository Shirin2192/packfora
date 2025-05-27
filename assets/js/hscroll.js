
$(function () {
  var width = $(window).width();
  if (width > 991) {

    /* ===============================  scroll  =============================== */

    gsap.registerPlugin(ScrollTrigger);

    let sections = gsap.utils.toArray(".panel");

    gsap.to(sections, {
      xPercent: -100 * (sections.length - 1),
      ease: "none",
      scrollTrigger: {
        trigger: ".thecontainer",
        pin: true,
        scrub: 1,
        // snap: 1 / (sections.length - 1),
        end: () => "+=" + document.querySelector(".thecontainer").offsetWidth
      }
    });

  }
});




// gsap.registerPlugin(ScrollTrigger);

// const mainImage = document.getElementById('mainImage');
// const leftImage = document.getElementById('leftImage');
// const rightImage = document.getElementById('rightImage');

// ScrollTrigger.create({
//   trigger: ".scroll-section",
//   start: "top 10%",
//   end: "bottom bottom",
//   onUpdate: (self) => {
//     if (self.progress > 0.1) {
//       mainImage.classList.add('scrolled');
//       leftImage.classList.add('visible');
//       rightImage.classList.add('visible');
//     } else {
//       mainImage.classList.remove('scrolled');
//       leftImage.classList.remove('visible');
//       rightImage.classList.remove('visible');
//     }
//   }
// });

// gsap.from('.main-image', {
//   opacity: 0,
//   y: 100,
//   duration: 1,
//   ease: "power2.out"
// });

// gsap.to('.image-wrapper img', {
//   y: 100,
//   ease: "none",
//   scrollTrigger: {
//     trigger: ".scroll-section",
//     start: "top top",
//     end: "bottom top",
//     scrub: true
//   }
// });
