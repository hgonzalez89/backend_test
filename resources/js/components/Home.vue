<template>
    <main>
        <div class="row">
            {{ productos }}
        </div>
    </main>
</template>

<script>
export default{
    name: 'Home',
    async mounted(){
        //this.axios.get('')
    },
    data(){
        return {
            productos: []
        }
    }
}
</script>