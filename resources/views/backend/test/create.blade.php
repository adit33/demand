@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Test</div>
                <div class="panel-body">
                   <label class="control-label" for="inputEmail">TextBox</label>
                    <div class="inc">
                    <div class="controls">
                    <input type="text" class="form-control">
                        <button class="btn btn-info" type="submit" id="append" name="append">Add Textbox</button>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
$(document).ready( function () {

$("#append").click( function() {
        $(".inc").append('<div class="controls"><input type="text" class="form-control"><a href="#" class="remove-this btn btn-danger">remove</a><br><br></div>');
        return false;
    });
    
$(document).on('click','a.remove-this',function(event) {
    event.preventDefault();
    $(this).parent().remove();
    return false;
});
    

});

// new Vue({
//     el:'#app',
//     methods:{
//         addButton:function(){
//            $(".inc").append('<div class="controls"><input type="text"><a href="#" class="remove-this btn btn-danger" v-on:click="removeTextBox">remove</a><br><br></div>');  
//         },
//         removeTextBox:function(){
//             alert('ok');
//         }
//     }

// })

</script>
@endpush