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
            <post class="ma-2" v-for="(post,index) in posts" :title="post.title" :content="post.content" :date="post.date" :key="index"></post>
        </v-flex>
        
        <v-flex offset-md2 md8 >
            <template>
            <div class="text-xs-center">
                <v-pagination
                v-model="page"
                :length="6"
                @input="changePage"
                ></v-pagination>
            </div>
            </template>
            
        </v-flex>
        
        </v-layout>
        <v-btn class="fab-margin hidden-md-and-up" fixed bottom right fab dark color="indigo">
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
            type:Array,
            default:function(){
                return [
                    {title:"Abo",content:"sdawgdv fbwgvjygfuab dhubwavgd dbwaghdvtyw dcbuwkadhjg sdbkjwaykhild"
                    ,date:"2018-1-1"},

                    {title:"Abo",content:"sssssssssssssssssssssssssssssssssssssssssssssssssss"
                    ,date:"2018-1-1"},

                    {title:"Abo",content:"sssssssssssssssssssssssssssssssssssssssssssssssssss"
                    ,date:"2018-1-1"},

                    {title:"Abo",content:"sssssssssssssssssssssssssssssssssssssssssssssssssss"
                    ,date:"2018-1-1"},

                    {title:"Abo",content:"sssssssssssssssssssssssssssssssssssssssssssssssssss"
                    ,date:"2018-1-1"},
                ];
            }
    }   
    },data(){
        return{
            page:1
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