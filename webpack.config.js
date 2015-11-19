module.exports = {

    entry: {
        client: './client/app.js',
        server : './server/server.js'
    },

    output: {
        path: __dirname + '/public',
        filename: "[name].js",
        library: '[name]'
    },

    module: {
        loaders: [
            {
                test: /\.jsx?$/,
                loaders: ['jsx', 'babel'],
                exclude: /node_modules/
            }
        ]
    }

};