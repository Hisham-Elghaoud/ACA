const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'xs': '426px',
            'sm': '528px',
            'md': '740px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1440px',
            '3xl': '1920px',
            '4xl': '2560px',
          },
          extend: {
            colors: {
              primary: {
                100: "#B69557",
                200: "#F2C60D",
              },
              secondary: {
                100: "#1F1F1F",
                200: "#1F2933",
              },
            },
            maxWidth: {
              container: "100rem"
            },
            width: {
              'year' : 'clamp(4rem, 1.9725rem + 10.4644vw, 14rem)'
            },
            fontFamily : {
              'sans': ['Gulf']
            },
            boxShadow : {
              'hero' : '0 0 2px 1px #cbcbcb'
            } ,
            backgroundImage : {
              'hero-right' : 'linear-gradient(to left, rgb(0 0 0 / 52%), transparent), url(../../public/storage/public/uploads/website/hero.png)' ,
              'hero-left' : 'linear-gradient(to bottom, rgb(255 255 255 / 52%), rgb(255 255 255 / 52%)), url(../../public/storage/public/uploads/website/map.png)' ,
            } ,
            inset : {
              'nav' : '0 30% 0 0'
            }
          },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
