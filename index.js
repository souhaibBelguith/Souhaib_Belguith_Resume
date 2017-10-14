'use strict'

const express = require('express')
const bodyParser = require('body-parser')
const request = require('request')

app.set('port', (process.env.PORT || 5000))


// Process application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({extended: false}))

// Process application/json
app.use(bodyParser.json())

// Index route
app.get('/', function (req, res) {
    res.send("index.html",{root:__dirname})
})