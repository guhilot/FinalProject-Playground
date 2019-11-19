<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax jQuery fetch</title>
    <style type="text/css">
    body{
        font-family: Verdana, Geneva, sans-serif;
    }
    .container{
        width: 50%;
        margin: 0 auto;
    }

    table, tr, th, td{
        border: 1px solid black;
        padding: 10px;
    }
    </style>
</head>
<body>
    <div class = "container">
        <div id="records1">
        <i class="fas fa-truck-loading"></i>
        </div>
        <div id="records"></div>

        <p>
            <input type="button" id = "getusers" value = "Fetch Records"/>
        </p>
    </div>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript"> 
      $(function(){ $("#getusers").on('click', function(){ 
      $.ajax({ method: "GET", url: "getrecords.php", }).done(function( data ) { 
        var result = $.parseJSON(data);
        var string='<table width="100%"><tr><th>#</th><th>Name</th><th>Contact</th><tr>';
        $.each( result, function( key, value ) { 
             string += "<tr> <td>"+value['id'] + "</td><td> " +value['Name']+ "</td><td> " +value['Contact']+ "</td></tr>"; }); 
             string += '</table>'; 
 
          $("#records").html(string); 
       }); 
    }); 
 }); 
 $(document).ready(function () {
    ajax_call = function() {
        $.ajax({type: "GET", url: "getrecords.php", }).done(function(data){
            var result = $.parseJSON(data);
            var string='<table width="100%"><tr><th>#</th><th>Name</th><th>Contact</th><tr>';
            $.each( result, function( key, value ) { 
             string += "<tr> <td>"+value['id'] + "</td><td> " +value['Name']+ "</td><td> " +value['Contact']+ "</td></tr>"; }); 
             string += '</table>'; 
             $("#records1").html(string);
        })
    };
    var interval = 1000;
    setInterval(ajax_call, interval);
});
/*
 $(document).ready(function () {
    ajax_call = function() {
        $.ajax({type: "GET", url: "getrecords.php", dataType: "html", success: function (response) 
            {
                $("#records1").html(response);
            }
        });
    };
    var interval = 1000;
    setInterval(ajax_call, interval);
});
*/
</script> 

<p><a href="http://localhost:8080/FinalProject-Playground/First/partner.html">Back</a></p>

</body>

</html>
