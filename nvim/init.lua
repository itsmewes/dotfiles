vim.g.mapleader = " "
vim.g.maplocalleader = "\\"

require("config.lazy")

vim.keymap.set("n", "yL", "^vg_y")
vim.keymap.set("n", "vL", "^vg_")

vim.wo.number=true
vim.wo.relativenumber=true
vim.wo.wrap=false
vim.opt.shiftround=true
vim.opt.incsearch=true
vim.opt.expandtab=true
vim.opt.clipboard="unnamed,unnamedplus"
vim.opt.tabstop=4
vim.opt.softtabstop=4
vim.opt.shiftwidth=4
vim.opt.scrolloff=8
