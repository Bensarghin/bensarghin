<template>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="search" class="form-control" name="" placeholder="Search ...">
                    </div>
                    <ul class="list-group">
                        <li v-for="category in categories" :key="category.id" class="list-group-item mb-2" >{{category.title}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="title" class="form-label">title :</label>
                            <input type="password" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="decsription" class="form-label">Description</label>
                            <textarea name="" class="form-control" id="decsription" rows="5"></textarea>
                        </div>
                        <button class="btn btn-primary">Insert <i class="fas fa-plus fa-1x ml-2"></i></button>
                        <button class="btn btn-secondary" style="border-radius:15px" disabled>Update <i class="fas fa-pen fa-1x ml-2" style="font-size: 10px;"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
        categories:[]
        }
    },
    created(){
        this.getData();
    },
    methods:{
        getData(){
            axios
            .get('category/get')
            .then(response=>{this.categories=response.data});
        }
    }
}
</script>