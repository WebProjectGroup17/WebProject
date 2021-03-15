var express=require("express");
var bodyParser=require('body-parser');
var app = express();
var fileUpload = require('express-fileupload');

var authenticateController=require('./controlers/authenticate-controller');
var registerController=require('./controlers/register-controller');
var product = require('./controlers/product')

app.use(express.urlencoded({ extended: true }))
app.use(fileUpload());

/* route to handle login and registration */
app.post('/api/register',registerController.register);
app.post('/api/authenticate',authenticateController.authenticate);

/* route to handle products CRUD function */
app.post('/api/productadd', product.add);
app.get('/api/product', product.all);
app.put('/api/product/update/:id', product.edit);
app.delete('/api/product/delete/:id', product.delete);

app.listen(8012);