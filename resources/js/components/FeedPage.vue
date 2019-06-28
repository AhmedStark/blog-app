<template>
    <v-app color="grey lighten-4">
        <v-container >
        <v-card>
        <v-layout>

        <v-flex offset-md2 md8 >
            <v-btn class="purple"  dark href="/admin/create-post">Add new post <v-icon>add</v-icon></v-btn>
            </v-flex>
        </v-layout>
        <v-layout wrap>
        
        <v-flex offset-md2 md8 >
            <post class="ma-2" v-for="(post,index) in posts.data" :title="post.title" :id="post._id" :content="post.content" :date="post.created_at" :key="index"></post>
        </v-flex>
        
        <v-flex offset-md2 md8 >
            <template>
            <div class="text-xs-center">
                <v-pagination
                v-model="page"
                :length="posts.last_page"
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
        </v-container>
    </v-app>
</template>
<script>
export default {
    props:{
        posts:{
            type:Object,
            default:function(){
                return {}
            }
    }   
    },data(){
        return{
            page:this.posts.current_page
        }
    },methods: {
        changePage:function(){
            window.location.href = "/?page="+this.page
        }
    },

}
</script>
<style>

.fab-margin{
    margin-right:40pt;
}
</style>