// set up Handlebars and view engine
var express = require('express');
var path = require('path');
var app = express();
var exphbs = require('express-handlebars');
app.engine('handlebars', exphbs({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');
app.set('port', process.env.PORT || 3000);
var options = { dotfiles: 'ignore', etag: false,
extensions: ['htm', 'html'],
index: "hello.html"
};
app.use(express.static(path.join(__dirname, 'public'), options));

app.get('/', function(req, res){
  res.render('home');
});
app.get('/home', function(req, res){
  res.render('home');
});
app.get('/about', function(req, res){
  res.render('about');
});
app.get('/cash5', function(req, res){
  res.render('cash5');
});
app.get('/powerball', function(req, res){
  res.render('powerball');
});
app.get('/mega-millions', function(req, res){
  res.render('mega-millions');
});
app.get('/daily-pick', function(req, res){
  res.render('daily-pick');
});
app.use(function (req, res, next) {
  res.status(404).render("404");
})
app.use(function(err, req, res, next){
  console.error(err.stack);
  res.status(500).render('500');
});

app.listen(app.get('port'), function(){
  console.log('Express started on http://localhost:' +
  app.get('port') + '; press Ctrl-C to terminate.');
})
