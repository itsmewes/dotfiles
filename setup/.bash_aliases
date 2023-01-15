alias eba='vim ~/.bash_aliases'
alias sba='source ~/.bash_aliases'

alias ls='exa'
alias ll='exa --long --header --git'
alias la='exa --long --header --git --all'

alias vim='nvim'

alias please='sudo $(fc -ln -1)'

alias adb='/Users/wesleymartin/Library/Android/sdk/platform-tools/adb'

# Laravel
alias art='php artisan'

#PHP
alias php81='$(brew --prefix php@8.1)/bin/php'
alias php81c='php81 /usr/local/bin/composer'
alias php80='$(brew --prefix php@8.0)/bin/php'
alias php80c='php80 /usr/local/bin/composer'
alias php74='$(brew --prefix php@7.4)/bin/php'
alias php74c='php74 /usr/local/bin/composer'
alias php73='$(brew --prefix php@7.3)/bin/php'
alias php73c='php73 /usr/local/bin/composer'

# Git
alias gc='git add . && git commit -am'
alias gs='git status'
alias gbd='git branch -D'
alias gb='git branch'
alias g-='git checkout -'
alias gbc='git checkout -b'
alias gnah='git reset --hard; git clean -df;'
alias gfresh='git branch | grep -v -e "master" -e "develop" -e "staging" | xargs git branch -D'
alias gmm='git branch --merged master | egrep -v "(^\*|master|staging)" | xargs git branch -d'
alias gcm='git checkout master'
alias gcd='git checkout develop'
alias gcs='git checkout staging'
alias grb='git branch | fzf --header Merge | xargs git rebase'
alias gmb='git branch | fzf --header Merge | xargs git merge'
alias gch='git branch --sort=-committerdate | fzf --header Checkout | xargs git checkout'
alias gir='git rm -r --cached . && git add .'
alias gcbn='git branch --show-current | tr -d '\n' | pbcopy'
alias gpull='git pull origin HEAD'
alias gcf='git diff --name-only master..HEAD'
function gl() {
	days="${1:-2}"
    git log --oneline --all --author=wesley --since="$days".days.ago --pretty=format:"%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cd) %C(bold blue)<%an>%Creset" --abbrev-commit --date=format-local:'%Y-%m-%d %H:%M:%S'
}
function gpr() {
    branch=$(git rev-parse --abbrev-ref HEAD)

    open https://github.com/carandclassic/carandclassic/pull/new/"$branch"
}

# Vagrant
alias vu='cd /Volumes/www/carandclassic-ansible && vagrant up && cd -'
alias vd='cd /Volumes/www/carandclassic-ansible && vagrant halt && cd -'
alias vssh='cd /Volumes/www/carandclassic-ansible && vagrant ssh'

# Open Programs
alias subl='/Applications/Sublime\ Text.app/Contents/SharedSupport/bin/subl'
alias iterm='open -a iTerm .'
alias ff='/Applications/Firefox.app/Contents/MacOS/firefox'
alias chrome='/Applications/Google\ Chrome.app/Contents/MacOS/Google\ Chrome'

# File/Folder Manipulation
alias goin='cd $_'
function mkd(){
	mkdir -p $1 && cd $_
}

alias www="cd ~/Code"
function ww(){
	DIR=`find ~/Code/* -maxdepth 0 -type d -print 2> /dev/null | fzf-tmux` \
	&& cd "$DIR"
}

n ()
{
    # Block nesting of nnn in subshells
    if [ -n $NNNLVL ] && [ "${NNNLVL:-0}" -ge 1 ]; then
        echo "nnn is already running"
        return
    fi

    # The behaviour is set to cd on quit (nnn checks if NNN_TMPFILE is set)
    # To cd on quit only on ^G, either remove the "export" as in:
    #    NNN_TMPFILE="${XDG_CONFIG_HOME:-$HOME/.config}/nnn/.lastd"
    #    (or, to a custom path: NNN_TMPFILE=/tmp/.lastd)
    # or, export NNN_TMPFILE after nnn invocation
    export NNN_TMPFILE="${XDG_CONFIG_HOME:-$HOME/.config}/nnn/.lastd"

    # Unmask ^Q (, ^V etc.) (if required, see `stty -a`) to Quit nnn
    # stty start undef
    # stty stop undef
    # stty lwrap undef
    # stty lnext undef

    nnn "$@"

    if [ -f "$NNN_TMPFILE" ]; then
            . "$NNN_TMPFILE"
            rm -f "$NNN_TMPFILE" > /dev/null
    fi
}

