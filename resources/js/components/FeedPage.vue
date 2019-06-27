<template>
    <v-app color="grey lighten-4">
        <v-container class="white">
        <v-layout>
        <v-flex offset-md2 md8 >
            <post class="ma-2" v-for="(post,index) in posts" :title="post.title" :content="post.content" :date="post.date" :key="index"></post>
        </v-flex>

            
        </v-layout>
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
    }   }
}
</script>
