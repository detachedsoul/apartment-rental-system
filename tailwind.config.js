module.exports = {
	content: ["./*.html", "./assets/js/*.js"],
	darkMode: "class",
	theme: {
		extend: {
			fontFamily: {
				jost: "Jost, sans-serif",
				mulish: "Mulish, sans-serif",
			},
			backgroundImage: {
				"index-banner":
					"linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)), url(../img/index-banner.jpg)",
			},
		},
	},
	plugins: [
		require("@tailwindcss/forms")({
			strategy: "class",
		}),
	],
};