alias cac="cd ~/www/carandclassic/laravel"

#ssh
function scd(){
	d="${2:-/var/www/html}"
	ssh -t $1 "cd ${d}; bash"
}

# Heroku
function hrc(){
	heroku run php artisan config:cache --remote $1;
	heroku run php artisan route:cache --remote $1;
	heroku run php artisan view:cache --remote $1;
}

# Docker
function dcu(){
	docker-compose up -d
}

function dcd(){
	docker-compose down
}

# Optimisations
function oimg(){
   /Applications/ImageOptim.app/Contents/MacOS/ImageOptim "$@" 
}

# Network
function getip() {
	dig +short $1 | pbcopy
}

#Image
#Crop the transparent pixels from an image using imagemagic.
function itrim() {
	convert $1 -trim +repage $1
}

# Convert to avif
function toavif() {
    ffmpeg -i "$1" -c:v libaom-av1 -still-picture 1 "$2"
}

## Convert svg to png at a specific size size.
## svgToPng relies on rsvg-convert (https://github.com/GNOME/librsvg, https://formulae.brew.sh/formula/librsvg#default) being installed
## Usage: svgToPng convertFrom.svg convertTo.png w[optional - w/h] 80
function svgToPng() {
    case $3 in
    w)
        rsvg-convert -w $4 $1 -o $2
        ;;
    h)
        rsvg-convert -h $4 $1 -o $2
        ;;
    *)
        rsvg-convert -w $3 $1 -o $2
        ;;
    esac
}

# Take a screen shot (MacOS)
# sshot -ivU -> Take video
# sshot -c -> Screenshot is added to clipboard
# sshot -i -> Interactively take screenshot
function sshot() {
	screencapture -t png $* screenshot$(date +%s).png
}

alias peek='qlmanage -p'

gzipchk(){ curl -sILH 'Accept-Encoding: gzip,deflate,br' "$@" | grep --color -i 'Content-Encoding:'; }

function vcom() {
    output="${2:-$1}"
    audio=""
    scale="fps=30"

    if [ -n "$3" ] && [ "$3" == "false" ]
    then
          audio="-an"
    fi

    if [ -n "$4" ]
    then
        scale="fps=30,scale=-1:$4"
    fi

    ffmpeg -i "$1" -vf "$scale" -c:v libx264 -preset slow -crf 28 $audio "${output%.*}.mp4"
}

function vdec() {
    output="${2:-$1}"
    ffmpeg -i "$1" -vf mpdecimate,setpts=N/FRAME_RATE/TB,fps=30 -c:v libx264 -preset fast -crf 28 -an "${output%.*}.mp4"
}

function vidToGif() {
    ffmpeg -i "$1" -filter_complex "[0:v] fps=30,scale=600:-1,split [a][b]; [a] palettegen [p];[b][p] paletteuse" "${1%.*}.gif"
}

function fcom() {
    dir=$(osascript <<'EOF'
    tell application "Finder" to get the POSIX path of (target of front window as alias)
EOF
)
    ( cd "$dir" && $@ )
}

alias ytdl='youtube-dl -f "bestvideo[height<=720]+bestaudio/best[height<=720]"'

# Fixes
alias fixHomebrewPerms='sudo chown -R $(whoami) $(brew --prefix)/*'

export VISUAL=vi

set -o vi
bind -m vi-command 'Control-l: clear-screen'
bind -m vi-insert 'Control-l: clear-screen'
bind "set completion-ignore-case on"
bind "set show-all-if-ambiguous on"
bind Space:magic-space
