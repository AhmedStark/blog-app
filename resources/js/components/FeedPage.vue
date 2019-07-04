<template>
    
        <v-card>
        <v-layout>
        <v-snackbar v-model="snackbar" top :timeout="3000" >{{ snackbarContent }}<v-btn dark flat  color="red" @click="snackbar = false">Close</v-btn> </v-snackbar>
        <v-flex offset-md2 md8 >
            <v-btn class="purple" v-if="admin" dark href="/admin/create-post">Add new post <v-icon>add</v-icon></v-btn>
            </v-flex>
        </v-layout>
        <v-layout wrap>
        
        <v-flex offset-md2 md8 >
            <post :admin="admin" class="ma-2" v-for="(post,index) in posts" :title="post.title" :id="post._id" :content="post.content" :date="post.created_at" :key="index"></post>
        </v-flex>
        
        <v-flex offset-md2 md8 >
            <template>
            <div class="text-xs-center">
                <v-pagination
                v-model="page"
                :length="last_page"
                @input="changePage"
                ></v-pagination>
            </div>
            </template>
            
        </v-flex>
        
        </v-layout>
        <v-btn href="/admin/create-post" class="fab-margin hidden-md-and-up" fixed bottom right fab dark color="indigo">
            <v-icon dark>add</v-icon>
        </v-btn>
        </v-card>
</template>
<script>
import { isNumber } from 'util';
export default {
    props:{
        snackbarStatus:{default:false,type:Boolean},
        snackbarPassedContent:{
            type:String,default:""
        }
    },data(){
        return{
            admin:false,
            snackbar:this.snackbarStatus,
            snackbarContent:this.snackbarPassedContent,
            page:Number(window.location.hash.substr(1))!==null?Number(window.location.hash.substr(1)):1,
            posts:[],
            last_page:1,
        }
    },methods: {
        changePage:function(){
            window.location.href = "/#"+this.page;
            this.getPosts();
        },getUserDetails(){
            axios.get('/user-details').then((response)=> {
                this.admin = response.data.admin;
            }).catch(function(error){
            }).then((response)=> {
            });
        },getPosts(){
            axios.get('/posts?page='+this.page).then((response)=> {
                this.posts = response.data.data;
                this.last_page = response.data.last_page;
                this.page = response.data.current_page;
            }).catch(function(error){
            }).then((response)=> {
            });
        }
    },mounted(){
        this.getUserDetails();
        this.getPosts();
    }

}
</script>
<style>

.fab-margin{
    margin-right:40pt;
}
</style>