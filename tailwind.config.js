/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "hijau-custom": "#22A52F",
                "hijau-custom-dua": "#2DC53C",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
