<template>
    <div class="card">
            <div class="card-header">
                <h4>New register</h4>
            </div>
            <div class="card-body">   
                <table class="table table-light text-light bg-dark">
                    <tr>
                        <td></td>
                        <td>Bloger</td>
                        <td>DateOfBirth</td>
                        <td>Gender</td>
                        <td>Blogs</td>
                        <td>Registered at</td>
                        <td></td>
                    </tr>
                    <tr v-for="user in users" :key="user.id">
                        <td><i class="fas fa-user"></i></td>
                        <td>{{user.name}} {{user.last_name}}</td>
                        <td>{{user.date_nais}}</td>
                        <td>M</td>
                        <td>{{user.blog.length}}</td>
                        <td>{{user.created_at | formatDate}}</td>
                        <td>
                            <a href="" class="text-success"><i class="fas fa-user"></i></a> | 
                            <a class="text-secondary" href=""><i class="far fa-edit"></i></a> | 
                            <a href="" class="text-danger"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    <tr v-if="users.length<=0"><td colspan="7" class="text-center">There's no recored today</td></tr>
                </table>
            </div>
        </div>
</template>

<script>
	export default {

		data(){
			return {
				users:[]
			}
		},
		created(){
			this.getUsers();
		},
		methods:{
			getUsers(){
				axios
				.get('/admin/getusers')
				.then(response => (this.users=response.data))
			}
		}

	};
</script>