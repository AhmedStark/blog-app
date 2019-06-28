<template>
    <div>
      <v-card>
        <v-card-title class="display-1">{{title}}</v-card-title>
        <v-divider class="mx-2"></v-divider>
        <v-card-text class="subheading content-wrap" ><div class="content-wrap" v-html="content"></div> <a :href="'/post/'+id" class="mr-4 mb-2 read-more-link">read more</a></v-card-text>
        <v-layout><v-spacer></v-spacer> <v-chip class="mr-3 mb-2 ">{{date}}</v-chip></v-layout> 
      </v-card>  
    </div>
</template>
<script>
export default {
    props:{
        id:{default:"",type:String},
        title:{default:"",type:String},
        content:{default:"",type:String},
        date:{default:"",type:String}
    },data(){
        return{
            read_more: " "
        }
    }
}
</script>
<style scoped>
.read-more-link{
    text-decoration:none
}
.content-wrap{
    word-wrap:break-word;
    display: inline-block;

}
</style>