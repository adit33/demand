<?php $__env->startSection('content'); ?>
<style type="text/css">
	select {
  min-width: 300px;
}
</style>
<div id="app">

<div id="app">
  <ul>
    <li v-for="todo in todos">
      {{ todo.text }}
    </li>
  </ul>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
	new Vue({
  el: '#app',
  data: {
    todos: [
      { text: 'Belajar JavaScript' },
      { text: 'Belajar Vue.js' },
      { text: 'Buat sesuatu yang mengagumkan' }
    ]
  }
})
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>