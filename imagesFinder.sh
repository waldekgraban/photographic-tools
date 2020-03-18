#!/bin/bash

echo "I am looking for image files..."

find . -name '*' -exec file {} \; | grep -o -P '^.+: \w+ image'

echo "I finished."
