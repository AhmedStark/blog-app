<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
    
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Laravel</title>

        <!-- Fonts -->
        

        
        </head>
        <body>
        <div id='app'>
        <v-app >
            <?php if($user = Sentinel::check()): ?>
                <nav-bar checklogin>
                
                </nav-bar>
            <?php else: ?>
                <nav-bar >
                
                </nav-bar>
            <?php endif; ?>
            <?php echo $__env->yieldContent("content"); ?>

            <app-footer
            <?php if(Sentinel::getUser() !== null): ?>

                <?php if(Sentinel::getUser()->inRole("admin")): ?>
                    admin
                <?php endif; ?>

            <?php endif; ?>
             :icons="<?php echo e($icons); ?>"></app-footer>
        </v-app>
                 
        </div>

        </body>
        <script src="<?php echo e(asset('js/app.js')); ?>">
            
        </script>
</html>
<?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/apptemplate.blade.php ENDPATH**/ ?>