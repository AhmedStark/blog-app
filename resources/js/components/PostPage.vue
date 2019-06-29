<template>
<div>
<v-container>

    <v-card>


        <v-card-title class="display-1">
            <v-layout>
                {{title}}   
                
                <v-spacer></v-spacer>

                
                    <div class="text-xs-center">
                        <v-menu offset-y>
                        <template v-slot:activator="{ on }">
                            <v-btn
                            color="teal"
                            dark
                            v-on="on"
                            icon

                            >
                            <v-icon>
                                settings
                            </v-icon>
                            
                            </v-btn>
                        </template>
                        <v-list class="trans" >
                            
                            <v-list-tile class="list-tile" :href="'/posts/edit/'+id">
                                <v-list-tile-title >
                                    Edit
                                </v-list-tile-title>
                            </v-list-tile>
                                
                            <v-list-tile class="list-tile" @click="confirm">
                                <v-list-tile-title >
                                    Delete
                                </v-list-tile-title>
                            </v-list-tile>
                            
                            <form action="/post/delete" method="post" ref="deleteForm">
                                <input type="hidden" name="id" :value="id"/>
                                <input type="hidden" name="_token" :value="csrf" />
                                
                                
                            </form>
                            
                        </v-list>
                        </v-menu>
                    </div>
                <confirm @confirmed="submitForm" ref="submit_confirm">
                    <div slot="content">
                        Are you sure you want to delete this post?
                    </div>
                </confirm>

            </v-layout>
        </v-card-title>
        
        
        
        <v-card-text  class='content'>
        <v-layout>

            <v-flex class="mx-2" md12 >


            <div v-html="content">

            </div>


            </v-flex>

        </v-layout>
        <br>
        <br>
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

                <comment class="mb-4" v-for="comment in comments" :key="comment.id" :user-name="comment.user_name" :comment="comment.comment" :createdAt="comment.created_at"></comment>
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
        submitForm:function(){
            this.$refs.deleteForm.submit();
        },
        confirm:function(){
            
            this.$refs.submit_confirm.open();
        }
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
.list-tile:hover{
    color:white;
    background: teal;
    cursor: pointer;
}
</style>

