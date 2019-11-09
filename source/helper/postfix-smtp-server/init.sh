#!/bin/sh

# Change the outputing smtp port from 25 to 587, 
# so it won't be blocked by our testing services
sed -i 's/\t25\/tcp/\t587\/tcp/g' /etc/services
