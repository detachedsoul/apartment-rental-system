let menuToggle = document.querySelector(".menu-toggle");
let nav = document.querySelector("nav");
let scrollToTopBtn = document.querySelector(".scroll-to-top");
let modeToggles = document.querySelectorAll(".mode-toggle");
let logos = document.querySelectorAll(".logo");
let disclaimer = document.querySelector(".disclaimer");
let deletePropertyBtn = document.querySelector(".delete-property");
let confirmDeleteCard = document.querySelector(".confirm-delete");
let cancelDeleteBtn = document.querySelector(".cancel-delete");
let pic1 = document.querySelector("#pic-1");
let pic2 = document.querySelector("#pic-2");
let pic3 = document.querySelector("#pic-3");
let pic4 = document.querySelector("#pic-4");
let pic5 = document.querySelector("#pic-5");
let pic6 = document.querySelector("#pic-6");

const showUploadedImage = (fileInputSelector) => {
	let reader = new FileReader();

	reader.onload = (e) => {
		fileInputSelector.nextElementSibling.src = e.target.result;
		fileInputSelector.nextElementSibling.classList.remove("opacity-0");
	};
	reader.readAsDataURL(fileInputSelector.files[0]);
}

pic1.addEventListener("change", () => showUploadedImage(pic1));
pic2.addEventListener("change", () => showUploadedImage(pic2));
pic3.addEventListener("change", () => showUploadedImage(pic3));
pic4.addEventListener("change", () => showUploadedImage(pic4));
pic4.addEventListener("change", () => showUploadedImage(pic4));
pic4.addEventListener("change", () => showUploadedImage(pic4));
pic5.addEventListener("change", () => showUploadedImage(pic5));
pic6.addEventListener("change", () => showUploadedImage(pic6));


const toggleConfirmDelete = () => {
	if (confirmDeleteCard.classList.contains("scale-0")) {
		document.querySelector("html").style.overflow = "hidden";
	} else {
		document.querySelector("html").style.overflow = "auto";
	}
	confirmDeleteCard.classList.toggle("scale-0");
};

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

window.onload = () => {
	if (
		localStorage.theme === "dark" ||
		(!("theme" in localStorage) &&
			window.matchMedia("(prefers-color-scheme: dark)").matches)
	) {
		document.documentElement.classList.add("dark");
		modeToggles.forEach((modeToggle) => {
			modeToggle.firstElementChild.classList.replace(
				"fi-rr-moon",
				"fi-rr-sun",
			);
		});
		logos.forEach((logo) => {
			logo.src = "./assets/img/logo-light.png";
		});
	} else {
		document.documentElement.classList.add("light");
		modeToggles.forEach((modeToggle) => {
			modeToggle.firstElementChild.classList.replace(
				"fi-rr-sun",
				"fi-rr-moon",
			);
		});
		logos.forEach((logo) => {
			logo.src = "./assets/img/logo.png";
		});
	}

	disclaimer.classList.add("disclaimer");
};

modeToggles.forEach((modeToggle) => {
	modeToggle.addEventListener("click", () => {
		if (localStorage.getItem("theme") === "light") {
			localStorage.setItem("theme", "dark");
			document.documentElement.classList.replace("light", "dark");
			logos.forEach((logo) => {
				logo.src = "./assets/img/logo-light.png";
			});
			modeToggles.forEach((modeToggle) => {
				modeToggle.firstElementChild.classList.replace(
					"fi-rr-moon",
					"fi-rr-sun",
				);
			});
		} else {
			localStorage.setItem("theme", "light");
			document.documentElement.classList.replace("dark", "light");
			logos.forEach((logo) => {
				logo.src = "./assets/img/logo.png";
			});
			modeToggles.forEach((modeToggle) => {
				modeToggle.firstElementChild.classList.replace(
					"fi-rr-sun",
					"fi-rr-moon",
				);
			});
		}
	});
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
});

deletePropertyBtn.addEventListener("click", () => toggleConfirmDelete());

cancelDeleteBtn.addEventListener("click", () => toggleConfirmDelete());

// window.onchange = (e) => showUploadedImage("#pic-2");