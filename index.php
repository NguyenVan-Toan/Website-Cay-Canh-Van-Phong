<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Web cay xanh</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <?php
        session_start();
        include("./admincp/config/config.php");
            include("./pages/header.php");
            include("./pages/menu.php");
            include("./pages/main.php");
            include("./pages/footer.php");
        ?>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <script>
        // Show the first tab and hide the rest
        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

        // Click function
        $('#tabs-nav li').click(function(){
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
        });
    </script>
    
    <!-- <script>
//         $(document).ready(function() {

// var back = $(".prev");
// var next = $(".next");
// var steps = $(".step");

// next.bind("click", function() {
//   $.each(steps, function(i) {
//     if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
//       $(steps[i]).addClass('current');
//       $(steps[i - 1]).removeClass('current').addClass('done');
//       return false;
//     }
//   })
// });
// back.bind("click", function() {
//   $.each(steps, function(i) {
//     if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
//       $(steps[i + 1]).removeClass('current');
//       $(steps[i]).removeClass('done').addClass('current');
//       return false;
//     }
//   })
// });

// })
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>