#!/bin/bash
platform='unknown'

NORMAL="\\033[0;39m"
VERT="\\033[1;32m"
ROUGE="\\033[1;31m"
BLUE="\\033[1;34m"
ORANGE="\\033[1;33m"
ESC_SEQ="\x1b["
COL_RESET=$ESC_SEQ"39;49;00m"
COL_RED=$ESC_SEQ"31;01m"
COL_GREEN=$ESC_SEQ"32;01m"
COL_YELLOW=$ESC_SEQ"33;01m"
COL_BLUE=$ESC_SEQ"34;01m"
COL_MAGENTA=$ESC_SEQ"35;01m"
COL_CYAN=$ESC_SEQ"36;01m"

# Linux bin paths, change this if it can not be autodetected via which command
BIN="/usr/bin"
CP="$($BIN/which cp)"
SSH="$($BIN/which ssh)"
CD="$($BIN/which cd)"
GIT="$($BIN/which git)"
ECHO="$($BIN/which echo)"
LN="$($BIN/which ln)"
MV="$($BIN/which mv)"
RM="$($BIN/which rm)"
NGINX="/etc/init.d/nginx"
MKDIR="$($BIN/which mkdir)"
MYSQL="$($BIN/which mysql)"
MYSQLDUMP="$($BIN/which mysqldump)"
CHOWN="$($BIN/which chown)"
CHMOD="$($BIN/which chmod)"
GZIP="$($BIN/which gzip)"
ZIP="$($BIN/which zip)"
FIND="$($BIN/which find)"
TOUCH="$($BIN/which touch)"
PHP="$($BIN/which php)"
PERL="$($BIN/which perl)"
CURL="$($BIN/which curl)"
HASCURL=1
DEVMODE="--dev"
PHPCOPTS=" -d memory_limit=-1 "

### directory and file modes for cron and mirror files
FDMODE=0777
CDMODE=0700
CFMODE=600
MDMODE=0755
MFMODE=644

os=${OSTYPE//[0-9.-]*/}
if [[ "$os" == 'darwin' ]]; then
  platform='macosx'
elif [[ "$os" == 'msys' ]]; then
  platform='window'
elif [[ "$os" == 'linux' ]]; then
  platform='linux'
fi
echo -e "$ROUGE You are using $platform $NORMAL"

###
## SOURCE="${BASH_SOURCE[0]}"
## while [ -h "$SOURCE" ]; do # resolve $SOURCE until the file is no longer a symlink
##   DIR="$( cd -P "$( dirname "$SOURCE" )" && pwd )"
##   SOURCE="$(readlink "$SOURCE")"
##   [[ $SOURCE != /* ]] && SOURCE="$DIR/$SOURCE" # if $SOURCE was a relative symlink, we need to resolve it relative to the path where the symlink file was located
## done
## DIR="$( cd -P "$( dirname "$SOURCE" )" && pwd )"
## cd $DIR
## SCRIPT_PATH=`pwd -P` # return wrong path if you are calling this script with wrong location
SCRIPT_PATH="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)" # return /path/bin
echo -e "$VERT--> Your path: $SCRIPT_PATH $NORMAL"

# Usage info
show_help() {
  cat <<EOF
Usage: ${0##*/} [-hv] [-e APPLICATION_ENV] [development]...
    -h or --help         display this help and exit
    -e or --env APPLICATION_ENV
    -v or --verbose      verbose mode. Can be used multiple times for increased
                verbosity.
EOF
}
die() {
  printf '%s\n' "$1" >&2
  exit 1
}

# Initialize all the option variables.
# This ensures we are not contaminated by variables from the environment.
verbose=0
while :; do
  case $1 in
  -e | --env)
    if [ -z "$2" ]; then
      show_help
      die 'ERROR: please specify "--e" enviroment.'
    fi
    APPLICATION_ENV="$2"
    if [[ "$2" == 'd' ]]; then
      APPLICATION_ENV="development"
    fi
    if [[ "$2" == 'p' ]]; then
      APPLICATION_ENV="production"
    fi
    shift
    break
    ;;
  -h | -\? | --help)
    show_help # Display a usage synopsis.
    exit
    ;;
  -v | --verbose)
    verbose=$((verbose + 1)) # Each -v adds 1 to verbosity.
    ;;
  --) # End of all options.
    shift
    break
    ;;
  -?*)
    printf 'WARN: Unknown option (ignored): %s\n' "$1" >&2
    ;;
  *) # Default case: No more options, so break out of the loop.
    show_help # Display a usage synopsis.
    die 'ERROR: "--env" requires a non-empty option argument.'
    ;;
  esac
  shift
