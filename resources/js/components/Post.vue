<template>
    <div>
      <v-card>
        <v-card-title class="display-1">{{title}}</v-card-title>
        
        <form action="/post/delete" method="post" ref="deleteForm">
                    <input type="hidden" name="id" :value="id"/>
            <input type="hidden" name="_token" :value="csrf" />
        </form>

        <div class="ml-4">

            <v-btn icon :href="'/posts/edit/'+id"><v-icon >edit</v-icon></v-btn>
            <v-btn icon @click="confirm" ><v-icon color="red">delete</v-icon></v-btn>
            
        </div>
        <v-divider class="mx-2"></v-divider>
        <v-card-text class="subheading content-wrap" >
            <div class="content-wrap" v-html="content.slice(0,150)">
            </div> ...
            <a :href="'/posts/'+id" class="mr-4 mb-2 read-more-link">
                open
            </a>
        </v-card-text>
        <confirm @confirmed="submitForm" ref="submit_confirm">
                    <div slot="content">
                        Are you sure you want to delete this post?
                    </div>
        </confirm>
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
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            read_more: " "
        }
    },methods:{
        submitForm:function(){
            this.$refs.deleteForm.submit();
        },edit(){
            window.location='/posts/edit/'+id;
        },
        confirm:function(){
            
            this.$refs.submit_confirm.open();
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