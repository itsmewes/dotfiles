eval "$(/opt/homebrew/bin/brew shellenv)"
eval "$(starship init bash)"
eval "$(fnm env --use-on-cd)"
eval "$(zoxide init bash)"

. ~/.bash_aliases
. /Applications/Ghostty.app/Contents/Resources/ghostty/shell-integration/bash/ghostty.bash

PATH=~/.composer/vendor/bin:~/.local/bin:~/go/bin:$PATH
export EDITOR='nvim'
export VISUAL='nvim'
. "$HOME/.cargo/env"


# Herd injected PHP 8.2 configuration.
export HERD_PHP_82_INI_SCAN_DIR="/Users/wesleymartin/Library/Application Support/Herd/config/php/82/"


# Herd injected PHP binary.
export PATH="/Users/wesleymartin/Library/Application Support/Herd/bin/":$PATH


# Herd injected PHP 7.4 configuration.
export HERD_PHP_74_INI_SCAN_DIR="/Users/wesleymartin/Library/Application Support/Herd/config/php/74/"


# Herd injected PHP 8.1 configuration.
export HERD_PHP_81_INI_SCAN_DIR="/Users/wesleymartin/Library/Application Support/Herd/config/php/81/"


# Herd injected PHP 8.0 configuration.
export HERD_PHP_80_INI_SCAN_DIR="/Users/wesleymartin/Library/Application Support/Herd/config/php/80/"


# Herd injected PHP 8.3 configuration.
export HERD_PHP_83_INI_SCAN_DIR="/Users/wesleymartin/Library/Application Support/Herd/config/php/83/"


# Herd injected NVM configuration
export NVM_DIR="/Users/wesleymartin/Library/Application Support/Herd/config/nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