done

export APPLICATION_ENV="${APPLICATION_ENV}"

echo -e "$VERT--> You are uing APPLICATION_ENV: $APPLICATION_ENV $NORMAL"

command -v $PHP >/dev/null || {
  echo "The 'php' command not found."
  exit 1
}

command -v $PERL >/dev/null || {
  echo "The 'perl' command not found."
  exit 1
}
HASCURL=1

command -v curl >/dev/null || HASCURL=0

if [ -z "$1" ]; then
  DEVMODE=$1
else
  DEVMODE="--no-dev"
fi

### settings / options
PHPCOPTS="-d memory_limit=-1"
[ ! -d $SCRIPT_PATH/../vendor ] && $ECHO "No vendor directory found" || $RM -rf $SCRIPT_PATH/../vendor/

### Botble CMS
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\$2y\$10\$3YhOlbfqdoGO4p2zqKy31\.fsc1PvUHXTDVJRcygSrkMkXsJHxZA1S/\$2y\$10\$lZKL3LWN0qQzmvpE08ZHFevJ03KUxZLF3WNhF4vjm7QvClpGHfN4G/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/fz4b0vx1qH8FqKTlV6cBqvLKO77jYw1LF9isQdk69XqQaYoi6LrZH3u76sB7/p06LuSjwHLbW8B52cMsAaMiIpXviS8uPBjhJukECiUjIfwcLr6i5TuCh4mgd/g' $SCRIPT_PATH/../database.sql)

### Flexhome Realestate
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\$2y\$10\$KgoSOMzybWZRhFlWztjor\.eorottkCvC2iqXdBhnnt9qCWiLNtQii/\$2y\$10\$lZKL3LWN0qQzmvpE08ZHFevJ03KUxZLF3WNhF4vjm7QvClpGHfN4G/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/fz4b0vx1qH8FqKTlV6cBqvLKO77jYw1LF9isQdk69XqQaYoi6LrZH3u76sB7/p06LuSjwHLbW8B52cMsAaMiIpXviS8uPBjhJukECiUjIfwcLr6i5TuCh4mgd/g' $SCRIPT_PATH/../database.sql)

### Shopwise
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\$2y\$10\$edqrYk\.wiQgWuc4Z9QMyquzDE9xT8C7GsMXAtgNkfD1WIuMQu026q/\$2y\$10\$lZKL3LWN0qQzmvpE08ZHFevJ03KUxZLF3WNhF4vjm7QvClpGHfN4G/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/fz4b0vx1qH8FqKTlV6cBqvLKO77jYw1LF9isQdk69XqQaYoi6LrZH3u76sB7/p06LuSjwHLbW8B52cMsAaMiIpXviS8uPBjhJukECiUjIfwcLr6i5TuCh4mgd/g' $SCRIPT_PATH/../database.sql)

