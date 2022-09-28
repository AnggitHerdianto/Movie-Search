#!/bin/bash

# goto basedir
cd $(dirname "$0")

# docker-compose
docker-compose  pull
docker-compose  stop
# docker-compose  down
docker-compose  up --build -d
