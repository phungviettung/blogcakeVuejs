<template>
    <div>
        <h1>thêm blog</h1>
        <form action="">
            <label for="title">Tiêu đề</label>
            <input type="text" v-model="title" required/>
            <label for="content">Nội dung</label>
            <textarea v-model="content" name="" id="" cols="30" rows="10"></textarea>
        </form>
        <div id="preview">
            <h3>xem trước</h3>
            <p>tiêu đề: {{title}}</p>
            <p>nội dung{{content}}</p>
        </div>
        <button @click="create()" class="btn btn-primary">Thêm</button>
    </div>
</template>

<script>

import axios from 'axios';
export default {
    data(){
        return{
                title:"",
                content: ""
        }
    },
    methods:{
       create: function(){
            axios.post("http://blogcake.com/Posts/add",
                {
                    title: this.title,
                    content: this.content
                }
            ).then(response=>{
                // console.log("a")
                console.log(response)
            }).catch(e => {
                this.errors.push(e)
            })
       },
    }
    
}
</script>