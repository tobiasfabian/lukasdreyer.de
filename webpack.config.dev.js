const path = require('path');

module.exports = {
  entry: {
    script: './develop/js/script.js',
  },
  mode: 'development', // use 'none' to debug IE
  cache: false,
  watch: true,
  devtool: 'source-map',
  output: {
    path: path.resolve(__dirname, 'build/assets/js'),
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
        },
      },
    ],
  },
};
