//var browserSync             = require('browser-sync-webpack-plugin');
//var modRewrite              = require('connect-modrewrite');

module.exports = {
    context: __dirname + '/src/js',
    entry: './app.js',
    output: {
        path: __dirname + '/public/js/',
        filename: 'app.js'
    },

    module: {
        loaders: [
            { test: /\.js$/, loader: 'babel', exclude: /node_modules/ },
            { test: /\.html$/, loader: 'raw', exclude: /node_modules/ }
        ]
    },

    devtool: 'sourse-map'
};