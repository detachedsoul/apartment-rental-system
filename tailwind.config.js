module.exports = {
	content: ["./**/*.php", "./assets/js/*.js"],
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
				"details-banner":
					"linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url(../img/details-banner.jpg)",
				"admin-nav":
					"linear-gradient(90deg, rgba(255, 186, 104, 0.05) 0%, rgba(13, 26, 38, 0.05) 117.12%)",
				"light-details-banner":
					"linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(../img/details-banner.jpg)",
			},
		},
	},
	plugins: [
		require("@tailwindcss/forms")({
			strategy: "class",
		}),
	],
};
