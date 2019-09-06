<template>
<form >
    {{title}}
  <div class="form-group">
    <label>Tiêu đề</label>
    <input v-model="title" type="text" class="form-control" >
  </div>
  <div class="form-group">
    <label>Nội dung</label>
    <textarea v-model="content" name="" id="" cols="30" rows="10"></textarea>
  </div>
  <button v-on:click = "updatePost()" class="btn btn-primary">Cập nhập </button>
</form>
</template>

<script>

import axios from 'axios'
export default {
    data: function(){
        return{
            id: this.$route.query.id,
            title: "",
            content:""
        }
    },
    methods:{
        fetchPostDetail: function(){
            axios.get("http://blogcake.com/posts/view/"+this.id)
            .then((response)=>{
                // console.log(response)
                // console.log(response.data)
                // console.log(response.data[0].posts.id)
                this.title = response.data[0].posts.title
                this.content = response.data[0].posts.content
                },(error) => {
                    console.log(error)
                },
            )

        },
        updatePost: function(){
            axios.put("http://blogcake.com/Posts/update",
            {
                id: this.id,
                title: this.title,
                content: this.content
            }
            )
            .then( response => {
                console.log(response)
            })
            .cath(e => {
                this.errors.push(e)
            })
        }
    },
    mounted: function(){
        this.fetchPostDetail()
    }
   
}
</script>