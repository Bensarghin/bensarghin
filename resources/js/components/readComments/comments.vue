<template>

		<div class="card mt-3">
			<div class="card-header">
				<h6 class="card-subtitle text-muted">Comments <i class="far fa-comment"></i> : </h6>
			</div>
			<div class="card-body comments">
				<div  v-for="comment in comments" :key="comment.id">
				<div class="text-muted">
					<div v-if="comment.user.id==user.id" class="bg-light">
						<h6 class="p-2 card-subtitle text-muted"><i class="far fa-clock"></i> : {{comment.created_at}}</h6>
						<ul class="list-inline">
							<li class="list-inline-item">
								<img src="/uploads/default.jpg" height="40" width="40">
							</li>
							<li class="list-inline-item">
								<h6 class="card-title">{{comment.user.name}} {{comment.user.last_name}}</h6>
							</li>
						</ul>
						<ul class="list-inline">
							<li class="list-inline-item">
							<p class="p-2" id="comment-box" style="font-size:19px !important;">{{comment.content}}</p>
							</li>
							<li class="list-inline-item">
								<a @click="edit(comment)" class="text-muted p-2"> <i class="fas fa-pen-square"></i> </a> | <a href="" class="text-danger p-2"> <i class="fas fa-times"></i> </a>
							</li>
						</ul>	
					 </div>			
					 <div v-else class="bg-body">
						<h6 class="p-2 card-subtitle text-muted"><i class="far fa-clock"></i> : {{comment.created_at}}</h6>
						<ul class="list-inline">
							<li class="list-inline-item">
								<img src="/uploads/default.jpg" height="50" width="50" class="rounded">
							</li>
							<li class="list-inline-item">
								<h6 class="card-title">{{comment.user.name}} {{comment.user.last_name}}</h6>
							</li>
						</ul>	
					  	<p class="p-2" style="font-size:19px !important;">{{comment.content}}</p>
					 </div>
				</div>
				<hr>
				</div>
			</div>
			<div class="card-footer">
				<div class="input-group mb-3" style="max-width: 25em">
				  <input type="text" class="form-control" v-model="content" placeholder="comment ..." aria-label="Recipient's username" id="comment-text" aria-describedby="button-addon2">
				  <button @click="saveComment()" class="btn btn-dark" type="button" id="button-addon2">Send </button>
				</div>
			</div>
		</div>
</template>

<script>
export default {
    data(){
        return {
        user:[],
        comments:[],
		content:'',
		isEdited:false
        }
    },
    created(){
        this.getData();
        this.getUser();
    },
    methods:{
    	getUser(){
    		axios
            .get('/get/user')
            .then(response=>{this.user=response.data});
    	},
        getData(){
            axios
            .get('/getcomments')
            .then(response=>{this.comments=response.data});
        },
		saveComment(){
			if(!this.isEdited){
				axios
	            .post('/comment',{
					content:this.content
				})
				.then(this.getData);
				this.content = '';
			}
			else{
				axios
	            .post('/updateComment',{
					content:this.content
				})
				.then(this.getData);
				
				this.content = '';
				this.isEdited=false
			}
		},
		edit(comment){
			document.getElementById('comment-text').focus();
			this.content=comment.content;
			this.isEdited=true
		}
    }
}
</script>