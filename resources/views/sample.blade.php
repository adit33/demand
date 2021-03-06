@extends('frontend.layout.master')

@section('content')
<style type="text/css">
	select {
  min-width: 300px;
}
</style>

<div id="el">
  <p>Selected: @{{selected}}</p>
  <select v-select="selected">
    <option value="0">default</option>
    <option v-for="o in options" :value="o.id">@{{ o.text }}</option>
  </select>

  {!! Form::select('name',App\User::pluck('name','id'),null,['class'=>'js-example-basic-multiple','id'=>'name']) !!}

</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		Vue.directive('select', {
  twoWay: true,
  priority: 1000,

  params: ['options'],
    
  bind: function () {
    var self = this
    $(this.el)
      .select2()
      .on('change', function () {
        self.set(this.value)
      })
  },
  update: function (value) {
    $(this.el).val(value).trigger('change')
  },
  unbind: function () {
    $(this.el).off().select2('destroy')
  }
})

$(".js-example-basic-multiple").select2();

var vm = new Vue({
  el: '#el',
  data: {
    selected: 0,
    options: [
      { id: 1, text: 'hello' },
      { id: 2, text: 'what' }
    ]
  }
})
	</script>
@endpush