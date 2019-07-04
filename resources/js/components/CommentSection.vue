<template>
    <div>
        <h1 class="title">{{comments.length}} Comments</h1>
        <v-btn v-if="!checklogin" color="purple" dark href="/login">Login to comment</v-btn>
        <form action="/comment" method='post' id='comment-form' v-if="checklogin">

            <input type="hidden" name="_token" :value="csrf" />
            
            <input type="hidden" name="post_id" :value="id" />

            <v-text-field v-model="comment" name='comment' class='mx-4 comment-text' label='Comment here'>
            
            </v-text-field>
            <v-layout>
                
                <v-spacer></v-spacer>
                 <v-btn color='primary' class='mx-4' :disabled="comment==''" type='submit' form='comment-form'>Submit</v-btn>

            </v-layout>

        </form>

        <div class="mx-4">
                <v-divider></v-divider>

                <comment class="mb-4" v-for="comment in comments" :key="comment.id" :user-name="comment.user_name" :comment="comment.comment" :createdAt="comment.created_at"></comment>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        id:{default:""}
    },
    data(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            comment:"",
            comments:[],
            checklogin:false
        }
    },
    methods:{
        getUserDetails:function(){
            axios.get('/user-details').then((response)=> {
                this.checklogin = response.data.logged_in;
            }).catch(function(error){
            }).then((response)=> {
            });
      },getComments:function(){
          axios.get('/posts/'+this.id+"/comments").then((response)=> {
                this.comments = response.data   ;
            }).catch(function(error){
            }).then((response)=> {
            })
      }
    },mounted(){
      this.getUserDetails();
        this.getComments();
    }
}
</script>
