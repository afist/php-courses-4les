<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <!-- Последняя компиляция и сжатый JavaScript -->
    <link rel='stylesheet' href='http://clonecss.com/wp-admin/load-styles.php?c=0&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.9.5' type='text/css' media='all' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<body class="login wp-core-ui ">
<div id="login">
    <h1><a  title="Powered by WordPress" tabindex="-1">Powered by WordPress</a></h1>

    <form id="form">
        <p>
            <label for="user_login">Введите любую математическую операцию<br />
                <input type="text" name="expression" id="user_login" class="input" value="" size="30" /></label>
        </p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Count up" />
        </p>
    </form>

<!--     <p id="nav">
        <a href="">Lost your password?</a>
    </p> -->


</div>


<div class="clear"></div>
<script>

    $("#form").submit(function(event){
        event.preventDefault();
        var serializedData = $(this).serialize();// собирает все данные с формы

        request = $.ajax({
            url: "form-send.php",
            type: "post",
            data: serializedData,
            success(a){
                $('.hi').html(a);

            }
        });

    })
</script>





<h3 class="hi" style="text-align: center"></h3>







<!-- PrefixFree -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript" type="text/javascript"></script>

</body>
</html>