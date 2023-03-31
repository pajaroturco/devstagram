#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS devstagram;
    GRANT ALL PRIVILEGES ON \`devstagram%\`.* TO '$MYSQL_USER'@'%';
EOSQL
