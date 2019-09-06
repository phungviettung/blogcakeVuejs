<template>
    <!-- <div>
        <h1>{{ price }}</h1>
        <button @click="clicking()">Change Value</button>
    </div> -->

  

<table class="table table-dark">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

</template>

<script>
export default {
    data() {
        return {
            price: 200
        };
    },
    methods: {
        clicking(){
            this.price = this.price + 100;
        }
    }
}
</script>