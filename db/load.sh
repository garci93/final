#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U final -d final < $BASE_DIR/final.sql
fi
psql -h localhost -U final -d final_test < $BASE_DIR/final.sql
