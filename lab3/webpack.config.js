const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');

const isProduction = process.env.NODE_ENV === 'production';
const stylesHandler = MiniCssExtractPlugin.loader;

const config = {
    entry: {
        app: './resources/js/app.js',
        bootstrap: './resources/js/bootstrap.js',
        jquery: './resources/js/jquery.js',
        sass: './resources/sass/app.sass',
    },
    output: {
        path: path.resolve(__dirname, 'public/js'),
        filename: '[name].js',
    },
    devServer: {
        open: true,
        host: 'localhost',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '../css/[name].css',
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
        }),
    ],
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: [stylesHandler, 'css-loader'],
            },
            {
                test: /\.s[ac]ss$/i,
                use: [stylesHandler, 'css-loader', 'sass-loader'],
            },
            {
                test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
                type: 'asset',
            },
        ],
    },
};

module.exports = () => {
    config.mode = isProduction ? 'production' : 'development';
    return config;
};
