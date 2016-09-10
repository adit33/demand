<?php $__env->startSection('content'); ?>
<div id="app">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">Create Departement</div>
	                <div class="panel-body">
	                    Nama Departement :
						<?php echo Form::text('nama_departement',null,['class'=>'form-control','v-model'=>'departement_nama','v-on:keyup.enter="addDepartement"']); ?> <br>
						<ul>
							<li v-for="departement in departements">
							{{ departement.nama_departement }}
							<button v-on:click="removeDepartement($index)" class="btn btn-danger btn-xs">X</button>
							</li>
						</ul>
						<hr>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript">
		new Vue({
			el:"#app",
			data:{
				newDepartement:'',
				departements:[{
					nama_departement:'Tambah Departement'
				}]
			},
			methods:{
				addDepartement:function(){
					var newDepartement = this.departement_nama.trim()
					if(newDepartement){
						this.$http.post('../departement',"wkwkwkw")
						// this.departements.push({nama_departement:newDepartement})
						this.departement_nama=''
					}
				},
				saveProduct:function(departement){  
			        this.$http.post('api/departement/store',departement);
			    },
				removeDepartement:function(index){
					this.departements.splice(index,1)
				}
			}
		})
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>