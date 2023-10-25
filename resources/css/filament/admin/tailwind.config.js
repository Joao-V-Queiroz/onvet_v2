import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
	presets: [preset],
	content: [
		'./app/Filament/**/*.php',
		'./resources/views/filament/**/*.blade.php',
		'./resources/views/livewire/**/*.blade.php',
		'./vendor/filament/**/*.blade.php',
		"./app/Livewire/**/*.php",
	],
	theme: {
		extend: {},
	},
	plugins: [
		require('tailwind-scrollbar')({ nocompatible: true }),
	    // require("@tailwindcss/forms"),
	    // require("@tailwindcss/typography"),
	],
}
