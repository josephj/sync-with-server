var http = require("http"),
    url  = require("url"),
    qs   = require("querystring");

// http://comet.josephj.com/polling?callback=getData
httpServer = http.createServer(function (request, response) {

    var callback = qs.parse(url.parse(request.url).query).callback;

    setTimeout(function () {
        var text = callback + "({'result': 'Server said " + parseInt(new Date().getTime(), 10) + "'});";
        response.write(text);
        response.end();
    }, 3000);
    
    response.writeHead(200, {"Content-Type": "text/javascript"});

}).listen(1387);
