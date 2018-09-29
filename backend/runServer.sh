#!/bin/bash

# run apache server
sudo systemctl start apache2.service
sudo systemctl status apache2.service

#run mysql server
sudo systemctl start mysql
sudo systemctl status mysql