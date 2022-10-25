// const path = require('path');
// const HtmlWebPackPlugin = require("html-webpack-plugin");
// const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const webpack = require('webpack');
// const devMode = process.env.NODE_ENV !== 'production';
// const ExtractTextPlugin = require('extract-text-webpack-plugin');
//
// module.exports = {
//     module: {
//         rules: [
//             {
//                 test: /\.txt$/,
//                 use: [
//                     {
//                         loader: 'file'
//                     }
//                 ]
//             },
//             {
//                 test: /\.js$/,
//                 exclude: /node_modules/,
//                 use: {
//                     loader: "babel-loader"
//                 }
//             },
//
//             {
//                 test: /\.pug$/,
//                 use: [
//                     "html-loader",
//                     "pug-html-loader"
//                 ]
//             },
//             {
//                 test: /\.css|styl$/,
//                 use: [
//                     {
//                         loader: MiniCssExtractPlugin.loader,
//                         options: {
//                             hmr: process.env.NODE_ENV === 'development',
//                         },
//                     },
//                     'css-loader',
//                     'stylus-loader',
//                 ],
//             },
//             {
//                 test: /\.(gif|png|jpe?g|svg)$/i,
//                 use: ["file-loader?name=[name].[ext]&outputPath=img/",
//                     {
//                         loader: 'image-webpack-loader',
//                         options: {
//                             bypassOnDebug: true,
//                             publicPath: 'http://localhost:8080/'
//                         }
//                     }
//                 ]
//             },
//             {
//                 test: /\.(eot|ttf|woff|woff2)$/,
//                 use: [
//                     {
//                         loader: 'file-loader?name=fonts/[name].[ext]'
//                     }
//                 ]
//             },
//         ]
//     },
//     plugins: [
//         new webpack.ProvidePlugin({
//             $: 'jquery',
//             jQuery: 'jquery'
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/index.pug",
//             filename: "./index.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/training.pug",
//             filename: "./training.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/barbershop.pug",
//             filename: "./barbershop.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/documentation.pug",
//             filename: "./documentation.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/hotel.pug",
//             filename: "./hotel.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/events.pug",
//             filename: "./events.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/event-detail.pug",
//             filename: "./event-detail.html"
//         }),
//         new HtmlWebPackPlugin({
//             template: "./src/news.pug",
//             filename: "./news.html"
//         }),
//         new MiniCssExtractPlugin('style.css'),
//     ]
// };

const path = require('path');
const fs = require('fs');
const HtmlWebPackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');

function generateHtmlPlugins(templateDir) {
    const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir));
    return templateFiles.map(item => {
        const parts = item.split('.');
        const name = parts[0];
        const extension = parts[1];
        return new HtmlWebPackPlugin({
            filename: `${name}.html`,
            template: path.resolve(__dirname, `${templateDir}/${name}.${extension}`)
        })
    })
}

const htmlPlugins = generateHtmlPlugins('./src/templates/views');

module.exports = {
    module: {
        rules: [
            {
                test: /\.txt$/,
                use: [
                    {
                        loader: 'file'
                    }
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        plugins: ['@babel/plugin-proposal-class-properties']
                    }
                }
            },

            {
                test: /\.pug$/,
                use: [
                    'html-loader',
                    'pug-html-loader'
                ]
            },
            {
                test: /\.css|styl$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            hmr: process.env.NODE_ENV === 'development',
                        },
                    },
                    'css-loader',
                    'stylus-loader',
                ],
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: ['file-loader?name=[name].[ext]&outputPath=img/',
                    {
                        loader: 'image-webpack-loader',
                        options: {
                            bypassOnDebug: true,
                            publicPath: 'http://localhost:8080/'
                        }
                    }
                ]
            },
            {
                test: /\.(webp)$/i,
                use: ['file-loader?name=[name].[ext]&outputPath=img/',
                    {
                        loader: 'webp-loader',
                        options: {
                            bypassOnDebug: true,
                            publicPath: 'http://localhost:8080/'
                        }
                    }
                ]
            },
            {
                test: /\.(eot|ttf|woff|woff2)$/,
                use: [
                    {
                        loader: 'file-loader?name=fonts/[name].[ext]'
                    }
                ]
            },
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),
        new MiniCssExtractPlugin('style.css'),
    ].concat(htmlPlugins)
};
