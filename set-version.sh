#!/bin/bash

# check environment
die () {
    echo >&2 "$@"
    exit 1
}
[ "$#" -eq 1 ] || die "Please provide a new version"

# get versions
OLD_VERSION=$(grep -o -P '(?<=<version>).*(?=</version>)' pom.xml | head -n 1)
NEW_VERSION=$1

# update
grep -Rli --include="pom.xml" "$OLD_VERSION" | xargs -i@ sed -i "s/$OLD_VERSION/$NEW_VERSION/g" @

# log
grep --color -A 1 -B 3 -R --include="pom.xml" "$NEW_VERSION"
echo ""
echo "Updated from $OLD_VERSION to $NEW_VERSION, please check logs above to verify."
