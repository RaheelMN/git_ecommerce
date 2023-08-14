<?php

    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td{
            padding: 10px 10px;
        }

        tr{
            border: 2px solid black;
        }
        .lf_alg{
            text-align: left;
        }
        div{
            padding: 10px 0px;
            width: 85%;
            margin: auto;
            font-family: system-ui;
        }


    </style>
</head>
<body>
    <div>There are three ways server can store information on browser</div>
    <div>
        <table class="lf_alg" style="border: 2px solid black; width:90%; margin:auto;border-collapse: collapse;">
            <thead >
            <tr>
                <th>Properties</th>
                <th>Cookies</th>
                <th>Local Storage</th>
                <th>Session Storage</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Size</td>
                    <td>4kB</td>
                    <td>10MB</td>
                    <td>5MB</td>
                </tr>
                <tr>
                    <td>Support</td>
                    <td>HTML4/5</td>
                    <td>HTML5</td>
                    <td>HTML5</td>
                </tr>
                <tr>
                    <td>Accessable From</td>
                    <td>Any windows</td>
                    <td>Any windows</td>
                    <td>Tab</td>
                </tr>
                <tr>
                    <td>Expires</td>
                    <td>Default browser close</td>
                    <td>Lifetime</td>
                    <td>Tab closes</td>
                    <tr>
                    <td>Storage Location</td>
                    <td>Server and browser</td>
                    <td>Browser</td>
                    <td>Browser</td>
                </tr>
                <tr>
                    <td>Sent with request</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>No</td>
                </tr>                
                </tr>            
            </tbody>
        </table>
    </div>

    <div>To perform local storage operations we use javascript method localstorage </div>
    <div>It takes key value pair of type string in method localstorage.setItem() </div>
    <div>Javascript objects can be stored in localstorage but first they are converted </div>
    <div> to string using json stringfy method</div>
    <div>To create cookie or to get cookie information we use document.cookie() function</div>
</body>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
        var person = {
                        name: "raheel",
                        age: 40,
                        hobby: "reading,music"
        }

        localStorage.setItem('name','raheel');
        console.log(localStorage.getItem('name'));

        // store object in form of json string in local storage
        var j_person = JSON.stringify(person);
        localStorage.setItem('j_obj',j_person);

        //display console key in local storage in console
        console.log(localStorage.getItem('Console'));

        // Display contents of cookie in console 
        console.log(document.cookie);
    });
</script>
</html>