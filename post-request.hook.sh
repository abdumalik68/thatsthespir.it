#!/bin/sh
target_branch="master"
working_tree="/home/thatsthespirit/www/thatsthespir.it-api/public"

while read oldrev newrev refname
do
        branch=$(git rev-parse --symbolic --abbrev-ref $refname)
        if [ -n "$branch" ] && [ "$target_branch" == "$branch" ]; then

                # check out master branch
                GIT_WORK_TREE=$working_tree checkout -f $target_branch
                NOW=$(date +"%Y%m%d-%H%M")
                git tag release_$NOW $target_branch

                echo "   /==============================="
                echo "   | DEPLOYMENT COMPLETED"
                echo "   | Target branch: $target_branch"
                echo "   | Target folder: $working_tree"
                echo "   | Tag name     : release_$NOW"
                echo "   \=============================="
        fi
done

# custom steps for deployment
# For example, let's execute composer to refresh our dependencies :
# cd /home/thatsthespirit/www/thatsthespir.it-api/public
# composer install
