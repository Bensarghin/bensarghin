<template>

		<div class="card mt-3">
			<div class="card-header">
				<h6 class="card-subtitle text-muted">Comments <i class="far fa-comment"></i> : </h6>
			</div>
			<div class="card-body">
				<div  v-for="comment in comments" :key="comment.id">
				<div class="p-3 mb-1 bg-body text-muted rounded">
					<ul class="list-inline">
						<li class="list-inline-item">
							<img src="/uploads/default.jpg" height="50" width="50" class="rounded">
						</li>
						<li class="list-inline-item">
							<h6 class="card-title">{{comment.user.name}} {{comment.user.last_name}}</h6>
						</li>
					</ul>	
					<h6 class="card-subtitle"><i class="far fa-clock"></i> : {{comment.created_at}}</h6>
				  	<p class="p-4" style="font-size:19px !important;">{{comment.content}}</p>
				</div>
				<hr>
				</div>
			</div>
			<div class="card-footer">
				<div class="input-group mb-3" style="max-width: 25em">
				  <input type="text" class="form-control" v-model="content" placeholder="comment ..." aria-label="Recipient's username" aria-describedby="button-addon2">
				  <button @click="storeComment()" class="btn btn-dark" type="button" id="button-addon2">Send </button>
				</div>
			</div>
		</div>
</template>

<script>
export default {
    data(){
        return {
        comments:[],
		content:''
        }
    },
    created(){
        this.getData();
    },
    methods:{
        getData(){
            axios
            .get('/getcomments')
            .then(response=>{this.comments=response.data});
        },
		storeComment(){
			axios
            .post('/comment',{
				content:this.content
			})
			.then(this.getData);
			
			this.content = '';
		}
    }
}
</script>