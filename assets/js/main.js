let menuToggle = document.querySelector(".menu-toggle");
let nav = document.querySelector("nav");
let scrollToTopBtn = document.querySelector(".scroll-to-top");
let modeToggle = document.querySelector(".mode-toggle");
let logo = document.querySelector(".logo");
let disclaimer = document.querySelector(".disclaimer");

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

window.onload = (() => {
	if (
		localStorage.theme === "dark" ||
		(!("theme" in localStorage) &&
			window.matchMedia("(prefers-color-scheme: dark)").matches)
	) {
		document.documentElement.classList.add("dark");
		modeToggle.firstElementChild.classList.replace(
			"fi-rr-moon",
			"fi-rr-sun",
		);
		// logo.src = "./assets/img/logo-light.png";
	} else {
		document.documentElement.classList.add("light");
		modeToggle.firstElementChild.classList.replace(
			"fi-rr-sun",
			"fi-rr-moon",
		);
		// logo.src = "./assets/img/logo.png";
	}

	disclaimer.classList.add("disclaimer");
});

modeToggle.addEventListener("click", () => {
	if (localStorage.getItem("theme") === "light") {
		localStorage.setItem("theme", "dark");
		document.documentElement.classList.replace("light", "dark");
		// logo.src = "./assets/img/logo.png";

		modeToggle.firstElementChild.classList.replace(
			"fi-rr-moon",
			"fi-rr-sun",
		);
	} else {
		localStorage.setItem("theme", "light");
		document.documentElement.classList.replace("dark", "light");
		// logo.src = "./assets/img/logo-light.png";
		modeToggle.firstElementChild.classList.replace(
			"fi-rr-sun",
			"fi-rr-moon",
		);
	}
});

menuToggle.addEventListener("click", () => {
    nav.classList.toggle("scale-0");
});

scrollToTopBtn.addEventListener("click", () => {
    scrollTo({
		top: 0,
		left: 0,
		behavior: "smooth",
	});
})