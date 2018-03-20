#!/bin/bash

# ----------------------
# KUDU Deployment Script
# Version: 1.0.15
# ----------------------

# Helpers
# -------

exitWithMessageOnError () {
  if [ ! $? -eq 0 ]; then
    echo "An error has occurred during web site deployment."
    echo $1
    exit 1
  fi
}

# Prerequisites
# -------------

# Verify node.js installed
hash node 2>/dev/null
exitWithMessageOnError "Missing node.js executable, please install node.js, if already installed make sure it can be reached from current environment."

# Setup
# -----

SCRIPT_DIR="${BASH_SOURCE[0]%\\*}"
SCRIPT_DIR="${SCRIPT_DIR%/*}"
ARTIFACTS=$SCRIPT_DIR/../artifacts
KUDU_SYNC_CMD=${KUDU_SYNC_CMD//\"}

if [[ ! -n "$DEPLOYMENT_SOURCE" ]]; then
  DEPLOYMENT_SOURCE=$SCRIPT_DIR
fi

if [[ ! -n "$NEXT_MANIFEST_PATH" ]]; then
  NEXT_MANIFEST_PATH=$ARTIFACTS/manifest

  if [[ ! -n "$PREVIOUS_MANIFEST_PATH" ]]; then
    PREVIOUS_MANIFEST_PATH=$NEXT_MANIFEST_PATH
  fi
fi

if [[ ! -n "$DEPLOYMENT_TARGET" ]]; then
  DEPLOYMENT_TARGET=$ARTIFACTS/wwwroot
else
  KUDU_SERVICE=true
fi

if [[ ! -n "$KUDU_SYNC_CMD" ]]; then
  # Install kudu sync
  echo Installing Kudu Sync
  npm install kudusync -g --silent
  exitWithMessageOnError "npm failed"

  if [[ ! -n "$KUDU_SERVICE" ]]; then
    # In case we are running locally this is the correct location of kuduSync
    KUDU_SYNC_CMD=kuduSync
  else
    # In case we are running on kudu service this is the correct location of kuduSync
    KUDU_SYNC_CMD=$APPDATA/npm/node_modules/kuduSync/bin/kuduSync
  fi
fi

# PHP Helpers
# -----------

initializeDeploymentConfig() {
	if [ ! -e "$COMPOSER_ARGS" ]; then
    COMPOSER_ARGS="--no-interaction --prefer-dist --optimize-autoloader --no-progress --no-dev --verbose"
    echo "No COMPOSER_ARGS variable declared in App Settings, using the default settings"
  else
    echo "Using COMPOSER_ARGS variable declared in App Setting"
  fi
  echo "Composer settings: $COMPOSER_ARGS"
}

##################################################################################################################################
# Deployment
# ----------

echo build Laravel application

pushd $DEPLOYMENT_SOURCE
  initializeDeploymentConfig
  ./bin/composer install $COMPOSER_ARGS
  exitWithMessageOnError "Composer install failed"
popd

#  KuduSync
if [[ "$IN_PLACE_DEPLOYMENT" -ne "1" ]]; then
  "$KUDU_SYNC_CMD" -v 50 -f "$DEPLOYMENT_SOURCE" -t "$DEPLOYMENT_TARGET" -n "$NEXT_MANIFEST_PATH" -p "$PREVIOUS_MANIFEST_PATH" -i ".git;.hg;.deployment;deploy.sh"
  exitWithMessageOnError "Kudu Sync failed"
fi

pushd $DEPLOYMENT_TARGET
  php artisan config:cache
  exitWithMessageOnError "Failed to generate config cache"
  php artisan route:cache
  exitWithMessageOnError "Failed to generate route cache"
  php artisan migrate --force
  exitWithMessageOnError "Failed to migrate Database"

echo PHP deployment


##################################################################################################################################
echo "Finished successfully."
