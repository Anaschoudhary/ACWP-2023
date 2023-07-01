const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const OptimizeCssAssetsPlugin = require("css-minimizer-webpack-plugin");
const cssnano = require("cssnano");
const UglifyJsPlugin = require("uglify-js");

const JS_DIR = path.resolve(__dirname, "src/js");
const IMG_DIR = path.resolve(__dirname, "src/img");
const BUILD_DIR = path.resolve(__dirname, "build");

const entry = {
  main: JS_DIR + "/main.js",
  single: JS_DIR + "/single.js",
};

const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
};
const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
  {
    test: /\.scss$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: [MiniCssExtractPlugin.loader, "css-loader"],
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: [
      {
        loader: "file-loader",
        options: {
          name: "[path][name].[ext]",
          publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
        },
      },
    ],
  },
];

const plugins = (argv) => [
  new CleanWebpackPlugin({
    cleanStaleWebpackAssets: "production" === argv.mode,
  }),
  new MiniCssExtractPlugin({
    filename: "css/[name].css",
  }),
];

module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  devtools: "source-map",
  devServer: {
    inline: false,
  },
  module: {
    rules: rules,
  },
  optimization: {
    minimizer: [
      new OptimizeCssAssetsPlugin({
        cssProcessor: cssnano,
      }),
      // new UglifyJsPlugin({
      //   // cache: false,
      //   // parallel: true,
      //   // sourceMap: false,
      // }),
    ],
  },
  plugins: plugins(argv),
  externals: {
    jquery: "jQuery",
  },
});
