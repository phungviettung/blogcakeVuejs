<template>
  <div>
    {{posts}}
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Ảnh</th>
        <th></th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Người thêm</th>
        <th>Thời gian thêm</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item,index) in posts">
        <td>{{item.posts.img}}</td>
        <th></th>
        <td>{{item.posts.title}}</td>
        <td>{{item.posts.content}}</td>
        <td>a</td>
        <td>{{item.posts.create_date}}</td>
        <td><button class="btn btn-primary">Xem</button></td>
        <td><button v-on:click = "postEdit(item.posts.id)"  class="btn btn-success">Sửa</button></td>
        <td><button v-on:click = "postDelete(item.posts.id,index)" class = "btn btn-danger">Xóa</button></td>
      </tr>
    </tbody>
  </table>
  <!-- <pagination v-bind:pagination="pagination" v-on:click.native="fetchPosts(pagination.current_page)" :offset="4"></pagination> -->
  
  </div>   
</template>
<script>
import axios from 'axios'
import PostDetail from './PostDetail'
import Pagination from './Pagination'


export default {
  
    name: 'app',
    data: function () {
      return {
         id:'',
         posts:[],
         event: {img:'', title:'', content:'', create_date:''},
         stt : 1,
          counter: 0,
          pagination: {
              total: 0,
              per_page: 2,
              from: 1,
              to: 0,
              current_page: 1
           },
           offset: 4
      }
    },
    components:{
      appPostDetail: PostDetail,
      Pagination
    },
    methods: {
      postEdit: function(id){
        this.$router.push('/postedit?id=' + id)
      },
      postDelete : function(id,index){
         console.log(id),
         console.log(index),
        axios.delete('http://blogcake.com/posts/delete/'+ id)
        .then( response => {
              console.log(response),
              this.$delete(this.posts, index)
         },)
        .cath(e => {
              this.errors.push(e)
          }) 
      },
      fetchPosts: function (page) {
        axios.get('http://blogcake.com/posts/viewall').then((response) => {
          console.log(response)
          this.posts = response.data
          //this.pagination = response.data
        }, (error) => {
          console.log(error)
        })
      },
    },
    mounted: function () {
      this.fetchPosts(this.pagination.current_page)
    }
    
  }
</script>