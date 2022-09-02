const path = require('path');
const mode = process.env.NODE_ENV === 'production' ? 'production' : 'development'

module.exports = {
    mode: mode,
    entry: './src/main.js',
    output: {
        filename: "bundle.js",
        path: path.resolve(__dirname, 'public')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                include: [
                    __dirname + 'node_modules/intl-tel-input/build/css/intlTelInput.css',
                    __dirname + 'node_modules/intl-tel-input/build/img/flags@2x.png"'
                ],
                use: {
                    loader: "babel-loader",
                },
            },
            {
                test: /\.css$/,
                use: ["style-loader", "css-loader"]
            }
        ]
    },
    devtool: 'source-map',
    devServer: {
        static: './public'
    }
};