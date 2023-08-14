
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="msg">Click here</div>
    <div id="msg2"></div>
</body>
<script src="http://localhost/ecommerce/js/jquery.js"></script>
<script>
    $('document').ready(function(){
        $('#msg').on('click',function(){

            //browser headers
            $.ajax({
                //url: It start with protocol through which request is sent
                //:http. hypertext transfer protocol.
                //https hypertext transfer protocol secure
                //Next is domain of server
                //Next is resource path
                url:"http://localhost/ecommerce/help_headers_api.php",

                //----------type of request method----------

                // GET: It is used when fetching data from server
                // and either we are not sending any data or not secure data  
                type: "GET",
                //POST: It is used when sending form data or secure data such as json object
                // type: "POST",

                //data sent in request------------------

                //Data can be of object type {key: value,...}
                //it can be of json string type
                //it can be file object
                // data:JSON.stringify({"name":"hello"}), //object type key is double quoted
                data:{'name':"hello"}, //object type key is single quoted
                //data:{name:"hello"}, //object type key is not quoted
                // data: JSON.stringify({name:"hello"}), //json String type
                //data: filedata, //filedata is object of fileData class


                //contentType--------------------
                //The content type used when sending data to the server.
                // Default is "application/x-www-form-urlencoded"
                //When sending json string object content type is application/json
                // contentType: "application/json",
                //When sending file contentType is false
                //contentType: false,

                //cache---------------------------
                //A Boolean value indicating whether the browser should cache the requested pages. Default is true
                // cache: 0,

                //dataType----------------------
                //Type of data Browser expects from server
                //PHP server sends data of type text/html as default
                //If request's dataType is json then browser parse response data into object form
                // dataType: "json",

                //ProccessData
                //	A Boolean value specifying whether or not data sent with the request
                // should be transformed into a query string. Default is true
                //It is used when sending file and is set to false
                // processData: false,

                //async
                //A Boolean value indicating whether the request should be handled asynchronous
                // or not. Default is true
                //async:true,

                //if request is successful
                success: function(data){

                    $('#msg2').text(data);
                }

            });
        });
    });
</script>
</html>