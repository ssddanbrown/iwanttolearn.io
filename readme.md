# iwanttolearn.io


[iwanttolearn.io](https://iwanttolearn.io) is a site for collecting the best resources to learn from for a range of developer topics.

This repository hosts the source code that is used to run the site. Further details on how the site is built and hosts can be found [here on our about page](https://iwanttolearn.io/about).

## Build Setup

The application is build on VueJS and all final assets are static. Below are the commands to build. Remember to use `yarn` or `npm install` beforehand to install all required dependencies.

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# run unit tests
npm run unit

# run e2e tests
npm run e2e

# run all tests
npm test
```

For detailed explanation on how things work, checkout the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).

## Adding Formats, Resources or Tags

All data can be found in json files in the `data` directory. These are very simple data formats. When the application is built these sets of data will be parsed and joined to create the static API
that powers the application.

## Third Party Libraries

The site is built upon many brilliant open source projects which I have listed below:

*   Framework: [VueJS](https://vuejs.org/)
*   Styling: [Bootstrap](http://getbootstrap.com/) & [Sass](http://sass-lang.com/)
*   Icons: [Font-awesome icon font](http://fontawesome.io/)

## Contributing

Thank you for considering contributing to the iwanttolearn.io! You can submit any issues you have found on the issues tab.

## License

The iwanttolearn.io source is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
