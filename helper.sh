#!/bin/bash
############################################################
# Help                                                     #
############################################################
Help() {
  # Display Help
  echo "Please select mode type therefor you need!"
  echo
  echo 'Syntax: sh ./helper.sh [-h] [-y] [-t "<type-of-mode>"] [-e "<name-of-environment>"] [-b "<name-of-branch>"] [-v "<name-of-version>"] [-m "message-of-commit"]'
  echo 'Example 1 - Help: sh ./helper.sh -h'
  echo 'Example 2 - Tag: sh ./helper.sh -t tag -e dev -v "1.0.0"'
  echo 'Example 3 - Test: sh ./helper.sh -t test"'
  echo 'Example 4 - Commit: sh ./helper.sh -t commit -b dev -m "Update code"'
  echo 'Example 5 - Combo: sh ./helper.sh -t commit-tag -b dev -m "Update code" -e sb -v "1.0.0"'
  echo 'Example 6 - Combo: sh ./helper.sh -t test-commit-tag -b dev -m "Update code" -e sb -v "1.0.0"'
  echo "options:"
  echo "h     Print this Help."
  echo "t     Type of mode"
  echo "a     Build Android"
  echo "e     Environment. Default to mc as sandbox-merchant"
  echo "b     Branch. Default branch dev"
  echo "v     Version. Default version 1.0.0"
  echo "m     Message of commit. Default 'Update code'"
  echo "y     Bypass prompt yes/no."
  echo
}

############################################################
# Loading                                                  #
############################################################
Space() {
  times=3
  # check npe argument of times
  if [ -n "$1" ]; then
    times="$1"
  fi
  for ((i = 0; i < $times; i++)); do
    echo ""
  done
}

function ProgressBar {
  # Process data
  let _progress=(${1} * 100 / ${2} * 100)/100
  let _done=(${_progress} * 4)/10
  let _left=40-$_done
  # Build progressbar string lengths
  _done=$(printf "%${_done}s")
  _left=$(printf "%${_left}s")

  # 1.2 Build progressbar strings and print the ProgressBar line
  # 1.2.1 Output example:
  # 1.2.1.1 Progress : [########################################] 100%
  printf "\rProgress: [${_done// /#}${_left// /-}] ${_progress}%%"
}

############################################################
############################################################
# Add tag and push to current branch                       #
############################################################
############################################################
AddTag() {
  # check npe argument of env
  if [ -n "$1" ]; then
    env="$1"
  fi
  # check npe argument of version
  if [ -n "$2" ]; then
    version="$2"
  fi
  # current date directly
  current=$(date '+%Y%m%d%H%M%S')
  # print tag
  echo "v$version-$current-$env"
  git tag "v$version-$current-$env"
  git push origin "v$version-$current-$env"
}

############################################################
############################################################
# Commit and push                                          #
############################################################
############################################################
Commit() {
  # check npe argument of branch
  if [ -n "$1" ]; then
    branch="$1"
  fi
  # check commit argument
  if [ -n "$2" ]; then
    message="$2"
  fi
  echo "Commit and push code change on $branch with message: $message"
  git add .
  git commit -m "$message"
  git pull origin "$branch"
  git push origin "$branch"
}

############################################################
############################################################
# Unit test                                                #
############################################################
############################################################
UnitTest() {
  npm run test
}

############################################################
############################################################
# Build Android                                            #
############################################################
############################################################
BuildAndroid() {
  cd /android/ && ./gradlew assembleRelease
}

############################################################
############################################################
# Switch command                                           #
############################################################
############################################################
Switch() {
  # check commit argument
  if [ -z "$1" ]; then
    Help
    exit
  fi

  if [ "$1" == "commit" ]; then
    Commit "$branch" "$message"
  fi

  if [ "$1" == "tag" ]; then
    AddTag "$env" "$version"
  fi

  if [ "$1" == "test" ]; then
    UnitTest
  fi
}

############################################################
############################################################
# Main program                                             #
############################################################
############################################################
# Set variables
modes=""
env="sb"
branch="dev"
version="1.0.0"
message="Update code"
statementBypass="no"

# Get the options
while getopts ":h:t:a:e:b:v:m:y:" option; do
  case $option in
  h) # display Help
    Help
    exit
    ;;
  t) # Enter a mode type
    modes=$OPTARG
    echo "Mode(s): $modes"
    ;;
  a) # Build Android
    BuildAndroid
    cd ../
    ;;
  e) # Enter an environment
    env=$OPTARG ;;
  b) # Enter a branch
    branch=$OPTARG ;;
  v) # Enter a version
    version=$OPTARG ;;
  m) # Enter a message
    message=$OPTARG ;;
  y) # Enter a message
    statementBypass="yes" ;;
  \?) # Invalid option
    echo "Error: Invalid option"
    exit
    ;;
  *) # Default case
    Help
    exit
    ;;
  esac
done

if [ -z "$modes" ]; then
  Help
  exit
else
  IFS='-' read -r -a modeArr <<<"$modes"
  echo "Variables: $env-$branch-$version-$message"
  #  echo ${#modeArr[@]}
  for index in "${!modeArr[@]}"; do
    #    echo "index: ${index} - total: ${#modeArr[@]}"
    echo "Step: ${modeArr[index]}"
    ProgressBar ${index} ${#modeArr[@]}
    Space 1

    Switch ${modeArr[index]}

    sleep 1
    Space 1
  done
  ProgressBar ${#modeArr[@]} ${#modeArr[@]}
fi