($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/admin\@botble\.com/sysadmin\@gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/admin\@botble.com - 159357/sysadmin\@gistensal.com - Viweb\@\@1234/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble - 159357/sysadmin\@gistensal.com - Viweb\@\@1234/g' $SCRIPT_PATH/../database.sql)

($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/A young team in Vietnam/Laravel is the best/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/dev-botble/dev-laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/1\.envato\.market\/LWRBY/mailto\:get-quote\@visualweber\.co/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/https\:\/\/codecanyon\.net\/item\/botble-cms-php-platform-based-on-laravel-framework\/16928182/laravel-cms\.demo\.gistensal.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Database\: botble/Database\: laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble CMS/Laravel CMS/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/flex-home.com/laravel-realestate.gistensal.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble.ticksy.com/laravel-cms\.demo\.gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble, botble team, botble platform//g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/cms\.botble\.com/laravel-cms\.demo\.gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble.local/laravel-cms\.demo\.gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble.technologies/laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble Platform/Laravel Platform/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/twitter\.com\/botble/twitter\.com\/laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble CMS/Laravel CMS/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble-cms/laravel-cms/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/minhsang2603/toan\.lehuy/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/sangnguyen2603/toan\.lehuy/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/minsang2603/toan\.lehuy/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/sangnguyen\.info/laravel-cms\.demo\.gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Nghia Minh/Developer Team/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble since v2.0/Laravel CMS since v2.0/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\//\"platform\//g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/84988606928/84943999819/g' $SCRIPT_PATH/../database.sql)

## ($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe "s/\'botble\'/\'get-quote\@visualweber\.com\'/g")
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble\.cms\@gmail\.com/get-quote@visualweber.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/nghiadev\.com/laravel-cms\.demo\.gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/The Botble/The Laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/minhsang2603\@gmail\.com/get-quote@visualweber.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/sangplus\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g' $SCRIPT_PATH/../database.sql)

($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble\\\\/Platform\\\\/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble\\/Platform\\/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble\\\\/Platform\\\\/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble\\/Platform\\/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble\.com/laravel-cms\.demo\.gistensal\.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble/Laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble\/cms/laravel\/cms/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\=botble/\=laravel/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Nghia Minh/Developer Team/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble Technologies/Laravel Technologies/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Sang Nguyen/Developer Team/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/sangnguyenplus\@gmail\.com/get-quote@visualweber.com/g' $SCRIPT_PATH/../database.sql)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble/sysadmin\@gistensal\.com/g' $SCRIPT_PATH/../database.sql)

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php'  -print0 | xargs -0 $PERL -i -pe 's/botble_cookie_consent/cms_cookie_consent/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json'  -print0 | xargs -0 $PERL -i -pe 's/dev-botble/dev-laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json'  -print0 | xargs -0 $PERL -i -pe 's/baoboine\/botble-comment/vswb\/comment/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md'  -print0 | xargs -0 $PERL -i -pe 's/baoboine\/botble-comment/vswb\/comment/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.vue'  -print0 | xargs -0 $PERL -i -pe 's/baoboine\/botble-comment/vswb\/comment/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.js'  -print0 | xargs -0 $PERL -i -pe 's/baoboine\/botble-comment/vswb\/comment/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/https\:\/\/botble\.com\/storage\/uploads\/1/https\:\/\/laravel-cms\.demo\.gistensal\.com\/docs-cms\/images\/analytics/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/contact\@botble\.com/get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/\`botble\` - \`159357\`/sysadmin\@gistensal.com - Viweb\@\@1234/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/\`botble\`/sysadmin\@gistensal.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/\`159357\`/Viweb\@\@1234/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/https\:\/\/codecanyon\.net\/user\/botble/get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/\`botble\/plugin-management\`/\`platform\/plugin-management\`/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/whats-new-in-botble-cms-33/whats-new-in-laravel-cms-33/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/https\:\/\/github\.com\/botble\/issues\/issues\/1/https\:\/\/github\.com\/google\/issues\/issues\/1/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/\/vendor\/botble\/menu/\/vendor\/platform\/menu/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md'  -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md'  -print0 | xargs -0 $PERL -i -pe 's/botble.com/laravel-cms\.demo\.gistensal.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/1\.envato\.market\/LWRBY/mailto\:get-quote\@visualweber\.co/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/https\:\/\/codecanyon\.net\/item\/botble-cms-php-platform-based-on-laravel-framework\/16928182/laravel-cms\.demo\.gistensal.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/\/botble\//\/vswb\//g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/Botble plugin/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.md' -print0 | xargs -0 $PERL -i -pe 's/composer require botble/composer require platform/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '.env.example'  -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../resources/ -type f -name '*.php'  -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php'  -print0 | xargs -0 $PERL -i -pe 's/botble\:\:log\-viewer/platform\:\:log\-viewer/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php'  -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')

#($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\\Botble\\/\\Platform\\/g' $SCRIPT_PATH/../_ide_helper.php)
#($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble\\/Platform\\/g' $SCRIPT_PATH/../_ide_helper.php)

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../resources/ -type f -name '*.php'  -print0 | xargs -0 $PERL -i -pe 's/flex-home.com/laravel-realestate.gistensal.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php'  -print0 | xargs -0 $PERL -i -pe 's/flex-home.com/laravel-realestate.gistensal.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/flex-home.com/laravel-realestate.gistensal.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/support\@botble\.com/get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/https\:\/\/botble.com\/go\/download-cms/mailto\:get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/https\:\/\/botble.com/mailto\:get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble BOT/Anonymous BOT/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble_session/platform_session/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble Team/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Ex: botble/Ex: your-key/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/amazonaws.com\/botble/amazonaws.com\/your-key/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\"/\"Laravel Framework\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble cms/Laravel CMS/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble platform/Laravel CMS Platform/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble assets/Laravel CMS Assets/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble git commit checker/Git Commit Checker/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble.ticksy.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble.ticksy.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble.ticksy.com/laravel-cms\.demo\.gistensal\.com/g')
#
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble, botble team, botble platform//g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble, botble team, botble platform//g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble, botble team, botble platform//g')
#
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/cms\.botble\.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/cms\.botble\.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/cms\.botble\.com/laravel-cms\.demo\.gistensal\.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble.local/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble.local/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble.local/laravel-cms\.demo\.gistensal\.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble Platform/Laravel Platform/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble Platform/Laravel Platform/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Botble Platform/Laravel Platform/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble.technologies/laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble.technologies/laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble.technologies/laravel/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/twitter\.com\/botble/twitter\.com\/laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/twitter\.com\/botble/twitter\.com\/laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/twitter\.com\/botble/twitter\.com\/laravel/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/Laravel CMS/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble-cms/laravel-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble-cms/laravel-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble-cms/laravel-cms/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/minsang2603/toan\.lehuy/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/minsang2603/toan\.lehuy/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/minsang2603/toan\.lehuy/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/sangnguyen2603/toan\.lehuy/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/sangnguyen2603/toan\.lehuy/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/sangnguyen2603/toan\.lehuy/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/minsang2603/toan\.lehuy/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/minsang2603/toan\.lehuy/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/minsang2603/toan\.lehuy/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/sangnguyen\.info/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/sangnguyen\.info/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/sangnguyen\.info/laravel-cms\.demo\.gistensal\.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Nghia Minh/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Nghia Minh/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Nghia Minh/Developer Team/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble since v2.0/Laravel CMS since v2.0/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble since v2.0/Laravel CMS since v2.0/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Botble since v2.0/Laravel CMS since v2.0/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/\"botble\//\"platform\//g')
#($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\//\"platform\//g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/\"botble\//\"platform\//g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/84988606928/84943999819/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/84988606928/84943999819/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/84988606928/84943999819/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../resources/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../resources/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../resources/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/docs\.botble\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe "s/'botble'/'get-quote\@visualweber\.com'/g")
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe "s/'botble'/'get-quote\@visualweber\.com'/g")
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe "s/'botble'/'get-quote\@visualweber\.com'/g")


($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/admin\@botble\.com/get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/admin\@botble\.com/get-quote\@visualweber\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/admin\@botble\.com/get-quote\@visualweber\.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble\.cms\@gmail\.com/get-quote@visualweber.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble\.cms\@gmail\.com/get-quote@visualweber.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble\.cms\@gmail\.com/get-quote@visualweber.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/nghiadev\.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/nghiadev\.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/nghiadev\.com/laravel-cms\.demo\.gistensal\.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/The Botble/The Laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/The Botble/The Laravel/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/The Botble/The Laravel/g')


($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Nghia Minh/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Nghia Minh/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Nghia Minh/Developer Team/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble Technologies/Laravel Technologies/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble Technologies/Laravel Technologies/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Botble Technologies/Laravel Technologies/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Sang Nguyen/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Sang Nguyen/Developer Team/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Sang Nguyen/Developer Team/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/sangnguyenplus\@gmail\.com/get-quote@visualweber.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/sangnguyenplus\@gmail\.com/get-quote@visualweber.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/sangnguyenplus\@gmail\.com/get-quote@visualweber.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/minhsang2603\@gmail\.com/get-quote@visualweber.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/minhsang2603\@gmail\.com/get-quote@visualweber.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/minhsang2603\@gmail\.com/get-quote@visualweber.com/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/sangplus\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/sangplus\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/sangplus\.com/laravel-cms\.demo\.gistensal\.com\/docs-cms/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble\\\\/Platform\\\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble\\\\/Platform\\\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Botble\\\\/Platform\\\\/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../resources/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.env' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.env' -print0 | xargs -0 $PERL -i -pe 's/Botble CMS/CMS Platform/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../database/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble\\\\/Platform\\\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../database/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble\\/Platform\\/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../database/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/admin\@botble.com/sysadmin\@gistensal.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../database/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/159357/Viweb\@\@1234/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../database/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/Botble Technologies/Laravel Technologies/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/botble/sysadmin/g' $SCRIPT_PATH/../database/seeders/UserSeeder.php)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/Botble\\/Platform\\/g' $SCRIPT_PATH/../_ide_helper.php)

## hack license +1k years
## ($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe "s/return \$response\-\>setError\(\)\-\>setMessage\(\'Your license is invalid, please contact support\'\)\;/\/\/ return \$response\-\>setError\(\)\-\>setMessage\(\'Your license is invalid, please contact support.\'\)\;/g")

############################ VERY IMPORTANT: Below lines MUST BE run at the end of ABOVE process
############################ BEGIN: make sure all botble.com domain already have replaced by gistensal.com
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.php' -print0 | xargs -0 $PERL -i -pe 's/botble\.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/botble\.com/laravel-cms\.demo\.gistensal\.com/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.stub' -print0 | xargs -0 $PERL -i -pe 's/botble\.com/laravel-cms\.demo\.gistensal\.com/g')

## BEGIN: Assets & Git Commit Checker Package Processing
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/assets\"\: \"\^1\.0\"/\"platform\/assets\"\: \"\*\@dev\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/git-commit-checker\"\: \"\^1\.0\"/\"platform\/git-commit-checker\"\: \"\*\@dev\"/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/assets/\"platform\/assets/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/git-commit-checker/\"platform\/git-commit-checker/g')
## END: Assets & Git Commit Checker Package Processing

($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/comment/\"platform\/comment/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/api/\"platform\/api/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/menu/\"platform\/menu/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/optimize/\"platform\/optimize/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/page/\"platform\/page/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/platform/\"platform\/platform/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/shortcode/\"platform\/shortcode/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/theme\"/\"platform\/theme\"/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/theme-generator\"/\"platform\/theme-generator\"/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/plugin-management/\"platform\/plugin-management/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/dev-tool/\"platform\/dev-tool/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/plugin-generator/\"platform\/plugin-generator/g' $SCRIPT_PATH/../composer.json)
($CD $SCRIPT_PATH/../ && LC_ALL=C $PERL -i -pe 's/\"botble\/widget-generator/\"platform\/widget-generator/g' $SCRIPT_PATH/../composer.json)

## ($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\//\"platform\//g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/comment/\"platform\/comment/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/dev-tool/\"platform\/dev-tool/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/api\"/\"platform\/api\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/menu\"/\"platform\/menu\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/optimize\"/\"platform\/optimize\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/page\"/\"platform\/page\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/platform\"/\"platform\/platform\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/shortcode\"/\"platform\/shortcode\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/theme\"/\"platform\/theme\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/theme-generator\"/\"platform\/theme-generator\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/plugin-management/\"platform\/plugin-management/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/dev-tool/\"platform\/dev-tool/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/plugin-generator/\"platform\/plugin-generator/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/widget-generator\"/\"platform\/widget-generator\"/g')

($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/widget\"/\"platform\/widget\"/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/sitemap/\"platform\/sitemap/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/slug/\"platform\/slug/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/seo-helper/\"platform\/seo-helper/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/revision/\"platform\/revision/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/analytics/\"platform\/analytics/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/social-login/\"platform\/social-login/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/captcha/\"platform\/captcha/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/translation/\"platform\/translation/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/\{\-name\}/\"platform\/\{\-name\}/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/git-commit-checker/\"platform\/git-commit-checker/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/impersonate/\"platform\/impersonate/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/payment/\"platform\/payment/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/newsletter/\"platform\/newsletter/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/mollie/\"platform\/mollie/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/paystack/\"platform\/paystack/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/razorpay/\"platform\/razorpay/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/square/\"platform\/square/g')
($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/simple-slider/\"platform\/simple-slider/g')
#($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.json' -print0 | xargs -0 $PERL -i -pe 's/\"botble\/sample/\"platform\/sample/g')


($CD $SCRIPT_PATH/../ && LC_ALL=C $FIND $SCRIPT_PATH/../platform/ -type f -name '*.js' -print0 | xargs -0 $PERL -i -pe 's/Created by Botble/Created by Laravel/g')
############################ END: make sure all botble.com domain already have replaced by gistensal.com
#


## ($CD $SCRIPT_PATH/../ && LC_ALL=C $ZIP -r botble.zip . -x \*.buildpath/\* \*.idea/\* \*.project/\* \*nbproject/\* \*.git/\* \*.svn/\* \*.gitignore\* \*.gitattributes\* \*.md \*.MD \*.log \*.tar.gz \*.gz \*.tar \*.rar \*.DS_Store \*.lock \*desktop.ini vhost-nginx.conf \*.tmp \*.bat bin/delivery.sh bin/remove-botble.sh readme.html composer.lock wp-config.secure.php \*.yml\* \*.editorconfig\* \*.rnd\*)
