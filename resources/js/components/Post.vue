<template>
    <div>
      <v-card>
        <v-card-title class="display-1">{{title}}</v-card-title>
        <v-divider></v-divider>
        <v-card-text class="subheading content-wrap">{{content}} <a href="#" class="mr-4 mb-2 read-more-link">read more</a></v-card-text>
        <v-layout><v-spacer></v-spacer> <v-chip class="mr-3 mb-2 ">{{date}}</v-chip></v-layout> 
      </v-card>  
    </div>
</template>
<script>
export default {
    props:{
        title:{default:"",type:String},
        content:{default:"",type:String},
        date:{default:"",type:String}
    }
}
</script>
<style scoped>
.read-more-link{
    text-decoration:none
}
.content-wrap{
    word-wrap:break-word;
}
</style>