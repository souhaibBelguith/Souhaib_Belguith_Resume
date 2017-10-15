'use strict'

const express = require('express')
const bodyParser = require('body-parser')
const request = require('request')
const app=express()
app.use(express.static(__dirname + '../public'));

app.set('port', (process.env.PORT || 5000))

// Spin up the server
app.listen(app.get('port'), function() {
    console.log('running on port', app.get('port'))
})

// Process application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({extended: false}))

// Process application/json
app.use(bodyParser.json())

// Index route

app.get('/resume', function(req, res) {
    res.render('index.html',{root:__dirname}); 
	app.use(express.static(__dirname + '../resume'));
});