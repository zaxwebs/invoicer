import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
	darkMode: ['selector', '[data-mode="dark"]'],
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'node_modules/preline/dist/*.js',
	],

	theme: {
		extend: {
			colors: {
				cool: '#F6F7FB',
			},
			fontFamily: {
				sans: ['Figtree', ...defaultTheme.fontFamily.sans],
			},
		},
	},

	plugins: [forms, require('preline/plugin')],
};
