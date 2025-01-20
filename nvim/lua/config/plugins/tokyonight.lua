return {
	{
		'folke/tokyonight.nvim',
		config = function()
			require("tokyonight").setup({
				style = "night",
				on_colors = function(colors)
					colors.bg = "#0E131F"
					colors.yellow = "#d2904c"
					colors.green = "#137876"
					colors.green1 = "#137876"
					colors.green2 = "#137876"
					colors.red = "#bd3066"
					colors.purple = "#4d5ddd"
					colors.cyan = "#328abf"
					colors.blue = "#2b73ac"
					colors.orange = "#b95753"
					colors.pink = "#9f3cb5"
					colors.purple = "#9f3cb5"
				end
			})
			vim.cmd.colorscheme "tokyonight"
		end,
	}
}
