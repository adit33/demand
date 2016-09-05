<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo asset('css/app.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<body>

<?php echo $__env->yieldContent('content'); ?>

</body>

<script type="text/javascript" src="<?php echo asset('js/app.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</html>


