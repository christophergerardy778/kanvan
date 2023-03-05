const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        ripple: theme => ({
            colors: theme('colors')
        }),
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'primary': '#2B3467',
            'white': '#FCFFE7',
            'gray': '#413F42',
            'red': '#EB455F'
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-ripple')(),
    ],
};
