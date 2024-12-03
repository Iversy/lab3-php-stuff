const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');

const isProduction = process.env.NODE_ENV === 'production';
const stylesHandler = MiniCssExtractPlugin.loader;

const config = {
    entry: {
        app: './resources/js/app.js', // Основной файл JS
        bootstrap: './resources/js/bootstrap.js', // Дополнительный файл JS
        jquery: './resources/js/jquery.js', // Дополнительный файл JS
        sass: './resources/sass/app.sass', // Файл SASS
    },
    output: {
        path: path.resolve(__dirname, 'public/js'), // Путь для JS файлов
        filename: '[name].js', // Имя выходного файла
    },
    devServer: {
        open: true,
        host: 'localhost',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '../css/[name].css', // Путь для CSS файлов
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
