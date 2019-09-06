<template>
  <div class="hello">
      
    <h1>{{ msg }}</h1>
    <h2>Essential Links</h2>
    
    <button class="btn btn-primary">dd</button>
    <ul>
      <li>
        <router-link to="/contact">Contact</router-link>
      </li>
      <li>
        <router-link to="/form">Form</router-link>
      </li>
      <li>
        <router-link to="/post">Quản lí bài viết</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      msg: 'Chào ae Your Vue.js App'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
