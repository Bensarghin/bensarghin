<template>
    <div class="card">


        <!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    	<div class="modal-content">
			      <div class="modal-header">
			        <h1 class="modal-title" id="exampleModalLabel"{{blog_info.user.name}} {{blog_info.user['last_name']}}</h1>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<h1>{{blog_info.title}}</h1>
			      	<span class="text-muted">{{blog_info.created_at | formatDate}}</span>
			      	<p class="text-muted">{{blog_info.body}}</p>
			      	<ul class="list-inline">
			      		<li v-for="catego in blog_info.category" class="list-inline-item" :key="catego.id">#{{catego.title}} |</li>
			      	</ul>
			      </div>
		     	  <div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		    	   </div>
		  		</div>
			</div>
		</div>


        <div class="card-header">
            <h4>New blogs</h4>
        </div>
        <div class="card-body">   
            <table class="table table-light text-light bg-dark">
                <tr>
                    <td>Bloger</td>
                    <td>title</td>
                    <td>Posted at</td>
                    <td>Comments</td>
                    <td>Reads</td>
                    <td></td>
                </tr>
                <tr v-for="blog in blogs" :key="blog.id">
                    <td>{{blog.user.name}} {{blog.user.last_name}}</td>
                    <td>{{blog.title}}</td>
                    <td>{{blog.created_at | formatDate}}</td>
                    <td>{{blog.comment.length}}</td>
                    <td>{{blog.read.length}}</td>
                    <td> 
                        <a class="text-success" @click="edit(blog)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-book-reader"></i></a> | 
                        <a href="" class="text-danger"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <tr v-if="blogs.length<=0"><td colspan="7" class="text-center">There's no recored today</td></tr>
            </table>
        </div>
    </div>
</template>

<script>
	export default {

		data(){
			return {
				blogs:[],
				categories:[],
				isEdited:false,
				blog_info:[],
				user_name:''
			}
		},
		created(){
			this.getBlogs();
		},
		methods:{
			getBlogs(){
				axios
				.get('/admin/getblogs')
				.then(response => (this.blogs=response.data))
			},
			edit(blog){
				this.blog = blog
			}
		}

	};
</script>