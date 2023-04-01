#!/bin/bash
if [[ -f ${PWD}/storage/logs/laravel.log ]]
then
    > ${PWD}/storage/logs/laravel.log
fi
