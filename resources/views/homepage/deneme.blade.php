<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | PHP Jquery Ajax : Insert Radio Button value on click</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br />
<div class="container" style="width:500px;">
    <h3 class="text-center">How to insert Radio Button value</h3>
    <div class="radio">
        <input type="radio" name="name" value="Male" />Male <br />
        <input type="radio" name="name" value="Female" />Female <br />
        <input type="radio" name="name" value="Other" />Other <br />
    </div>
    <div id="result"></div>
</div>
<br />
</body>
</html>
<script>
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            var name = $(this).val();
            $.ajax({
                url:"{{route('deneme_gonder')}}",
                method:"POST",
                data:{name:name},
                success:function(data){
                    $('#result').html(data);
                }
            });
        });
    });
</script>
