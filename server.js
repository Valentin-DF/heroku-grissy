let express = require('express');

let app = express();

app.use(express.static(__dirname+'/dist/grissy'));

app.get('/*',(req, resp)=>{
  resp.sendFile(__dirname+'/dist/grissy/index.html');
})

app.listen(process.env.PORT || 8080);
