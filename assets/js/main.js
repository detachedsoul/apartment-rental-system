// Variable declarations
let menuToggle = document.querySelector(".menu-toggle");
let nav = document.querySelector("nav");
let scrollToTopBtn = document.querySelector(".scroll-to-top");

window.onscroll = () => {
	if (
		document.documentElement.scrollTop >= 300 ||
		document.body.scrollTop >= 300
	) {
		scrollToTopBtn.classList.remove("translate-x-[180%]");
	} else {
		scrollToTopBtn.classList.add("translate-x-[180%]");
	}
};

menuToggle.addEventListener("click", () => {
    nav.classList.toggle("scale-100");
});

scrollToTopBtn.addEventListener("click", () => {
    scrollTo({
		top: 0,
		left: 0,
		behavior: "smooth",
	});
})