<template>
<div>
<v-container>

    <v-card>

        <v-card-title class="display-1">{{title}}</v-card-title>
        
        <v-card-text  class='content'>
        <v-layout>

            <v-flex class="mx-2" md12 >


            <div v-html="content">

            </div>


            </v-flex>

        </v-layout>
            <h1 class="title">{{comments.length}} Comments</h1>
        <form action="/comment" method='post' id='comment-form'>

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

                <comment v-for="comment in comments" :key="comment.id" :user-name="comment.user_name" :comment="comment.comment" :createdAt="comment.created_at"></comment>
        </div>
        </v-card-text>



        

        
    </v-card>
</v-container> 

</div>

</template>



<script>
export default {
    props:{
        id:{
            default:'',
            type:String
        },
        title:{
            default:'',
            type:String
        },
        content:{
            default:'',
            type:String
        },comments:{
            type:Array,default:function () {
                return [];
            }
        }

    },
    data(){
        return{
            
            comment:"",
            
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },methods:{
        
    }
}
</script>
<style scope>

.content{
    min-height: 600pt;
}
.raw{
    height:500pt;
}

.comment-text{
    margin-bottom: -10pt;
}
</style>

