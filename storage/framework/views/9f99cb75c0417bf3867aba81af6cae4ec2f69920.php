<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
        </head>
        <body>
        <div id='app'>
        <v-app>
            <nav-bar>
            
            </nav-bar>
            <?php echo $__env->yieldContent("content"); ?>
        </v-app>
                 
        </div>
        </body>
        <script src="<?php echo e(asset('js/app.js')); ?>">
            
        </script>
</html>
<?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/apptemplate.blade.php ENDPATH**/ ?>