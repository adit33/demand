@extends('frontend.layout.master')

@section('content')
<style type="text/css">
	select {
  min-width: 300px;
}
</style>
<div id="app">

<div id="app">
  <ul>
    <li v-for="todo in todos">
      @{{ todo.text }}
    </li>
  </ul>
</div>

</div>
@endsection

@push('scripts')
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


@endpush