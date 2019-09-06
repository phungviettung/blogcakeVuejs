<template>
    <p>delete</p>
</template>

<script>
export default {
    data: function(){
        return{
            id: this.$route.query.id,
        }
    },
    methods:{
        delete: function(){
            return(axios.delete('http://blogcake.com/posts/delete/'+this.id)
            .then( response => {
                console.log(response)
            })
            .cath(e => {
                this.errors.push(e)
            }) )
        }
    },
    mounted: function(){
        this.delete()
    }
}
</script>