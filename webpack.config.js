var webpack                 = require('webpack');
var path                    = require('path');
var fs                      = require('fs');

var nodeModules = {};
fs.readdirSync('node_modules')
    .filter(function(x) {
        return ['.bin'].indexOf(x) === -1;
    })
    .forEach(function(mod) {
        nodeModules[mod] = 'commonjs ' + mod;
    });


module.exports = [
    {
        name: 'server',
        entry: './server/server.js',
        target: 'node',
        output: {
            path: __dirname + '/public',
            filename: 'server.js'
        },
        module: {
            loaders: [
                {
                    test: /\.js$/,
                    loaders: ['babel'],
                    exclude: /node_modules/
                }
            ]
        },
        externals: nodeModules
    },
    {
        name: 'client',
        entry: './client/app.js',
        // target: 'web', // by default
        output: {
            path: __dirname + '/public',
            filename: 'client.js'
        },

        module: {
            loaders: [
                {
                    test: /\.js$/,
                    loaders: ['jsx', 'babel'],
                    exclude: /node_modules/
                }
            ]
        }
    }
];