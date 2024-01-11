const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
	entry: {
		main: ['./js/src/main.js', './css/src/main.scss'],
	},
	output: {
		filename: './js/build/main.min.js',
		path: path.resolve(__dirname),
	},
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules/,
				loader: 'babel-loader',
			},
			{
				test: /\.(sass|scss)$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
			},
			{
				test: /\.(png|jpg|gif)$/,
				type: 'asset/resource',
				generator: {
					filename: './img/[name][ext]',
				},
			},
		],
	},
	plugins: [
		new CleanWebpackPlugin({
			cleanOnceBeforeBuildPatterns: ['./js/build/*', './css/build/*'],
		}),
		new MiniCssExtractPlugin({
			filename: './css/build/main.min.css',
		}),
	],
	optimization: {
		minimizer: [new CssMinimizerPlugin()],
	},
};
