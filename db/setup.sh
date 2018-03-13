#!/usr/bin/env bash

mysql -e "CREATE DATABASE IF NOT EXISTS bracketology;"
mysql bracketology -e "CREATE TABLE IF NOT EXISTS brackets (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, firstname VARCHAR(64) NOT NULL, lastname VARCHAR(64) NOT NULL, \
                  age INT NOT NULL, gender CHAR(1) NOT NULL, school VARCHAR(64) NOT NULL, knowledge INT NOT NULL, email VARCHAR(64), bracket TEXT NOT NULL);"
