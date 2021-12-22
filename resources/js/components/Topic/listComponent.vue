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
                        <li v-for="topic in topics" @click="gettopic(topic)" :key="topic.id" class="list-group-item categories-list mb-2" >{{topic.title}}
                    <span class="fas fa-times text-danger ml-5"></span></li>
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
                            <input type="text" class="form-control" v-model="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="decsription" class="form-label">Description</label>
                            <textarea name="" v-model="description"  class="form-control" id="decsription" rows="5"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" @click="inserttopic()">{{updates}} <i class="fas fa-plus fa-1x ml-2"></i></button>
                        <button type="button" class="btn btn-secondary" @click="emptyfields()" style="border-radius:15px">Empty <i class="fas fa-trash fa-1x ml-2" style="font-size: 10px;"></i></button>
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
        topics:[],
        title:'',
        description:'',
        topic_id:'',
        updates:'Insert'
        }
    },
    created(){
        this.getData();
        this.getTopics();
    },
    methods:{
        getData(){
            axios
            .get('/admin/categories/gettopics')
            .then(response=>{this.topics=response.data});
        },
        emptyfields(){
            this.title = '',
            this.description = '',
            this.topic_id = '',
            this.updates = 'Insert'
        },
        gettopic(topic){
            this.title = topic.title,
            this.description = topic.description,
            this.topic_id = topic.id,
            this.updates = 'Update'
        },
       /* == axios updates == */
        inserttopic(){
            axios
            .post('/admin/topics/inserttopic',{
                title:this.title,
                description:this.description
            })
            .then(this.getData())
            .catch(error=>log.console(error))
        }
    }
}
</script>